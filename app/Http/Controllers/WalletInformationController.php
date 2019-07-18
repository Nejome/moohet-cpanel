<?php

namespace App\Http\Controllers;

use App\Wallet_information;
use Illuminate\Http\Request;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
use GuzzleHttp;
use Illuminate\Support\Facades\Input;
use App\payTabs_transaction;
use Illuminate\Support\Facades\Auth;
use App\Customer_order;

class WalletInformationController extends Controller
{


    public function show()
    {

        $customer_id = Auth::user()->customer->id;

        $wallet = Wallet_information::where('customer_id', $customer_id)->first();

        $orders = Customer_order::where('customer_id', $customer_id)->get();

        return view('wallet.main', compact(['wallet', 'orders']));

    }


    public function charge(){

        $customer_id = Auth::user()->customer->id;

        $wallet = Wallet_information::where('customer_id', $customer_id)->first();

        $orders = Customer_order::where('customer_id', $customer_id)->get();

        $paytabs = payTabs_transaction::where('customer_id', $customer_id)
            ->where('type', '1')
            ->get();

        return view('wallet.charge', compact(['paytabs', 'wallet', 'orders']));

    }


    public function charge_transaction(Request $request, $customer_id){

        $wallet = Wallet_information::where('customer_id', $customer_id)->first();

        if($wallet->customer->data_complete == 0){

            session()->flash('complete_data_msg', 'عفوا قم بإكمال بياناتك الشخصية من صفحة بياناتي حتي تستطيع اجراء المعاملات المالية.');

            return back();

        }

        $name = $this->splitName($wallet->customer->name);

        $amount = $request->amount;

        if($amount <= 0){
            return back()
                ->withErrors(['err_message' => 'عفوا تحقق من صحة المبلغ المدخل'] );
        }

        $messages = [
            'postal_code.required' => 'قم بإدخال الرمز البريدي',
            'postal_code.integer' => 'تأكد من صحة الرمز البريدي المدخل'
        ];

        $this->validate($request, [
            'postal_code' => 'required|integer'
        ], $messages);

        $client = new Client();

        $result = $client->post('https://www.paytabs.com/apiv2/create_pay_page', [
            'form_params' => [
                "merchant_email" => env('PAYTABS_MERCHANT_EMAIL'),
                "secret_key" =>env('PAYTABS_MERCHANT_SECRET_KEY'),
                "site_url" => env('PAYTABS_MERCHANT_SITE_URL'),
                "return_url" => env('PAYTABS_MERCHANT_RETURN_URL'),
                "title" => 'شحن رصيد',
                "cc_first_name" => $name[0],
                "cc_last_name" => $name[1],
                "cc_phone_number" => $wallet->customer->country_code,
                "phone_number" => $wallet->customer->phone,
                "email" => $wallet->customer->user->email,
                "products_per_title" => "Charge Balance",
                "unit_price" => $amount,
                "quantity" => "1",
                "other_charges" => "00.00",
                "amount" => $amount,
                "discount" => "00.00",
                "currency" => "SAR",
                "reference_no" => "000",
                "ip_customer" => $request->ip(),
                "ip_merchant" => env('PAYTABS_MERCHANT_IP'),
                "billing_address" => $wallet->customer->address,
                "city" => $wallet->customer->country,
                "state" => $wallet->customer->town,
                "postal_code" => $request->postal_code,
                "country" => "SAU",
                "shipping_first_name" => "none",
                "shipping_last_name" => "none",
                "address_shipping" => "none",
                "state_shipping" => "none",
                "city_shipping" => "none",
                "postal_code_shipping" => $request->postal_code,
                "country_shipping" => "SAU",
                "msg_lang" => "Arabic",
                "cms_with_version" => "Laravel 5.7",
            ]
        ]);

        /*echo $result->getBody();*/

        if(json_decode($result->getBody())->response_code == "4001"){

            session()->flash('complete_data_msg', 'عفوا قم بإكمال بياناتك الشخصية من صفحة بياناتي حتي تستطيع اجراء المعاملات المالية.');

            return redirect()->back();

        }elseif(json_decode($result->getBody())->response_code == "4012") {

            return redirect(json_decode($result->getBody())->payment_url);

        }else {

            session()->flash('some_error', 'حدث خطأ اثناء عملية شحن الرصيد ، قم بالمحاولة في وقت اخر او قم بالتواصل مع ادارة محيط');

            return redirect()->back();
        }

    }

