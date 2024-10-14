<?php
namespace App\Traits;

use App\Models\Setting;
use Illuminate\Validation\ValidationException;

trait reCaptchaTrait
{
    /**
     * Validate Google's reCaptcha
     *
     * @param $token
     * @return mixed
     */
    protected function validateCaptcha($token): mixed
    {
        // Set Google variables
        $googleURL = "https://www.google.com/recaptcha/api/siteverify";
        $googleData = [
            'secret' => env('GOOGLE_RECAPTCHA_SECRET'),
            'response' => $token
        ];
        $options = [
            'http' => [
                'header' => "Content-type: application/x-www-form-urlencoded",
                'method' => 'POST',
                'content' => http_build_query($googleData)
            ]
        ];
        $context = stream_context_create($options);
        // Verify token
        $response = file_get_contents($googleURL, false, $context);
        $res =  json_decode($response, true);
        //dd($res);
        if($res['success']) {
            return null;
        }
        throw ValidationException::withMessages([
            'g-token' => trans('validation.g-token.'.$res['error-codes'][0]),
        ]);
    }
}
