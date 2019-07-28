<?php

namespace App\Http\Controllers;

use App\Notification;
use Illuminate\Http\Request;

class NotificationController extends Controller
{

    public function index()
    {

        $notifications = Notification::latest()->get();

        return view('client.notifications.index', compact('notifications'));

    }


    public function show(Notification $notification)
    {

        $notification->showed();

        return view('client.notifications.show')->with(['notification' => $notification]);

    }


    public function destroy(Notification $notification)
    {

        $notification->delete();

        session()->flash('delete_msg', 'تم حذف الإشعار بنجاح');

        return redirect(route('notifications.index'));

    }

}
