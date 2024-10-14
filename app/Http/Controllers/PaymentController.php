<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PaymentController extends Controller
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
     * Show payment page
     * @return View
     */
    public function index(): View
    {
        return view('web.payment')->with([
            'title' => 'Pago',
            'metaTitle' => 'Pago',
            'description' => '',
            'keywords' => '',
            'metaImage' => 'meta-default',
            'breadcrumbs' => 'Pago',
            'noIndex' => true
        ]);
    }
}
