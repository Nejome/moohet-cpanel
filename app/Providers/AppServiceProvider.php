<?php

namespace App\Providers;

use App\Customer_order;
use App\Store;
use App\Wallet_information;
use Illuminate\Support\Facades\Auth;
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
            $notifications = Notification::where('owner_id',Auth()->check() && Auth()->user()->role == 2 ? Auth()->user()->customer->id : null)->limit(5)->latest()->get();
            $admin_notifications = Notification::where('owner_id', 0)->limit(5)->get();

            $view_vars = [
                'new_messages_number' => $new_messages_number,
                'new_notifications_number' => $new_notifications_number,
                'customer_global_notifications' => $notifications,
                'admin_global_notifications' => $admin_notifications,
            ];

            if(Auth::check() && Auth::user()->role == 2){

                $public_orders_count = Customer_order::where(['customer_id' =>  Auth::user()->customer->id])->count();
                $public_products_count = Store::where('customer_id',  Auth::user()->customer->id)->count();
                $public_wallet = Wallet_information::where('customer_id',  Auth::user()->customer->id)->firstOrFail();

                $view_vars['public_orders_count'] = $public_orders_count;
                $view_vars['public_products_count'] = $public_products_count;
                $view_vars['public_wallet'] = $public_wallet;

            }

            $view->with($view_vars);

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
