<?php

namespace App\Http\Controllers;

use App\Models\TargetNumber;
use App\Models\Setting;
use App\Models\VoiceApp;
use App\Traits\CallrTrait;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;
use JetBrains\PhpStorm\ArrayShape;

class CallTrackingController extends Controller
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
     * @return View|RedirectResponse
     */
    public function index(): View|RedirectResponse
    {
        if (!TargetNumber::all()->count()) {
            return redirect()->route('target-numbers')->with(['error' => 'call-tracking.no-target-number'])->withInput();
        }
        $responseSearchDIDs =  $this->searchDID();
        $DIDs = [];
        if(count($responseSearchDIDs)){
            foreach ($responseSearchDIDs as $did){
                if(!$did->is_used){
                    $DIDs[$did->hash] = $did->local_number_f;
                }
            }
        }
        $country = Setting::where('name', 'call_tracking_country')->first()->value;
        $responseAreaCodes = $this->getAreaCode($country);
        $areaCodes = [];
        foreach ($responseAreaCodes as $areaCode) {
            if ($areaCode->available->CLASSIC) {
                $areaCodes[$areaCode->local_prefix] = $areaCode->label . ' : ' . $areaCode->local_prefix;
            }
        }
        return view('app.call-tracking.index')->with([
            'title' => 'call-tracking.title',
            'voiceApp' => new VoiceApp(),
            'voiceApps' => VoiceApp::all(),
            'areaCodes' => $areaCodes,
            'DIDs' => $DIDs
        ]);
    }

    /**
     * Handle new call tracking request
     * @param Request $request
     * @return RedirectResponse
     */
    public function create(Request $request): RedirectResponse
    {
        $app = $this->createApp($request->input('note'), $this->setOptions());
        if ($request->has('did') && $request->input('did') != 'null') {
            $responseSearchDIDs = $this->searchDID($request->input('did'));
            foreach ($responseSearchDIDs as $searchDID) {
                if ($searchDID->hash == $request->input('did')) {
                    $did = $searchDID;
                    if(!$this->assignDID($app->hash, $searchDID->hash)){
                        $this->deleteApp($app->hash);
                        return redirect()->back()->with(['error' => 'call-tracking.created-error'])->withInput();
                    }
                }
            }
        } else {
            try {
                $reservation = $this->reserveDID($request->input('area-code'));
            } catch (\CALLR\API\Exception\RemoteException $e) {
                $this->deleteApp($app->hash);
                return redirect()->back()->with(['error' => $e->getMessage()])->withInput();
            }
            $buyStatus = $this->buyDID($reservation->token);
            if (isset($buyStatus->success[0])) {
                $did = $buyStatus->success[0];
                $this->assignDID($app->hash, $did->hash);
            } else {
                $this->deleteApp($app->hash);
                return redirect()->back()->with(['error' => 'call-tracking.created-error'])->withInput();
            }
        }
        $voiceApp = new VoiceApp();
        $voiceApp->app_id = $app->hash;
        $voiceApp->did_id = $did->hash;
        $voiceApp->intl_number = $did->intl_number;
        $voiceApp->local_number = $did->local_number;
        $voiceApp->note = $request->input('note');
        if ($voiceApp->save()) {
            return redirect()->route('call-tracking')->with([
                'success' => 'target-numbers.created-success'
            ]);
        }
        $this->deleteApp($app->hash);
        return redirect()->back()->with(['error' => 'call-tracking.created-error'])->withInput();
    }

    /**
     * Set App options array
     * @return array
     */
    #[ArrayShape(['medias' => "int[]", 'options' => "bool[]", 'targets' => "array[]", 'vms' => "array", 'ga' => "string[]"])] protected function setOptions(): array
    {
        return array(
            'medias' => array(
                'bridge' => 0,
                'ringtone' => 0,
                'welcome' => 0,
                'whisper' => 0
            ),
            'options' => array(
                'record_calls' => Setting::where('name', 'call_tracking_record_calls')->first()->value == 'on'
            ),
            'targets' => array(
                array(
                    'number' => TargetNumber::where('status', true)->first()->number,
                    'timeout' => 120
                )
            ),
            'vms' => array(
                'active' => false,
                'email_template' => 'THECALLR',
                'emails' => array(),
                'file_format' => 'mp3',
                'intro' => 0,
                'locale' => Setting::where('name', 'call_tracking_locale')->first()->value,
                'record' => false,
                'timeout' => 200,
                'timezone' => Setting::where('name', 'call_tracking_timezone')->first()->value
            ),
            'ga' => array(
                'ua' => ''
            )
        );
    }

    /**
     * Delete tracked number and voice app
     * @param int $id
     * @return RedirectResponse
     */
    public function delete(int $id): RedirectResponse
    {
        $voiceApp = VoiceApp::find($id);
        if($voiceApp){
            $this->deleteApp($voiceApp->app_id);
            if($voiceApp->delete()){
                return redirect()->route('call-tracking')->with([
                    'success' => 'call-tracking.delete-success'
                ]);
            }
            return redirect()->back()->with([
                'error' => 'call-tracking.delete-error'
            ]);
        }
        return redirect()->back()->with([
            'error' => 'call-tracking.non-existent'
        ]);
    }

    /**
     * @param string $hash
     * @param string $KEYWORDS
     * @return mixed
     */
    protected function searchDID(string $hash = '', string $KEYWORDS = ''): mixed
    {
        $filters = ['class' => 'CLASSIC', 'hash' => $hash, 'KEYWORDS' => $KEYWORDS, 'type=' => "PERSONAL"];
        $options = ['order' => '', 'offset' => 0, 'quantity' => 10];
        return $this->searchDIDs($filters, $options)->hits;
    }

    public function search(){
        $filters = ['name' => ''];
        $options = ['order' => '', 'offset' => 0, 'quantity' => 50];
        dd($this->searchApps($filters, $options)->hits);
    }

    public function forceDelete(string $hash){
        dd($this->deleteApp($hash));

    }

}
