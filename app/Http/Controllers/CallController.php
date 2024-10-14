<?php

namespace App\Http\Controllers;

use App\Models\Call;
use App\Models\Recording;
use Illuminate\View\View;

class CallController extends Controller
{
    /**
     * Create a new controller instance.
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth')->except('single');
    }

    /**
     * Show calls page
     * @return View
     */
    public function index(): View
    {
        //dd(Call::all(), Recording::all());
        return view('app.call.index')->with([
            'title' => 'calls.title',
            'calls' => Call::all()
        ]);
    }
}
