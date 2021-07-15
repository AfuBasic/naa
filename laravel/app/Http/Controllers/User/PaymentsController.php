<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Transaction;

class PaymentsController extends Controller
{
    public function payments()
	{
		$data['transactions'] = Transaction::where([

			'user_id' => Auth::user()->id

		])->orderBy('id', 'asc')->get();


		return view('payments.payments', $data);
	}

	public function terms()
	{
		return view('payments.terms-and-conditions');
	}
}
