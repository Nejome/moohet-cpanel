<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RevokeOrder;

class MoneyRevokeController extends Controller
{

    public function revoke_orders() {

        $orders = RevokeOrder::where('complete', 0)->get();

        return view('admin.money_revoke.revoke_orders', compact('orders'));

    }

}
