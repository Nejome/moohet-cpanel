<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\RevokeOrder;
use App\RevokeOperation;
use App\Notification;
use App\Wallet_information;

class MoneyRevokeController extends Controller
{

    public function revoke_orders(){

        $orders = RevokeOrder::where('complete', 0)->get();

        foreach ($orders as $order){
            $order->showed();
        }

        return view('admin.money_revoke.revoke_orders', compact('orders'));

    }

    public function process_order($id){

        $order = RevokeOrder::findOrFail($id);

        return view('admin.money_revoke.process_order', compact('order'));

    }

    public function store_revoke_operation(Request $request, $id){

        $messages = [
        'sender_account_number.required' => 'عفوا قم بإدخال رقم حساب المرسل',
        'transaction_id.required' => 'عفوا قم بإدخال رقم الحوالة',
        'transaction_date.required' => 'عفوا قم بإدخال تاريخ الحوالة'
        ];

        $this->validate($request, [
           'sender_account_number' => 'required',
            'transaction_id' => 'required',
            'transaction_date' => 'required'
        ], $messages);

        $order = RevokeOrder::findOrFail($id);

        $operation = new RevokeOperation;
        $operation->revoke_order_id = $order->id;
        $operation->sender_account_number = $request->sender_account_number;
        $operation->transaction_id = $request->transaction_id;
        $operation->transaction_date = $request->transaction_date;
        $operation->save();

        $order->complete = 1;
        $order->save();

        $wallet = Wallet_information::where('customer_id', $order->customer_id)->first();
        $wallet->current_balance -= $order->amount;
        $wallet->last_balance_conversion = date("Y-m-d");
        $wallet->save();

        $notification = new Notification;
        $notification->owner_id = $order->customer_id;
        $notification->title = 'تم تحويل مبلغ مالي الي حسابك البنكي';
        $notification->body = 'تم عرض طلب سحب الرصيد الاخير الذي ارسلته ، وتمت معالجة الطلب وتحويل المبلغ الي حسابك البنكي بنجاح ، لمزيد من التفاصيل قم بفتح صفحة طلبات سحب الرصيد المكتملة ، وشكرا';
        $notification->save();

        session()->flash('process_complete', 'تمت معالجة الطلب وارسال تفاصيل الحوالة بنجاح');

        return redirect(url('/admin/money_revoke/processed_orders'));

    }

    public function processed_orders(){

        $orders = RevokeOrder::where(['complete' => 1, 'admin_trash' => 0])->get();

        return view('admin.money_revoke.processed_orders', compact('orders'));

    }

    public function delete_order($id){

        $order = RevokeOrder::findOrFail($id);

        if($order->trash == 1){
            $order->delete();
        }else{
            $order->admin_trash = 1;
            $order->save();
        }

        session()->flash('order_deleted', 'تم حذف الطلب بنجاح');

        return redirect(url('/admin/money_revoke/processed_orders'));

    }

}
