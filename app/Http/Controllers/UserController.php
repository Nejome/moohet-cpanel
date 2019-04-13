<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{

    public function index()
    {

        return view('admin.users_list');

    }


    public function create()
    {

        return view('admin.add_user');

    }


    public function store(Request $request)
    {

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email',
            'password' => 'required|confirmed',
        ]);

        $user = new User;

        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->activity = $request->activity;
        $user->role = 1;

        $user->save();

        return redirect('/admin');

    }


    public function show($id)
    {



    }


    public function edit($id)
    {

        $user = User::find($id);

        return view('admin.user_profile', compact('user'));

    }


    public function update(Request $request, $id)
    {

        $user = User::find($id);

        $messages = [
            'name.required' => 'عفوا قم بملء حقل الإسم',
            'email.email' => 'عفوا قم بملء حقل البريد الالكتروني ببريد الكتروني صحيح',
        ];

        $this->validate($request, [
            'name' => 'required',
            'email' => 'email'
        ], $messages);

        if(isset($request->image) && $request->image != ''){

            $this->validate($request, [
                'image' => 'image|mimes:jpeg,png,jpg,gif,svg'
            ]);

        }

        if(isset($request->current_password) && $request->current_password != ''){

            if (!Hash::check($request->current_password, $user->password)) {

                return back()->withErrors(['incorrect_password' => 'كلمة المرور الحالية التي ادخلتها غير صحيحه']);

            }

            $this->validate($request, [
               'password.confirmed' => 'ادخل كلمتي مرور متطابقتين',
            ]);

            $user->password = Hash::make($request->password);

        }

        $user->name = $request->name;

        $user->email = $request->email;

        if(isset($request->image) && $request->image != ''){

            $imageName = time().'.'.request()->image->getClientOriginalExtension();

            request()->image->move(public_path('images'), $imageName);

            $user->image = $imageName;

        }

        $user->save();

        session()->flash('message', 'تم تعديل بياناتك بنجاح');

        return back();

    }


    public function destroy($id)
    {
        //
    }

    public function closeAccount($id){

        $user = User::find($id);

        $user->activity = 0;

        $user->save();

        return back();

    }

    public function openAccount($id){

        $user = User::find($id);

        $user->activity = 1;

        $user->save();

        return back();

    }

}
