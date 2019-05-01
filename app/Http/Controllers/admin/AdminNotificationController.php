<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notification;

class AdminNotificationController extends Controller
{

    public function index(){

        $notifications = Notification::where('owner_id' , 0)->get();

        return view('admin.notifications.index')->with(['notifications' => $notifications]);

    }

    public function show(Notification $notification){

        $notification->showed();

        return view('admin.notifications.show', compact('notification'));

    }

    public function destroy(Notification $notification){

        $notification->delete();

        session()->flash('delete_msg', 'تم حذف الإشعار بنجاح');

        return redirect(url('/admin/notifications'));

    }

}
