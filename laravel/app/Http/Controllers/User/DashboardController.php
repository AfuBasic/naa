<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Transaction;
use \Carbon\Carbon;

class DashboardController extends Controller
{

	public function index()
	{
		$badge 			= 'info.svg';
		$user 			= Auth::user();
		$cssclass		= 'dark';
		$training		= DB::table('transactions')->where([

			'user_id' 		=> Auth::user()->id, 
			'payment_type' 	=> 'training'

		])->first();

		if($user->status == 'active'){

			$cssclass 		= 'success';
			$badge 		 	= 'success.svg';

		}elseif($user->status == 'pending'){

			$cssclass 		= 'warning';
			$badge 			= 'warning.svg';
		}

		$expiryDate 		= new Carbon($user->created_at.' + 1 year');
		$difference 		= $expiryDate->diff(Carbon::now())->days;
		
		$data['user'] 		= $user;
		$data['cssclass']	= $cssclass;
		$data['badge']		= $badge;
		$data['training']	= $training;
		$data['difference']	= $difference;
		

		return view('dashboard.index', $data);
	}

	public function email()
	{
		return view('dashboard.emails');
	}

}
