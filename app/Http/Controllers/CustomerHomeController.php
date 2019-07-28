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

        return view('client.home');

    }

}
