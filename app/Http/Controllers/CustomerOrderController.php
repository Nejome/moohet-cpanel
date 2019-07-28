<?php

namespace App\Http\Controllers;

use App\Customer_order;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;
use App\Store;

class CustomerOrderController extends Controller
{

    public function index() {

        $customer = Customer::where('user_id', Auth::user()->id)->firstOrFail();

        $orders = Customer_order::where('customer_id', $customer->id)->get();

        return view('client.customer_order.index', compact('orders'));

    }


    public function show($id) {

        $order = Customer_order::findOrFail($id);

        return view('client.customer_order.show', compact('order'));

    }

    public function set_arrived($id) {

        $order = Customer_order::findOrFail($id);
        $notification = new Notification;

        //change customer order state ; position - success
        $order->position = 1;
        $order->success = 1;
        $order->save();

        //send notification to customer
        $notification->owner_id = $order->customer_id;
        $notification->title = 'تم ايصال احدي طلبياتك الي موقعك';
        $notification->body = 'تم ايصال طلبيتك من منتج '.$order->order->product->name.' بنجاح الي موقك . لمزيد من الإستعلامات قم بالتواصل مع خدمة العملاء .';
        $notification->save();

        //set flash message
        session()->flash('arrived_success', 'تم ارسال اشعار التوصيل الي العميل');

        //redirect back
        return redirect()->back();

    }

    public function add_to_store($id) {

        $customer_order = Customer_order::findOrFail($id);
        $store = new Store;
        $notification = new Notification;

        //create new item in store based on customer order data
        $store->product_id = $customer_order->order->product->id;
        $store->customer_id = $customer_order->customer->id;
        $store->amount = $customer_order->amount;
        $store->selling_price = $customer_order->order->product->price;
        $store->save();

        //change customer order state
        $customer_order->position = 1;
        $customer_order->success = 1;
        $customer_order->save();

        //send notification to customer
        $notification->owner_id = $customer_order->customer_id;
        $notification->title = 'تم ايصال احدي طلبياتك الي مخازن محيط';
        $notification->body = 'تم ايصال طلبيتك من منتج '.$customer_order->order->product->name.' بنجاح الي مخازن محيط . وهي الان متاحة للبيع في كافة منصات محيط . لتعديل بيانات المنتج قم بالدخول الي صفحة منتجاتي ومن ثم اختر المنتج . لمزيد من الإستعلامات قم بالتواصل مع خدمة العملاء .';
        $notification->save();

        //set flash message
        session()->flash('added_success', 'تم ارسال اشعار التوصيل لمخازن محيط الي العميل');

        //redirect back
        return redirect()->back();

    }


}
