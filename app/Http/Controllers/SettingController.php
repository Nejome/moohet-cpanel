<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;

class SettingController extends Controller
{

    public function index() {

        $setting = Setting::findOrFail(1);

        return view('admin.settings.index', compact('setting'));

    }

    public function update(Request $request){

        $setting = Setting::findOrFail(1);

        $messages = [
            'name.required' => 'عفوا قم بإدخال اسم الموقع',
            'revoke_duration.required' => 'عفوا قم بادخال فترة سحب النقود',
            'revoke_amount.required' => 'عفوا قم بإدخال  الحد الادني للسماح بسحب الرصيد',
            'revoke_duration.integer' => 'عفوا قم بادخال قيمة صحيحة لفترة سحب النقود',
            'revoke_amount.integer' => 'عفوا قم بإدخال قيمة صحيحة للحد الادني للسماح بسحب الرصيد'
        ];

        $this->validate($request, [
           'name' => 'required',
            'revoke_duration' => 'required',
            'revoke_amount' => 'required',
            'revoke_duration' => 'integer',
            'revoke_amount' => 'integer'
        ], $messages);

        $setting->name = $request->name;
        $setting->email = $request->email;
        $setting->phone = $request->phone;
        $setting->fax = $request->fax;
        $setting->location = $request->location;
        $setting->description = $request->description;
        $setting->keywords = $request->keywords;
        $setting->privacy_policy = $request->privacy_policy;
        $setting->terms_condition = $request->terms_condition;
        $setting->revoke_duration = $request->revoke_duration;
        $setting->revoke_amount = $request->revoke_amount;
        $setting->save();

        session()->flash('update_success', 'تم تعديل اعدادات الموقع بنجاح');

        return redirect()->back();

    }

}
