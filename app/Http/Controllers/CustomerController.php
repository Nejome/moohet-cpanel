<?php

namespace App\Http\Controllers;

use App\Customer;
use App\Customer_order;
use App\Store;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Socialite;
use App\Wallet_information;
use App\Mail\VerifyEmail;
use App\unverifiedCustomer;
use App\User;
use File;

class CustomerController extends Controller
{

    public function redirectToProvider(){

        return Socialite::driver('google')->redirect();

    }

    public function handleProviderCallback(){

        try {

            $customer = Socialite::driver('google')->user();

        }catch(Exception $e){

            return redirect(url('/customers/create'));

        }

        $existingUser = User::where('email', $customer->email)->first();

        if($existingUser){

            if($existingUser->activity == 0){

                return back()
                    ->withErrors(['account_closed' => 'عفواً تم اغلاق الحساب ، قم بمراجعة الادارة']);

            }

            Auth::login($existingUser);

        }else {

            //create the user
            $fileContents = file_get_contents($customer->getAvatar());
            $fileName = $customer->getId() . ".jpg";
            File::put(public_path() . '/images/' . $fileName, $fileContents);

            $user = new User;
            $user->name = $customer->name;
            $user->email = $customer->email;
            $user->google_id = $customer->id;
            $user->role = 2;
            $user->image = $fileName;
            $user->save();


            //store the customer data
            $new_customer = New Customer;
            $new_customer->user_id = $user->id;
            $new_customer->name = $user->name;
            $new_customer->save();

            $wallet = new Wallet_information;
            $wallet->customer_id = $new_customer->id;
            $wallet->purchases_total = 0;
            $wallet->sales_total = 0;
            $wallet->current_balance = 0;
            $wallet->save();

            //login
            Auth::loginUsingId($user->id);

        }

        return redirect('/home');

    }

    public function create()
    {

        return view('customers.create');

    }

    public function verify_email(Request $request){

        //validation
        $messages = [
            'name.required' => 'عفوا قم بملء حقل الإسم',
            'email.email' => 'عفوا قم بملء حقل البريد الالكتروني ببريد الكتروني صحيح',
            'password.confirmed' => 'كلمة المرور وتأكيد كملة المرور غير متطابقين',
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'password' => 'confirmed',
        ], $messages);


        $existingUser = User::where('email', $request->email)->first();

