<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use OpenAI\Laravel\Facades\OpenAI;

class TestController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('single');
    }

    public function openAI(){
        $result = OpenAI::completions()->create([
            'model' => 'text-davinci-003',
            'prompt' => 'What is PHP',
        ]);

        echo $result['choices'][0]['text'];
    }

    public function print(){
        dd(Setting::where('name', 'website_name')->first()->value);
    }
}
