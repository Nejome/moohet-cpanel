<?php

namespace App\Http\Controllers;

use App\Order;
use App\Customer_order;
use App\Store;
use Illuminate\Http\Request;

class OrderController extends Controller
{

    public function index()
    {
        $orders = order::latest()->get();

        return view('admin.orders.index', compact('orders'));

    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show($id)
    {

        $order = Order::find($id);

        return view('admin.orders.show', compact('order'));

    }


    public function edit(order $order)
    {
        //
    }


    public function update(Request $request, order $order)
    {
        //
    }


    public function destroy(order $order)
    {
        //
    }

    public function change_status(Request $request, $id){

        $order = Order::find($id);

        if(isset($request->status) && $request->status != ''){

            $order->status = $request->status;

            if($request->status == 3){

                $order->lock = 1;

            }

        }

        if(isset($request->end_date) && $request->end_date != ''){

            $order->end_date = $request->end_date;

        }

        if(isset($request->arrival_date) && $request->arrival_date != ''){

            $order->arrival_date = $request->arrival_date;

        }

        $order->save();

        return redirect()->back();

    }

    public function change_customer_order_status($id, $customer_order_id){

        $order = Order::find($id);

        $customer_order = Customer_order::find($customer_order_id);

        if($customer_order->arrival_type == 1){

            $customer_order->position = 1;

            $customer_order->lock = 1;

            $customer_order->save();

        }else {

            $store = new Store;

            $store->owner = $customer_order->customer_id;
            $store->product_id = $customer_order->product_id;
            $store->order_id = $id;
            $store->customer_order_id = $customer_order_id;
            $store->amount = $customer_order->amount_value;

            $customer_order->position = 2;

            $customer_order->lock = 1;

            $customer_order->save();

            $store->save();

        }

        return redirect()->back();

    }
}