        if($existingUser){

            session()->flash('exist_msg', 'عفوا تم إنشاء حساب بهذا البريد الإلكتروني');

            return redirect('/');

        }else {

            //store the customer data in unverified-customer table

            $unverified_customer = new unverifiedCustomer;

            $unverified_customer->name = $request->name;
            $unverified_customer->email = $request->email;
            $unverified_customer->password = Hash::make($request->password);

            $unverified_customer->save();

            //generate the link

            $link = url('/customers/store/'.$unverified_customer->id);

            try {

                //send the email

                \Mail::to($request->email)->send(new VerifyEmail($link));

            }catch(\Exception $e){

                $unverified_customer->delete();

                session()->flash('mail_sending_error', 'حدث خطأ اثناء عملية التسجيل والتحقق من البريد الإلكتروني ، تأكد من بريدك الإلكتروني وقم بمحاولة اعادة التسجيل');

                return redirect()->back();

            }

            //redirect

            return redirect(url('/customers/waiting'));

        }

    }

    public function waiting(){

        return view('customers.waiting');

    }

    public function store($unverified_customer_id)
    {

        $unverified_customer = unverifiedCustomer::find($unverified_customer_id);

        //create the user
        $user = new User;

        $user->name = $unverified_customer->name;
        $user->email = $unverified_customer->email;
        $user->password = $unverified_customer->password;
        $user->role = 2;

        $user->save();

        //store the customer data
        $customer = New Customer;

        $customer->user_id = $user->id;
        $customer->name = $user->name;

        $customer->save();

        //store the wallet information

        $wallet = new Wallet_information;

        $wallet->customer_id = $customer->id;
        $wallet->purchases_total = 0;
        $wallet->sales_total = 0;
        $wallet->current_balance = 0;

        $wallet->save();

        $unverified_customer->delete();

        //login
        Auth::loginUsingId($user->id);

        //redirect to home
        return redirect(url('/customers/'.$customer->id.'/edit'));

    }


    public function edit($id)
    {

        $row = Customer::findOrFail($id);
        $orders_count = Customer_order::where(['customer_id' => $row->id])->count();
        $products_count = Store::where('customer_id', $row->id)->count();

         return view('client.customers.edit', compact(['row', 'orders_count', 'products_count']));

    }


    public function update(Request $request, $id)
    {

        $customer = Customer::find($id);
        $user = User::find($customer->user_id);

        //validate data and image
        $messages = [
            'name.required' => 'عفوا قم بملء حقل الإسم',
            'email.required' => 'عفوا قم بإدخال بريدك الإلكتروني',
            'email.email' => 'عفوا قم بإدخال بريد الكتروني صحيح'
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email'
        ], $messages);

        //update user data
        $user->email = $request->email;
        $user->save();

        //update customer data
        $customer->name = $request->name;
        $customer->country_code = $request->country_code;
        $customer->country = $request->country;
        $customer->town = $request->town;
        $customer->address = $request->address;
        $customer->identification_number = $request->identification_number;
        $customer->save();

        if(!is_null($customer->country_code) && $customer->country_code != ''
            && !is_null($customer->country) && $customer->country != ''
            && !is_null($customer->town) && $customer->town != ''
            && !is_null($customer->address) && $customer->address != ''
            && !is_null($customer->identification_number) && $customer->identification_number != ''
        ){

            $customer->data_complete = 1;
            $customer->save();

        }else {

            $customer->data_complete = 0;
            $customer->save();

        }

        //set flash message
        session()->flash('message', 'تم تعديل بياناتك بنجاح');

        //redirect
        return back();

    }

    public function change_image(Request $request, $id) {

        //validate the input
        $messages = [
           'image.required' => 'عفوا قم بإختيار الصورة الجديده',
           'image.image' => 'الملف الذي قمت بإختياره لا يمثل صورة'
        ];

        $this->validate($request, [
           'image' => 'required|image'
        ], $messages);

        $customer = Customer::find($id);

        //remove old image
        $old_image_path = public_path().'/images/'.$customer->user->image;

        if(file_exists($old_image_path)) {

            unlink($old_image_path);

        }

        //upload and save new image
        $new_image_name = time().'.'.$request->image->getClientOriginalExtension();
        $request->image->move(public_path('images'), $new_image_name);

        $customer->user->image = $new_image_name;
        $customer->user->save();

        //set flash message
        session()->flash('image_changed', 'تم تعديل صورتك الشخصية بنجاح');

        //redirect back
        return redirect()->back();


    }

    public function change_password($id){

        $customer = Customer::find($id);

        return view('client.customers.change_password', compact('customer'));

    }

    public function change_password_store(Request $request, $id){

        $customer = Customer::find($id);

        $user = User::find($customer->user_id);

        if($user->password != NULL){

            $message = [
                'current_password.required' => 'عفوا قم بإدخال كلمة المرور الحالية',
                'password.required' => 'ادخل كلمة المرور الجديده',
                'password.confirmed' => 'ادخل كلمتي مرور متطابقتين',
                'password_confirmation.required' => 'ادخل تأكيد كلمة المرور',
            ];

            $this->validate($request, [
                'current_password' => 'required',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ], $message);

            if (!Hash::check($request->current_password, $user->password)) {

                return back()->withErrors(['incorrect_password' => 'كلمة المرور الحالية التي ادخلتها غير صحيحه']);

            }

            $user->password = Hash::make($request->password);

            $user->save();

            session()->flash('password_changed', 'تم تعديل كلمة المرور بنجاح');

        }else {

            $message = [
                'password.required' => 'ادخل كلمة المرور الجديده',
                'password.confirmed' => 'ادخل كلمتي مرور متطابقتين',
                'password_confirmation.required' => 'ادخل تأكيد كلمة المرور',
            ];

            $this->validate($request, [
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ], $message);

            $user->password = Hash::make($request->password);

            $user->save();

            session()->flash('password_changed', 'تمت إضافة كلمة المرور بنجاح');

        }


        return redirect()->back();

    }



}
