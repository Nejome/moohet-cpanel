<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class order extends Model
{

    public static function boot() {

        parent::boot();

         $orders = static::where('status', 0)->get();

         $today = Carbon::today();

         foreach($orders as $order){

             if($today->greaterThan($order->end_date)){

                 //

             }

         }

    }

    public function product(){

        return $this->belongsTo('App\Product');

    }

    public function customers_orders(){

        return $this->hasMany('App\Customer_order');

    }

}
