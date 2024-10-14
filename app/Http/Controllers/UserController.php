<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class UserController extends Controller
{

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show users page
     * @return View
     */
    public function index(): View
    {
        return view('app.user.index')->with([
            'title' => 'users.title',
            'users' => User::all()
        ]);
    }

    /**
     * Show new user page
     * @return View
     */
    public function new(): View
    {
        return view('app.user.form')->with([
            'title' => 'users.add',
            'user' => new User()
        ]);
    }

    /**
     * Handle new user request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $user = new User();
        $validator = $this->validateUser($request->all(), $user);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $user->hash = uniqid("id", false);
        if($this->save($user, $request->all())){
            return redirect()->route('users')->with([
                'success' => 'users.created-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'created-error'
        ]);
    }

    /**
     * Show user edition page
     * @param int $id
     * @return View
     */
    public function edit(int $id): View
    {
        return view('app.user.form')->with([
            'title' => 'users.edit',
            'user' => User::find($id)
        ]);
    }

    /**
     * Handle update user request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        if(!$request->input('password')){
            $request->request->remove('password');
        }
        $user = User::find($request->input('id'));
        $validator = $this->validateUser($request->all(), $user);
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save($user, $request->all())){
            return redirect()->route('users')->with([
                'success' => 'users.updated-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'users.updated-success'
        ]);
    }

    /**
     * Save user
     * @param User $user
     * @param array $data
     * @return boolean
     */
    protected function save(User $user, array $data): bool
    {
        $user->name = $data['name'];
        $user->email = $data['email'];
        $user->is_admin = $data['type'] == 1;
        if(isset($data['password'])) $user->password = bcrypt($data['password']);
        $user->blocked = isset($data['blocked']);
        return $user->save();
    }

    /**
     * Get a validator for an incoming registration/update request.
     * @param  array  $data
     * @param User $user
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateUser(array $data, User $user): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'name' => 'required|string|min:2|max:255',
            'email' => ['required','email','max:255', Rule::unique('users')->ignore($user->id)],
            'password' => 'sometimes|required|string|min:8|confirmed',
            'type' => 'required',
        ]);
    }

    /**
     * Delete user
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $user = User::find($id);
        if($user){
            if($user->delete()){
                return redirect()->route('users')->with([
                    'success' => 'users.deleted-success'
                ]);
            }
            return redirect()->back()->with([
                'success' => 'users.deleted-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'users.non-existent'
        ]);
    }

    /**
     * Handle bulk user actions request
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function actions(Request $request): RedirectResponse
    {
        if($request->input('action')){
            foreach ($request->input('id') as $id){
                $user = User::find($id);
                if($request->input('action') == 'block'){
                    $user->blocked = !$user->blocked;
                    $user->save();
                }else{
                    $user->delete();
                }
            }
        }
        return redirect()->back();
    }

    /**
     * ----------- NOT USED YET
     * Return users json object
     *
     * @param Request $request
     * @return RedirectResponse|Response
     */
    public function table(Request $request): Response|RedirectResponse
    {
        if($request->ajax()){
            $users = User::all();
            $array = ['data' => []];
            foreach ($users as $user) {
                $array['data'][] = ['id' => $user->id,'name' => $user->name,'email'=> $user->email,'admin' => $user->is_admin,'blocked' => $user->blocked];
            }
            return response($array, 200)->header('Content-Type', 'application/json');
        }
        return redirect()->back();
    }
}
