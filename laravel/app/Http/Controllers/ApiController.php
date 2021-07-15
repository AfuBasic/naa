<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;

class ApiController extends Controller
{
	public function members()
	{	
		$members 	= User::where(['role' => 'user', 'status' => 'active'])->get();
		$users 		= [];

		foreach($members as $row){

			$users[] = [

				'membership_id' 	=> $row->membership_id,
				'last_name'			=> $row->last_name,
				'first_name'		=> $row->first_name,
				'registered_email'	=> $row->email,
				'naa_email'			=> $row->naa_email,
				'address'			=> $row->address.' '.$row->lga.' '.$row->state,
				'occupation'		=> $row->occupation,
				'mobile_number'		=> $row->mobile_number
			];
		}

		return response()->json([

			'status'	=> true,
			'data'		=> $users
		]);
	}

	public function member()
	{
		$input 	= request()->only(['membership_id', 'first_name', 'last_name', 'registered_email', 'naa_email']);
		$user 	= null;

		if($input['membership_id']){

			$user = User::where(['membership_id' => $input['membership_id']])->first();
		}

		if($input['last_name']){

			$user = User::where(['last_name' => $input['last_name']])->first();
		}

		if($input['first_name']){

			$user = User::where(['first_name' => $input['first_name']])->first();
		}

		if($input['registered_email']){

			$user = User::where(['registered_email' => $input['registered_email']])->first();
		}

		if($input['naa_email']){

			$user = User::where(['naa_email' => $input['naa_email']])->first();
		}

		if(!$user)
			return response()->json(['status' => false, 'data' => 'user not found'], 404);

		return response()->json(['status' => true, 'data' => [

			'membership_id' 	=> $user->membership_id,
			'last_name'			=> $user->last_name,
			'first_name'		=> $user->first_name,
			'registered_email'	=> $user->email,
			'naa_email'			=> $user->naa_email,
			'address'			=> $user->address.' '.$user->lga.' '.$user->state,
			'occupation'		=> $user->occupation,
			'mobile_number'		=> $user->mobile_number
		]]);

	}
}
