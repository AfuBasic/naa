<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use App\User;
use App\Transaction;

class TrainingController extends Controller
{
	public function index(Request $request)
	{
		if(request()->isMethod('post')){

			$this->validate($request, [

				'location'            => 'required|string',
				'membership_years'    => 'required|numeric'
				
			]);

			if(DB::table('training_information')->where(['user_id' => Auth::user()->id])->first() == null){

				$trainingInformation =  DB::table('training_information')->insert([

					'user_id'			=> Auth::user()->id,
					'location'          => request('location'),
					'membership_years'  => request('membership_years')
				]);
			}
			

			return redirect('user/training/pay');
		}


		return view('training.form');
	}

	public function pay(Request $request)
	{
		$data['user'] 	= Auth::user();
		
		$transaction = Transaction::where([

			'payment_type' 	=> 'training',
			'user_id' 		=> Auth::user()->id

		])->first();

		if($transaction){

			if($transaction->status == 'successful'){

				return redirect('training-payment-successful');
			}

			$data['transaction'] = $transaction;

		}else{

			$data['transaction'] = Transaction::create([

				'user_id' 				=> Auth::user()->id,
				'payment_reference' 	=> str_random(16),
				'payment_type' 			=> 'training',
				'amount'				=> config('naa.training_fee'),
				'transaction_date'		=> date('Y-m-d H:i:s')
			]);
		}
		
		return view('training.pay', $data);
	}


	public function confirm()
	{
		return view('training.confirm');
	}

}
