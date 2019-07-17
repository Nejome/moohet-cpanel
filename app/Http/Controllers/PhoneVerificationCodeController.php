<?php

namespace App\Http\Controllers;

use App\phone_verification_code;
use Illuminate\Http\Request;
use Unirest;
use App\Customer;

class PhoneVerificationCodeController extends Controller
{

    public function create()
    {

        return view('phone_verification_code.create');

    }


    public function store(Request $request, $customer_id)
    {

        //validate the phone number

        $message = [
            'phone.required' => 'عفواً قم بإدخال رقم الهاتف',
            'phone.integer' => 'عفواً قم بإدخال رقم هاتف صحيح',
        ];

        $this->validate($request, [
            'phone' => 'required|numeric'
        ], $message);

        //generate the code

        $digits = 4;
        $code = rand(pow(10, $digits-1), pow(10, $digits)-1);

        //send the code to the phone number

        $headers = array('Accept' => 'application/json');

        $data = [
            'apiKey' => env('MOBILY_API_KEY'),
            'numbers' => $request->phone,
            'sender' => 'Moohet',
            'msg' => $code,
            'lang' => '3',
            'applicationType' => '68'
        ];

        $body = Unirest\Request\Body::form($data);

        $response = Unirest\Request::post('http://www.mobily.ws/api/msgSend.php', $headers, $body);

        //set the flash message & insert the  code

        if($response->body == 1){

            session()->flash('sent_message', 'تم ارسال الكود بنجاح');

            //insert the code in the data base

            $phone_code = new phone_verification_code;

            $phone_code->customer_id = $customer_id;

            $phone_code->code = $code;

            $phone_code->phone = $request->phone;

            $phone_code->save();

        }else {

            session()->flash('error_message', 'لم يتم ارسال الكود ، قم بالتأكد من رقمك وحاول مره اخري');

            if($response->body == 2){

                //send notification to admin

            }

        }

        //redirect

        return redirect()->back();

    }

    public function check_code(Request $request, $customer_id){

        //validate the entered code

        $message = [
            'code.required' => 'عفوا قم بإدخال كود التحقق',
        ];

        $this->validate($request, [
           'code' => 'required',
        ], $message);

        //get the saved code in data base

        $saved_code = phone_verification_code::where('customer_id', $customer_id)->first();

        if($saved_code == NULL){

            session()->flash('wrong_code', 'عفوا كود التحقق الذي ادخلته غير صحيح');

            return redirect()->back();

        }

        //compare the entered code with the one saved in the data base & set flash message

        if($request->code == $saved_code->code){

            //insert the phone number

            $customer = Customer::find($customer_id);

            $customer->phone = $saved_code->phone;

            $customer->save();

            //delete the verification code

            $saved_code->delete();

            session()->flash('phone_verified', 'تم التحقق من واضافة رقم الهاتف الخاص بك بنجاح');

            //redirect to the profile page

            return redirect(url('/customers/'.$customer_id.'/edit'));

        }else {

            //set the flash message

            session()->flash('wrong_code', 'عفوا كود التحقق الذي ادخلته غير صحيح');

            //redirect back

            return redirect()->back();

        }

    }

}
