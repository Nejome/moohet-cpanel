<?php

namespace App\Http\Controllers;

use App\Customer_order;
use App\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CustomerOrderController extends Controller
{

    public function index()
    {

        $customer = Customer::where('user_id', Auth::user()->id)->firstOrFail();

        $orders = Customer_order::where('customer_id', $customer->id)->get();

        return view('customer_order.index', compact('orders'));

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

        $order = Customer_order::find($id);

        return view('customer_order.show', compact('order'));

    }


    public function edit(Customer_order $customer_order)
    {
        //
    }


    public function update(Request $request, Customer_order $customer_order)
    {
        //
    }


    public function destroy(Customer_order $customer_order)
    {
        //
    }
}
