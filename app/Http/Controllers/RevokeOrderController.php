<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\RevokeOrder;
use App\Wallet_information;
use App\Setting;
use Carbon\Carbon;

class RevokeOrderController extends Controller
{

    public function index() {

        $orders = RevokeOrder::where('customer_id', Auth::user()->customer->id)->get();

        return view('revoke_orders.index', compact('orders'));

    }

    public function create() {

        return view('revoke_orders.create');

    }

    public function store(Request $request) {

        $setting = Setting::findOrFail(1);
        $wallet = Wallet_information::where('customer_id', Auth::user()->customer->id)->first();

        //validate the data
        $messages = [
            'amount.required' => 'عفوا قم بإدخال المبلغ',
            'amount.numeric' => 'عفوا قم بإدخال قيمة صحيحة للمبلغ',
            'amount.max' => 'عفوا انت لا تملك هذا القدر من المبلغ في محفظتك في محيط',
            'account_number.required' => 'عفوا قم بإدخال رقم الحساب',
            'account_number.integer' => 'عفوا قم بإدخال رقم حساب صحيح',
            'bank.required' => 'عفوا قم بإدخال اسم البنك',
            'branch.required' => 'عفوا قم بإدخال اسم الفرع'
        ];

        $this->validate($request, [
           'amount' => 'required|numeric|max:'.$wallet->current_balance,
           'account_number' => 'required|integer',
           'bank' => 'required',
           'branch' => 'required'
        ], $messages);


        //check if customer allowed to create revoke order
        if($wallet->current_balance > $setting->revoke_amount && $wallet->last_balance_conversion == null){

            //create the order
            $order  = new RevokeOrder;
            $order->customer_id = Auth::user()->customer->id;
            $order->amount = $request->amount;
            $order->bank = $request->bank;
            $order->branch = $request->branch;
            $order->account_number = $request->account_number;
            $order->notes = $request->notes;
            $order->save();

            //set flash message and redirect to revoke orders index
            session()->flash('order_created', 'تم انشاء طلب السحب الجديد بنجاح');
            return redirect(url('/revoke_orders'));

        }elseif($wallet->current_balance > $setting->revoke_amount && $wallet->last_balance_conversion != null) {

            $today = Carbon::today();

            $last_conversion = Carbon::parse($wallet->last_balance_conversion);
            $last_conversion = $last_conversion->addDays($setting->revoke_duration);

            if($today->gt($last_conversion)){

                //create the order
                $order  = new RevokeOrder;
                $order->customer_id = Auth::user()->customer->id;
                $order->amount = $request->amount;
                $order->bank = $request->bank;
                $order->branch = $request->branch;
                $order->account_number = $request->account_number;
                $order->notes = $request->notes;
                $order->save();

                //set flash message and redirect to revoke orders index
                session()->flash('order_created', 'تم انشاء طلب السحب الجديد بنجاح');
                return redirect(url('/revoke_orders'));

            }else {

                session()->flash('not_allowed', 'عفوا لا يمكنك تقديم طلب سحب رصيد حاليا ، قم بالتواصل معنا لمزيد من التفاصيل');
                return redirect()->back();

            }

        }else {

            session()->flash('not_allowed', 'عفوا لا يمكنك تقديم طلب سحب رصيد حاليا ، قم بالتواصل معنا لمزيد من التفاصيل');
            return redirect()->back();

        }

    }

    public function completed() {



    }

}
