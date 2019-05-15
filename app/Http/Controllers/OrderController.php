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


    public function show($id)
    {

        $order = Order::find($id);

        return view('admin.orders.show', compact('order'));

    }


    public function change_status(Request $request, $id){

        $order = Order::find($id);

        if(isset($request->status) && $request->status != ''){

            $order->status = $request->status;

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

    public function arrived_orders() {

        $orders = order::where('status', 3)->get();

        return view('admin.orders.delivery_orders.arrived_orders', compact('orders'));

    }

    public function arrived_orders_customers($id) {

        $order = order::find($id);

        return view('admin.orders.delivery_orders.arrived_orders_customers', compact('order'));

    }

}
