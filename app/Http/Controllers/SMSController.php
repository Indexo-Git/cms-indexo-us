<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\TargetNumber;
use App\Traits\CallrTrait;
use Carbon\Carbon;

class SMSController extends Controller
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
     * Tests SMS
     * @return void
     */
    public function test(){
        $sender = Setting::where('name', 'website_name')->first()->value;
        $to = "+522721677945";

        $originalDatetime = setTimezone('2023-08-22 18:24:34');

        $options = array(
            'force_encoding' => "GSM",
            'user_data' => $sender
        );
        $body = $sender . __('sms.notification'). "\n";
        $body .= __('sms.missed-call') . TargetNumber::where('status', true)->first()->number. "\n";
        $body .= __('sms.date') . $originalDatetime->format(Setting::where('name', 'call_tracking_date_format')->first()->value). "\n";
        $body .= __('sms.hour') . $originalDatetime->format('H:i');
       return $this->sendSMS($to, $body, $options);
    }
}
