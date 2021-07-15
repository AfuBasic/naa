<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\Notification as Notifications;
use App\User;
use DB;

class DashboardController extends Controller
{
    public function index()
    {
    	return redirect('admin/members');
    	
    	// $data['title']			= 'Dashboard';
    	// $data['user'] 			= Auth::user();
    	
    	// return view('admin.dashboard.index', $data);
    }

    public function newsletter()
    {
    	$data['newsletter'] = DB::table('newsletter')->orderBy('created_at', 'asc')->get();

        return view('admin.dashboard.newsletter', $data);
    }

    public function payments()
    {
        $data['transactions'] = Transaction::orderBy('id', 'asc')->get();

        return view('admin.dashboard.payments', $data);
    }

    public function notifications(Request $request, $id = 0)
    {
        if($request->isMethod('post')){

            Notifications::create([

                'user_id'   => request('user_id'),
                'body'      => request('body')
            ]);

            session()->now('message', 'Notification broadcasted succesfully.');
        }

        if($id > 0){

            Notifications::where(['id' => $id])->delete();

             session()->now('message', 'Notification deleted succesfully.');
        }
        
        $data['users']          = User::where(['role' => 'user', 'status' => 'active'])->orderBy('first_name', 'asc')->get();
        $data['notifications']  = Notifications::orderBy('created_at', 'desc')->take(100)->get();

        return view('admin.dashboard.notifications', $data);
    }
}
