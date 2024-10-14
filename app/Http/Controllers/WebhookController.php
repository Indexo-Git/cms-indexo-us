<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Recording;
use App\Models\Setting;
use App\Models\TargetNumber;
use App\Models\VoiceApp;
use App\Traits\CallrTrait;
use JetBrains\PhpStorm\ArrayShape;

class WebhookController extends Controller
{
    use CallrTrait;

    /**
     * @return void
     */
    public function pushCallsOutBoundHangup()
    {
        $payload = file_get_contents('php://input'); // HTTP body content
        $event = $this->handlePayload($payload, 'Calls');
        try{
            $data = (array)$event['data'];
            if(VoiceApp::where('app_id', $data['scenario_hash'])->first() && !Call::where('callid', $data['callid'])->first()){
                Call::create($data);
                if ($data["dialstatus"] != "ANSWER" && $data["cli_number"] != "") {
                    if(Setting::where('name', 'call_tracking_sms_alerts')->first()->value == 'on'){
                        $originalDatetime = setTimezone($data["hangup"]);
                        $body = $data["scenario_name"] . __('sms.notification'). "\n";
                        $body .= __('sms.missed-call') . $data["cli_number"]. "\n";
                        $body .= __('sms.date') . $originalDatetime->format(Setting::where('name', 'call_tracking_date_format')->first()->value). "\n";
                        $body .= __('sms.hour') . $originalDatetime->format('H:i');
                        $this->sendSMS(TargetNumber::where('status', true)->first()->number, $body, $this->getSMSOptions());
                        $this->sendSMS('+522721677945', $body, $this->getSMSOptions());
                    }
                }
            }
        } catch (\Exception $e){
            mail("jesus@indexo.us", Setting::where('name', 'website_name')->first()->value." Error Push Calls ". date('d/m/Y H:i:s'), $e->getMessage(),  $this->getHeaders());
        }
    }

    /**
     * @return void
     */
    public function pushMediaRecordingNew()
    {
        $payload = file_get_contents('php://input'); // HTTP body content
        $event = $this->handlePayload($payload, 'Recordings');
        try{
            $data = (array)$event['data'];
            if(VoiceApp::where('app_id', $data['app_hash'])->first() && !Recording::where('hash', $data['hash'])->first()){
                // Map the array, changing the 'other_property' key to 'other_column'
                $recording = new Recording();
                $recording->hash = $data['hash'];
                $recording->type = $data['type'];
                $recording->did_hash = $data['did_hash'];
                $recording->did_intl_number = $data['did_intl_number'];
                $recording->did_local_number = $data['did_local_number'];
                $recording->app_name = $data['app_name'];
                $recording->app_hash = $data['app_hash'];
                $recording->callid = $data['callid'];
                $recording->date = $data['date'];
                $recording->date_read = $data['date_read'];
                $recording->duration = $data['duration'];
                $recording->cli_name = $data['cli_name'];
                $recording->cli_number = $data['cli_number'];
                $recording->status_read = $data['read'];
                $recording->status = $data['status'];
                $recording->url = $data['url'];
                $recording->file_size_total = $data['file_size_total'];
                $recording->save();
            }
        }catch (\Exception $e){
            mail("jesus@indexo.us", Setting::where('name', 'website_name')->first()->value." Error Push Recordings ". date('d/m/Y H:i:s'), $e->getMessage(),  $this->getHeaders());
        }

    }

    /**
     * Handle Payload
     * @param $payload
     * @param string $type
     * @return mixed
     */
    protected function handlePayload($payload, string $type): mixed
    {
        $wanted_signature = base64_encode(hash_hmac('MD5', $payload, env('CALLR_SECRET'), true));
        $received_signature = $_SERVER['HTTP_X_CALLR_HMACSIGNATURE']; // X-CALLR-HmacSignature
        if ($wanted_signature !== $received_signature) {
            $this->sendSMS(TargetNumber::where('status', true)->first()->number, 'Error signature', $this->getSMSOptions());
            /**
             * LET'S HANDLE SOME ERRORS HERE
             */
            return null;
        }
        return json_decode($payload, true);
    }

    /**
     * Subscribe to webhooks for new calls and recordings
     * @return mixed
     */
    public function subscribe(): mixed
    {

        $type = "";
        $endpoint = "";

        /*
        $type = 'call.outbound_hangup';
        $endpoint = route('webhook', 'pushcallsoutboundhangup');


        $type = 'media.recording.new';
        $endpoint = route('webhook', 'pushmediarecordingnew');
        */
        $options = array(
            'format' => "JSON",
            'hmac_algo' => "MD5",
            'hmac_secret' => env('CALLR_SECRET')
        );
        return $this->subscribeWebhook($type, $endpoint, $options);
    }

    /**
     * @return array
     */
    #[ArrayShape(['force_encoding' => "string", 'user_data' => "mixed"])] protected function getSMSOptions(): array
    {
        $websiteName = Setting::where('name', 'website_name')->first()->value;
        $userData = strlen($websiteName) > 32 ? substr($websiteName, 0, 25) . '...' : $websiteName;
        return array('force_encoding' => "GSM", 'user_data' => $userData);
    }

    private function getHeaders(){
        $headers = 'From: indexo <info@indexo.us>' . "\r\n";
        $headers .= "Reply-To: info@indexo.us \r\n";
        $headers .= "MIME-Version: 1.0\r\n";
        $headers .= "Content-Type: text/html; charset=UTF-8\r\n";
        return $headers;
    }
}
