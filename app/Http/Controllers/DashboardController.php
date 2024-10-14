<?php

namespace App\Http\Controllers;


use Analytics;
use App\Models\WebDesignQuote;
use Carbon\Carbon;
use App\Models\Call;
use App\Models\Category;
use App\Models\Message;
use App\Models\Post;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;
use Spatie\Analytics\OrderBy;
use Spatie\Analytics\Period;

class DashboardController extends Controller
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
     * Show dashboard based on user's type
     * @return View
     */
    public function index(): View
    {
        // return Auth::user()->isAdmin() ? $this->admin() : $this->user();
        return $this->admin();
    }

    /**
     * Show admin dashboard.
     *
     * @return View
     */
    public function admin(): View
    {
        // Setting dates for queries
        $currentYear = date('Y');
        $currentMonth = date('m');
        $startOfMonth = "{$currentYear}-{$currentMonth}-01 00:00:00";
        $endOfMonth = date('Y-m-t 23:59:59', strtotime($startOfMonth));
        // Setting arrays
        $monthsOfYear = range(1, 12); // Array representing all months
        $callsByMonth = array_fill_keys($monthsOfYear, 0); // Initialize counts to zero
        $messagesByMonth = array_fill_keys($monthsOfYear, 0); // Initialize counts to zero
        $quotesByMonth = array_fill_keys($monthsOfYear, 0); // Initialize counts to zero
        // Executing query's
        $callsMonth = DB::table('calls')
            ->select(DB::raw('MONTH(start) as month'), DB::raw('COUNT(*) as call_count'))
            ->whereYear('start', '=', $currentYear)
            ->groupBy(DB::raw('MONTH(start)'))
            ->orderBy(DB::raw('MONTH(start)'))
            ->get();
        $messagesYear = DB::table('messages')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as message_count'))
            ->whereYear('created_at', '=', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
        $quotesYear = DB::table('web_design_quotes')
            ->select(DB::raw('MONTH(created_at) as month'), DB::raw('COUNT(*) as quote_count'))
            ->whereYear('created_at', '=', $currentYear)
            ->groupBy(DB::raw('MONTH(created_at)'))
            ->orderBy(DB::raw('MONTH(created_at)'))
            ->get();
        // Fill arrays by month array
        foreach ($callsMonth as $call) {
            $callsByMonth[$call->month] = $call->call_count;
        }
        foreach ($messagesYear as $message) {
            $messagesByMonth[$message->month] = $message->message_count;
        }
        foreach ($quotesYear as $quote) {
            $quotesByMonth[$quote->month] = $quote->quote_count;
        }
        $startDate = Carbon::createFromFormat('Y-m-d H:i:s', $startOfMonth);
        $endDate = Carbon::createFromFormat('Y-m-d H:i:s', $endOfMonth);
        $period = Period::create($startDate, $endDate);
        return view('app.dashboard.admin')->with([
            'title' => 'dashboard.title',
            'monthlyCalls' =>  Call::where('start', '>=', $startOfMonth)->where('start', '<=', $endOfMonth)->get(),
            'callsByMonth' => $callsByMonth,
            'monthlyMessages' =>  Message::where('created_at', '>=', $startOfMonth)->where('created_at', '<=', $endOfMonth)->get(),
            'messagesByMonth' => $messagesByMonth,
            'monthlyQuotes' =>  WebDesignQuote::where('created_at', '>=', $startOfMonth)->where('created_at', '<=', $endOfMonth)->get(),
            'quotesByMonth' => $quotesByMonth,
            'countViewCats' => Category::withCount(['views' => function ($query) use ($startOfMonth, $endOfMonth) {$query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);}])->get()->sum('views_count'),
            'countViewPosts' => Post::withCount(['views' => function ($query) use ($startOfMonth, $endOfMonth) {$query->whereBetween('created_at', [$startOfMonth, $endOfMonth]);}])->get()->sum('views_count'),
            'visitorsPageViews' => Analytics::fetchVisitorsAndPageViews($period)
        ]);
    }

    /**
     * Show user dashboard.
     *
     * @return View
     */
    public function user(): View
    {
        return view('app.dashboard.user')->with([
            'title' => 'dashboard.title'
        ]);
    }
}
