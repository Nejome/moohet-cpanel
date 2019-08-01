<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Message;

class MessagesController extends Controller
{

    public function create(Request $request) {

        $messages = [
            'sender_name.required' => 'عفوا قم بإدخال اسمك',
            'sender_email.required' => 'عفوا قم بإدخال بريدك الالكتروني',
            'sender_email.email' => 'عفوا قم بإدخال بريد ألكتروني صحيح',
            'sender_phone.required' => 'عفوا قم بإدخال رقم هاتفك',
            'message_body.required' => 'عفوا قم بإدخال نص الرسالة',
        ];

        $this->validate($request, [
            'sender_name' => 'required',
            'sender_email' => 'required|email',
            'sender_phone' => 'required',
            'message_body' => 'required',
        ], $messages);

        $message = new Message;

        $message->sender_name = $request->sender_name;
        $message->sender_email = $request->sender_email;
        $message->sender_phone = $request->sender_phone;
        $message->message_body = $request->message_body;
        $message->save();

        session()->flash('sent_msg', 'تم  ارسال رسالتك بنجاح ، سيتم الإطلاع عليها ، والرد عليك في اقرب فرصة ');

        return redirect()->back();

    }

}
