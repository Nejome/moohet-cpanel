<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Customer_order;
use App\Store;
use App\Wallet_information;
use Illuminate\Support\Facades\Auth;

class CustomerHomeController extends Controller
{

    public function home() {

        $orders_count = Customer_order::where(['customer_id' => Auth::user()->customer->id])->count();
        $products_count = Store::where('customer_id', Auth::user()->customer->id)->count();
        $wallet = Wallet_information::where('customer_id', Auth::user()->customer->id)->firstOrFail();

        return view('home', compact(['orders_count', 'products_count', 'wallet']));

    }

}
