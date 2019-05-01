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

                     //send notification to admin
                     $admin_notification_success = new Notification;
                     $admin_notification_success->owner_id = 0;
                     $admin_notification_success->title = 'تم تحويل احدي الطلبيات الي حالة الشراء';
                     $admin_notification_success->body = 'تم تحويل طلبية منتج ' . $order->product->name . ' برقم' . $order->id . ' الي حالة الشراء ، وذلك بعد اكتمال الحد الادني لكمية الطلبية وانتهاء فترة الإنتظار';
                     $admin_notification_success->save();

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

                         //send notification to customer
                         $notification = new Notification;
                         $notification->owner_id = $row->customer_id;
                         $notification->title = 'تم إلغاء احدي الطلبيات التي شاركت فيها';
                         $notification->body = ' تم إلغاء طلبية منتج '.$order->product->name.' التي قمت بالمشاركة فيها ، نظراً لعدم إكتمال الحد الادني لكمية الطلبية و لإنتهاء فترة الانتظار . تم تحويل قيمة الطلبية التي دفعتها الي رصيدك الحالي وهي  '.$row->total.' ريال سعودي ، وايضاً تم خصم هذا المبلغ من مجموع المشتريات الخاص بك  . وشكراً';
                         $notification->save();

                     }

                     //send notification to admin
                     $admin_notification = new Notification;
                     $admin_notification->owner_id = 0;
                     $admin_notification->title = 'تم إلغاء احدي الطلبيات';
                     $admin_notification->body = 'تم إلغاء طلبية منتج ' . $order->product->name. ' رقم ' . $order->id .' نظراً لعدم إكتمال الحد الادني لكمية الطلبية ولإنتهاء فترة الانتظارة . تم تحويل مبالغ العملاء المدفوعة في الطلبية الي ارصدتهم بالمحفظة وخصم المبالغ المدفوعة من مجموع المشتريات';
                     $admin_notification->save();

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
