<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Message;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        view()->share('new_messages_number', Message::where('showed', 0)->count());

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
