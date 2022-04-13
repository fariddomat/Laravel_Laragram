<?php

namespace App\Http\Controllers;

// use Notification;
use App\Notifications\UserNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\Notification as NotificationsNotification;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class NotificationController extends Controller
{

    public function sendNotification()
    {
        $user = Auth::user();

        $details = [
            'greeting' => 'Hi Artisan',
            'body' => 'This is my first notification from ',
            'thanks' => 'Thank you for using this!',
            'actionText' => 'View My Site',
            'actionURL' => url('/'),
            'order_id' => 101,
            'user_id'=>1,
            'followe_name'=>'farid'
        ];

        Notification::send($user, new UserNotification($details));

        dd('done');
    }
   
}
