<?php

namespace App\Http\Controllers;

use App\payTabs_transaction;
use Illuminate\Http\Request;
use App\Customer;

class PayTabsTransactionController extends Controller
{

    public function charge_operations($status_filter = 'no'){

        if($status_filter == 'no'){

            $operations = payTabs_transaction::where('type', '1')->get();

        }else {

            $operations = payTabs_transaction::where('type', '1')
                ->where('status', $status_filter)
                ->get();

        }

        return view('admin.financial.charge_operations', compact('operations'));

    }

    public function charge_operations_of($customer_id, $status_filter = 'no'){

        $customer = Customer::find($customer_id);

        if($status_filter == 'no'){

            $operations = payTabs_transaction::where('customer_id', $customer_id)
                ->where('type', '1')
                ->get();

        }else {

            $operations = payTabs_transaction::where('customer_id', $customer_id)
                ->where('type', '1')
                ->where('status', $status_filter)
                ->get();

        }

        return view('admin.financial.charge_operations_of', compact(['operations', 'customer']));

    }

    public function index()
    {
        //
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(payTabs_transaction $payTabs_transaction)
    {
        //
    }


    public function edit(payTabs_transaction $payTabs_transaction)
    {
        //
    }


    public function update(Request $request, payTabs_transaction $payTabs_transaction)
    {
        //
    }


    public function destroy(payTabs_transaction $payTabs_transaction)
    {
        //
    }
}
