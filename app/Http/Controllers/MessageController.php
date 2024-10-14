<?php

namespace App\Http\Controllers;

use App\Models\Message;
use App\Models\User;
use App\Traits\OpenAITrait;
use App\Traits\reCaptchaTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;
use Illuminate\View\View;

class MessageController extends Controller
{
    use OpenAITrait;
    use reCaptchaTrait;

    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except(['contact', 'connect']);
    }

    /**
     * Show messages page
     * @param string $filter
     * @return View
     */
    public function index(string $filter = ''): View
    {
        if($filter == ''){
            $messages = Message::where('trash', 0)->get()->sortBy('type');
        } else{
            $messages = $filter == 'read' ? Message::where('status_read', 1)->where('trash', 0)->get() : Message::where('status_read', 0)->where('trash', 0)->get() ;
        }
        return view('app.messages.index')->with([
            'title' => 'messages.title',
            'messages' =>  $messages
        ]);
    }

    /**
     * Show messages page per type
     * @param int $type
     * @return View
     */
    public function type(int $type): View
    {
        return view('app.messages.index')->with([
            'title' => 'messages.title',
            'messages' => Message::where('type', $type)->where('trash', 0)->get()
        ]);
    }

    /**
     * Show messages in trash
     * @return View
     */
    public function trash(): View
    {
        return view('app.messages.index')->with([
            'title' => 'messages.trash',
            'messages' => Message::where('trash', 1)->get()
        ]);
    }

    /**
     * View message page
     * @param int $id
     * @return mixed
     */
    public function view(int $id): mixed
    {
        $message = Message::find($id);
        if(!$message->status_read){
            $message->status_read = 1;
            $message->save();
        }
        if($message){
            return view('app.messages.view')->with([
                'title' => 'messages.title',
                'message' => $message
            ]);
        }
        return redirect()->route('messages');
    }

    /**
     * @param Request $request
     * @return RedirectResponse
     */
    public function contact(Request $request): RedirectResponse
    {
        $validator = $this->validateMessage($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $this->validateCaptcha($request->input('g-token'));
        if($this->save($request->all(), __('messages.contact-form'))){
            $this->notifyAdmins($request->all(), 'App\Mail\Contact');
            return redirect()->back()->with('message', __('messages.contact-success'));
        }
        return redirect()->back()->with('error', __('messages.contact-error'));
    }

    /**
     * Let's connect email request.
     * @param Request $request
     * @return RedirectResponse
     */
    public function connect(Request $request): RedirectResponse
    {
        $validator = $this->validateMessage($request->all());
        if($validator->fails()){
            return redirect(url()->previous() .'#why-choose-us')->withErrors($validator)->withInput();
        }
        $this->validateCaptcha($request->input('g-token'));
        if($this->save($request->all(), __('messages.connect-form'))){
            $this->notifyAdmins($request->all(), 'App\Mail\Connect');
            return redirect(url()->previous() .'#why-choose-us')->with('message', __('messages.contact-success'));
        }
        return redirect()->back()->with('error', __('messages.contact-error'));

    }

    /**
     * Save message
     * @param array $data
     * @param string $subject
     * @return boolean
     */
    protected function save(array $data, string $subject = ''): bool
    {
        $mapping = ['1 = Lead' => 1, '2 = Spam' => 2, '3 = Other' => 3, 'Lead' => 1,'Spam' => 2, 'Other' => 3, '1' => 1, '2' => 2, '3' => 3];
        //$type = $mapping[$this->qualifyMessage(['name' => $data['name'], 'email' => $data['email'], 'content' => $data['website'] ?? $data['message']])] ?? 4;
        $message = new Message();
        $message->name = $data['name'];
        $message->email = $data['email'];
        $message->phone = $data['phone'];
        // $message->type = $type ?: 0;
        $message->type = 1;
        $message->subject = $data['subject'] ?? $subject;
        $message->content = $data['website'] ?? $data['message'];
        return $message->save();
    }

    /**
     * Get a validator for an incoming contact email request.
     *
     * @param array $data
     * @return mixed
     */
    protected function validateMessage(array $data): mixed
    {
        return Validator::make($data, [
            'name' => 'required|min:2|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|min:7|max:15',
            'subject' => 'required|string|max:150',
            'message' => 'required|max:1000',
            'g-token' => 'required'
        ]);
    }

    /**
     * Send email to admin users
     * @param array $data
     * @param string $className
     * @return void
     */
    protected function notifyAdmins(array $data, string $className){
        $admins = User::where('is_admin', 1)->get();
        if($admins){
            foreach ($admins as $admin){
                Mail::to($admin->email)->send(new $className($data));
            }
        }
    }

    /**
     * Delete message
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $message = Message::find($id);
        if($message){
            $message->trash = true;
            if($message->save()){
                return redirect()->back()->with([
                    'success' => 'messages.delete-success'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'messages.delete-error'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'messages.non-existent'
        ]);
    }

    /**
     * Handle bulk message actions request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        if($request->input('action')){
            foreach ($request->input('id') as $id){
                $message = Message::find($id);
                if($request->input('action') == 'read'){
                    $message->status_read = true;
                }
                if($request->input('action') == 'unread'){
                    $message->status_read = false;
                }
                if($request->input('action') == 'delete'){
                    $message->trash = true;
                }
                if($request->input('action') == 'restore'){
                    $message->trash = false;
                }
                $message->save();
            }
        }
        return redirect()->back();
    }

}
