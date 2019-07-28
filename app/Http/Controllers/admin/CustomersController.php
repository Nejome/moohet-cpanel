<?php

namespace App\Http\Controllers\admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CustomersController extends Controller
{

    public function index(){

        $customers = Customer::all();

        return view('admin.customers.list', compact('customers'));

    }

}
