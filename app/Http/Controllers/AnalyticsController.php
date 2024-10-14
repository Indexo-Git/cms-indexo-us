<?php

namespace App\Http\Controllers;

use Analytics;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Spatie\Analytics\OrderBy;
use Spatie\Analytics\Period;

class AnalyticsController extends Controller
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
     * Show analytics view
     * @return View
     */
    public function index(): View
    {
        $startDate = Carbon::now()->subYear();
        $endDate = Carbon::now();
        $period = Period::create($startDate, $endDate);
        //dd(Analytics::get($period, ['organicGoogleSearchAveragePosition', 'organicGoogleSearchClicks', 'organicGoogleSearchImpressions'], ['date'], 20, [OrderBy::dimension('date', true),], 0));
        return view('app.analytics.index')->with([
            'title' => 'analytics.title',
            'pageViews' => Analytics::fetchVisitorsAndPageViews($period),
            'totalVisitors' => Analytics::fetchTotalVisitorsAndPageViews($period),
            'searchConsoleData' => Analytics::get($period, ['organicGoogleSearchAveragePosition', 'organicGoogleSearchClicks', 'organicGoogleSearchImpressions'], ['date'], 20, [OrderBy::dimension('date', true),], 0)
        ]);
    }

}
