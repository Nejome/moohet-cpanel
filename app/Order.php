<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Customer_order;
use App\Wallet_information;
use App\Notification;

class order extends Model
{

    public static function boot() {

        parent::boot();

         $orders = static::where('status', 0)->get();

         $today = Carbon::today();

         foreach($orders as $order){

             $end_date = Carbon::parse($order->end_date);

             if($end_date->lt($today)){

                 //check the current amount
                 if($order->current_amount >= $order->product->less_amount_value){

                     //if current amount is grater then the less_amount , then change the order status to 1
                     $order->status = 1;
                     $order->save();

                     //send notification to admin and customers

                 }else {

                     //if current amount is less then the less_amount then , change the status to 3
                     $order->status = 3;
                     $order->save();

                     $customers_orders = Customer_order::where('order_id', $order->id)->get();

                     //loop through the customers order
                     foreach($customers_orders as $row){

                         //and foreach customer put the order cost in it's balance
                         $customer_wallet = Wallet_information::where('customer_id', $row->customer_id)->first();
                         $customer_wallet->purchases_total -= $row->total;
                         $customer_wallet->current_balance += $row->total;
                         $customer_wallet->save();

                         //set customer order to fail
                         $row->fail = 1;
                         $row->save();

                         //send notification for customers
                         $notification = new Notification;
                         $notification->owner_id = $row->customer_id;
                         $notification->title = 'تم إلغاء احدي الطلبيات التي شاركت فيها';
                         $notification->body = ' تم إلغاء طلبية منتج '.$order->product->name.' التي قمت بالمشاركة فيها ، نظراً لعدم إكتمال الحد الادني لكمية الطلبية . تم تحويل قيمة الطلبية التي دفعتها الي رصيدك الحالي وهي  '.$row->total.' ريال سعودي . وشكراً';
                         $notification->save();

                     }

                 }


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