    public function charge_callback(Request $request){

        $paytab = new payTabs_transaction;

        $paytab->payment_reference = $request->payment_reference;

        $paytab->customer_id = Auth::user()->customer->id;

        $wallet = Wallet_information::where('customer_id', Auth::user()->customer->id)->first();

        $payment_reference = $request->payment_reference;

        $client = new Client();

        $result = $client->post('https://www.paytabs.com/apiv2/verify_payment', [
            'form_params' => [
                'merchant_email' => env('PAYTABS_MERCHANT_EMAIL'),
                'secret_key' => env('PAYTABS_MERCHANT_SECRET_KEY'),
                'payment_reference' => $payment_reference,
            ]
        ]);


        if(json_decode($result->getBody())->response_code == "100") {

            //change the balance of the customer

            $wallet->current_balance = $wallet->current_balance + json_decode($result->getBody())->amount;

            $wallet->save();

            $paytab->status = '1';

            session()->flash('transaction_complete', 'تمت عملية شحن الرصيد بنجاح');

        }elseif(json_decode($result->getBody())->response_code == "481" || json_decode($result->getBody())->response_code == "482" || json_decode($result->getBody())->response_code == "481 - 482"){

            //new Code will be added there

            $paytab->status = '01';

            session()->flash('will_review_msg', 'تم ارسال الطلب وستتم المعالجة خلال 24 ساعة');

        }else {

            $paytab->status = '0';

            session()->flash('after_error', 'عفوا لم تتم عملية شحن الرصيد ، قم بالمحاولة لاحقا او تحقق من حسابك');

        }

        //store the transaction in the PayTabs transaction table

        $paytab->response_code = json_decode($result->getBody())->response_code;

        if(isset(json_decode($result->getBody())->result) && json_decode($result->getBody())->result != ''){
            $paytab->result = json_decode($result->getBody())->result;
        }else {
            $paytab->result = '-';
        }

        if(isset(json_decode($result->getBody())->pt_invoice_id) && json_decode($result->getBody())->pt_invoice_id != ''){
            $paytab->pt_invoice_id = json_decode($result->getBody())->pt_invoice_id;
        }else {
            $paytab->pt_invoice_id = '-';
        }

        if(isset(json_decode($result->getBody())->amount) && json_decode($result->getBody())->amount != ''){
            $paytab->amount = json_decode($result->getBody())->amount;
        }else {
            $paytab->amount = '-';
        }

        if(isset(json_decode($result->getBody())->reference_no) && json_decode($result->getBody())->reference_no != ''){
            $paytab->reference_no = json_decode($result->getBody())->reference_no;
        }else {
            $paytab->reference_no = '-';
        }

        if(isset(json_decode($result->getBody())->transaction_id) && json_decode($result->getBody())->transaction_id != ''){
            $paytab->transaction_id = json_decode($result->getBody())->transaction_id;
        }else {
            $paytab->transaction_id = '-';
        }

        $paytab->type = '1';

        $paytab->save();

        return redirect('/my_wallet/charge');

    }

    public function transaction_list($customer_id){

        $paytabs = payTabs_transaction::where('customer_id', $customer_id)
            ->where('type', '1')
            ->get();

        return view('wallet.charge_transaction_list', compact('paytabs'));

    }

    public function refund_transaction(Request $request, $customer_id, $transaction_id){

        $client = new Client;

        $transaction = payTabs_transaction::find($transaction_id);

        $message = ['refund_reason.required' => 'عفوا قم بإدخال سبب طلب الإستعادة'];

        $this->validate($request, [
           'refund_reason' => 'required'
        ], $message);

        $response = $client->post('https://www.paytabs.com/apiv2/refund_process', [
            'form_params' => [
                'merchant_email' => env('PAYTABS_MERCHANT_EMAIL'),
                'secret_key' => env('PAYTABS_MERCHANT_SECRET_KEY'),
                'refund_amount' => $transaction->amount,
                'refund_reason' => $request->refund_reason,
                'transaction_id' => $transaction->transaction_id,
            ]
        ]);

        echo $response->getBody();

    }

    public function splitName($name){

        $name_array = explode(' ', $name);

        $first_name = $name_array[0];

        $length = sizeof($name_array);

        $last_name = '';

        for($i = 1; $i < $length; $i ++){

            $last_name .= ' '.$name_array[$i];

        }

        return array($first_name, $last_name);

    }
}