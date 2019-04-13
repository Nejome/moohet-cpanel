<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use DB;
use Carbon\Carbon;
use App\Mail\PasswordReset;
use Illuminate\Support\Facades\Hash;

class PasswordResetController extends Controller
{

    public function find_user_page(){

        return view('password_reset.find_user');

    }

    public function find_user(Request $request){

        //validate the data

        $message = [
            'email.required' => 'عفوا قم بإدخال بريدك الالكتروني',
            'email.email' => 'عفوا قم بإدخال بريد الكتروني صالح'
        ];

        $this->validate($request, [
           'email' => 'required|email'
        ], $message);

        //find the user , if not founded redirect back

        $user = User::where('email', $request->email)->first();

        if(!$user){

            session()->flash('user_not_founded', 'عفوا لم يتم تسجيل حساب لدينا بالبريد الالكتروني الذي ادخلته');

            return redirect()->back();

        }

        //create the token and save it in the data base

        DB::table('password_resets')->insert([
            'email' => $request->email,
            'token' => str_random(60),
            'created_at' => Carbon::now()
        ]);

        $token_data = DB::table('password_resets')
            ->where('email', $request->email)->first();

        $token = $token_data->token;

        $email = $request->email;

        $link = url('/password_reset/verify/'.$token);

        //send the email in link

        \Mail::to($email)->send(new PasswordReset($link));

        //redirect to wait page

        return redirect(url('/password_reset/email_sent'));

    }

    public function email_sent(){

        return view('password_reset.email_sent');

    }

    public function wrong_token(){

        return view('password_reset.wrong_token');

    }

    public function verify($token){

        $token_data = DB::table('password_resets')
            ->where('token', $token)->first();

        if(!$token_data){

            return redirect(url('/password_reset/wrong_token'));

        }

        return view('password_reset.create_password', compact('token'));

    }

    public function create_password(Request $request, $token){

        $token_data = DB::table('password_resets')
            ->where('token', $token)->first();

        if(!$token_data){

            return redirect(url('/password_reset/wrong_token'));

        }

        //validate the input

        $message = [
          'password.required' => 'عفوا قم بإدخال كلمة المرور',
          'password.confirmed' => 'كلمة المرور وتأكيد كلمة المرور غير متطابقين',
        ];

        $this->validate($request, [
           'password' => 'required|confirmed',
        ], $message);

        $user = User::where('email', $token_data->email)->first();

        $user->password = Hash::make($request->password);

        $user->save();

        //delete the token

        DB::table('password_resets')
            ->where('token', $token)->delete();

        //redirect

        return redirect(url('/password_reset/complete'));

    }

    public function complete(){

        return view('password_reset.complete');

    }

}
