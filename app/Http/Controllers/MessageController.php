<?php

namespace App\Http\Controllers;

use App\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{

    public function index()
    {

        $messages = Message::latest()->get();

        return view('admin.messages.index', compact('messages'));

    }


    public function show(Message $message)
    {

        $message->showed();

        return view('admin.messages.show', compact('message'));

    }


    public function destroy(Message $message)
    {

        $message->delete();

        session()->flash('delete_msg', 'تم حذف الرسالة بنجاح');

        return redirect(route('messages.index'));

    }
}
