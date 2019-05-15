<?php

namespace App\Http\Controllers;

use App\Customer_order;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Notification;

class CustomerOrderController extends Controller
{

    public function index() {

        $customer = Customer::where('user_id', Auth::user()->id)->firstOrFail();

        $orders = Customer_order::where('customer_id', $customer->id)->get();

        return view('customer_order.index', compact('orders'));

    }


    public function show($id) {

        $order = Customer_order::findOrFail($id);

        return view('customer_order.show', compact('order'));

    }

    public function set_arrived($id) {

        $order = Customer_order::find($id);
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

        return 'true';

    }


}
