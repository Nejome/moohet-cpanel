<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Message;
use App\Notification;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->composer('*', function($view) {

            $new_messages_number = Message::where('showed', 0)->count();
            $new_notifications_number = Notification::where(['owner_id' => Auth()->check() && Auth()->user()->role == 2 ? Auth()->user()->customer->id : null , 'showed' => 0])->count();
            $notifications = Notification::where('owner_id',Auth()->check() && Auth()->user()->role == 2 ? Auth()->user()->customer->id : null)->limit(5)->get();
            $admin_notifications = Notification::where('owner_id', 0)->limit(5)->get();

            $view->with([
                'new_messages_number' => $new_messages_number,
                'new_notifications_number' => $new_notifications_number,
                'customer_global_notifications' => $notifications,
                'admin_global_notifications' => $admin_notifications,
                ]);

        });

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
