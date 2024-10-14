<?php

namespace App\Providers;

use App\Models\Attribute;
use App\Models\Category;
use App\Models\Characteristic;
use App\Models\Message;
use App\Models\Order;
use App\Models\Service;
use App\Models\Setting;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        View::composer('app.*', function ($view) {
            $view->with([
                'cart' => Auth::check() ? Order::cart(Auth::id())->first() : Order::cart(session()->getId())->first(),
                'unread' => Message::where('status_read', 0)->get()
            ]);
        });

        View::composer('web.*', function ($view) {
            $view->with([
                'services' => Service::all()
            ]);
        });

        view()->composer('*', function ($view)
        {
            $view->with([
                'settings' => Setting::all()->keyBy('name')
            ]);
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
