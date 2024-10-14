<?php

namespace App\Http\Controllers;

use App\Models\TargetNumber;
use App\Models\VoiceApp;
use App\Traits\CallrTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberUtil;

class TargetNumberController extends Controller
{
    use CallrTrait;

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
     * Show Call Tracking index page
     * @return View
     */
    public function index(): View
    {
        $response = $this->listCountries();
        $countries = [];
        foreach ($response as $country){
            $countries[$country->country_dialcode] =  $country->country_label . '('.$country->country_dialcode.')';
        }
        return view('app.target-number.index')->with([
            'title' => 'call-tracking.title',
            'countries' => $countries,
            'targetNumbers' => TargetNumber::all()
        ]);
    }

    /**
     * Handle new target Number request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        if (!$this->isValidPhoneNumber($request->input('phone'))) {
            return redirect()->back()->with(['error' => 'target-numbers.format-error'])->withInput();
        }
        $targetNumber = new TargetNumber();
        $targetNumber->number = $request->input('phone');
        $targetNumber->status = !(TargetNumber::where('status', 1)->count());
        if($targetNumber->save()){
            return redirect()->route('target-numbers')->with([
                'success' => 'target-numbers.created-success'
            ]);
        }
        return redirect()->route('target-numbers')->with([
            'error' => 'target-numbers.created-error'
        ]);
    }

    /**
     * Handle update target Number request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $filters = ['name' => ''];
        $options = ['order' => '', 'offset' => 0, 'quantity' => 50];
        $apps = $this->searchApps($filters, $options)->hits;
        if(count($apps)){
            $params = ['targets' => [['number' => TargetNumber::find($request->input('targetNumber'))->number, 'timeout' => 120]]];
            foreach ($apps as $app){
                if(VoiceApp::where('app_id', $app->hash)->first()){
                    $this->editApp($app->hash, $params);
                }
            }
        }
        $targetNumbers = TargetNumber::all();
        foreach ($targetNumbers as $targetNumber){
            $targetNumber->status = $targetNumber->id == $request->input('targetNumber');
            if(!$targetNumber->save()){
                return redirect()->route('target-numbers')->with([
                    'error' => 'target-numbers.updated-error'
                ]);
            }
        }
        return redirect()->route('target-numbers')->with([
            'success' => 'target-numbers.updated-success'
        ]);
    }

    /**
     * Delete target number
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $targetNumber = TargetNumber::find($id);
        if($targetNumber){
            if($targetNumber->delete()){
                if(TargetNumber::all()->count() === 1){
                    $targetNumber = TargetNumber::all()[0];
                    $targetNumber->status = true;
                    $targetNumber->save();
                }
                return redirect()->back()->with([
                    'success' => 'target-numbers.delete-success'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'target-numbers.delete-error'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'target-numbers.non-existent'
        ]);
    }

    /**
     * @param $phoneNumber
     * @return bool
     */
    protected function isValidPhoneNumber($phoneNumber): bool
    {
        $phoneNumberUtil = PhoneNumberUtil::getInstance();
        try {
            $parsedNumber = $phoneNumberUtil->parse($phoneNumber, null);
            return $phoneNumberUtil->isValidNumber($parsedNumber);
        } catch (NumberParseException $e) {
            return false;
        }
    }

}
