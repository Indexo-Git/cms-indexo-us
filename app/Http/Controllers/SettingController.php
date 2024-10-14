<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Traits\CallrTrait;
use App\Traits\ImageTrait;
use App\Traits\SettingsTrait;
use App\Traits\SitemapTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;
use Symfony\Component\Intl\Locales;

class SettingController extends Controller
{
    use CallrTrait;
    use ImageTrait;
    use SettingsTrait;
    use SitemapTrait;

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
     * Show settings page
     * @return View
     */
    public function index(): View
    {
        $responseCountries = $this->getCountries();
        $countries = [];
        foreach ($responseCountries as $country){
            if($country->available->CLASSIC){
                $countries[$country->code] =  $country->label;
            }
        }
        $responseTimezones = $this->listTimezones();
        $timezones = [];
        foreach ($responseTimezones as $timezone){
            $timezones[$timezone->php_name] =  $timezone->label;
        }
        return view('app.settings.index')->with([
            'title' => 'settings.title',
            'settingsDB' => Setting::all(),
            'countries' => $countries,
            'timezones' => $timezones,
            'locales' => Locales::getNames()
        ]);
    }

    /**
     * Handle create settings request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $validator = $this->validateSettings($request->all());
        if($validator->fails()){
            return redirect()->back()->withErrors($validator)->withInput();
        }
        if($this->save(new Setting(), $request->all())){
            return redirect()->route('settings')->with([
                'success' => 'settings.created-success'
            ]);
        }
        return redirect()->route('settings')->with([
            'error' => 'settings.created-error'
        ]);
    }

    /**
     * Handle update settings request
     * @param Request $request
     * @return RedirectResponse
     */
    public function update(Request $request): RedirectResponse
    {
        $primaryColor = Setting::where('name', 'color_primary')->first()->value;
        $customCSS = Setting::where('name', 'custom_css')->first()->value;
        if(($primaryColor != $request->input('color_primary')) || ($customCSS != $request->input('custom_css'))){
            $this->createCSS($request->input('color_primary'), $request->input('custom_css'));
        }
        if($request->hasFile('logo')) $this->handleFiles($request, 'logo');
        if($request->hasFile('favicon')) $this->handleFiles($request, 'favicon');
        $this->updateValues($request->except('_token','logo','favicon'));
        if(!$request->has('shop_active')) $this->turnOffSwitches('shop_active');
        if(!$request->has('payment_active')) $this->turnOffSwitches('payment_active');
        if(!$request->has('blog_active')) $this->turnOffSwitches('blog_active');
        if(!$request->has('shipping_active')) $this->turnOffSwitches('shipping_active');
        return redirect()->back()->with([
            'success' => 'settings.updated-success'
        ]);
    }

    protected function turnOffSwitches(string $field){
        $setting = Setting::where('name', $field)->first();
        $setting->value = 'off';
        $setting->save();
    }

    protected function handleFiles(Request $request, string $input){
        $image = $request->file($input);
        $name = $input.'.'.$image->getClientOriginalExtension();
        $request->file($input)->move($input, $name);
    }

    /**
     * Protected method save settings table
     * @param Setting $setting
     * @param array $data
     * @return bool
     */
    protected function save(Setting $setting, array $data): bool
    {
        $setting->name = $data['key'];
        $setting->value = $data['value'];
        return $setting->save();
    }

    /**
     * Update settings values
     * @param array $data
     * @return void
     */
    protected function updateValues(array $data){
        foreach ($data as $key => $value){
            $setting = Setting::where('name', $key)->first();
            if(!$setting){
                dd($key);
            }
            $setting->value = $value;
            $setting->save();
        }
    }

    /**
     * Get a validator for an incoming settings update request.
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validateSettings(array $data): \Illuminate\Contracts\Validation\Validator
    {
        return Validator::make($data, [
            'key' => 'required|string|min:2|max:150',
            'value' => 'nullable|string'
        ]);
    }

    /**
     * Delete any of the images set in settings
     * @param string $image
     * @return RedirectResponse
     */
    public function deleteImage(string $image): RedirectResponse
    {
        $path = $image.'/'.$image.'.'.Setting::where('name', 'format_'.$image)->first()->value;
        if(File::exists($path)){
            File::delete($path);
            return redirect()->back()->with([
                'success' => 'settings.delete-success'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'settings.non-existent'
        ]);
    }

    public function sitemapLaunch(){
        $this->sitemap();
    }
}
