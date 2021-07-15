<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Notification as Notifications;

class NotificationsController extends Controller
{
	public function index()
	{
		
		$data['notifications'] = Notifications::whereIn('user_id', [Auth::user()->id, 0])->where(['status' => 'unread'])->orderBy('created_at', 'desc')->get();
		
		Notifications::where(['user_id' => Auth::user()->id])->update(['status' => 'read']);

		return view('notifications.index', $data);
	}
}
