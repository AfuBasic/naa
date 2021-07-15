<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Transaction;
use Storage;

class ProfileController extends Controller
{
	public function index()
	{

		return view('profile.index');
	}

	public function edit(Request $request)
	{
		$this->validate($request, [

			'address'               => 'required',
			'mobile_number'         => 'required|digits:11',
			'office_number'         => 'digits:11',
		]);


		$user =  User::where(['mobile_number' => request('mobile_number')])->first();

		if($user != null){

			if($user->id != Auth::user()->id){

				request()->session()->flash('error', 'Mobile Phone Number already in use.');

				return redirect('user/profile');
			}

		}

		$user =  User::where(['office_number' => request('office_number')])->first();

		if($user != null){

			if($user->id != Auth::user()->id){

				request()->session()->flash('error', 'Office Phone Number already in use.');

				return redirect('user/profile');
			}

		}

		User::where(['id' => Auth::user()->id])->update([

			'address' 			=> request('address'),
			'mobile_number'		=> request('mobile_number'),
			'office_number'		=> request('office_number')
		]);

		request()->session()->flash('message', 'Profile Updated Succesfully.');

		return $this->index();
	}

	public function upload(Request $request)
	{	
		$this->validate($request, [ 'file' => 'required|filled|image|max:1000' ]);

		User::where(['id' => Auth::user()->id])->update([

			'photo' => request()->file('file')->store('photos')
		]);

		request()->session()->flash('message', 'Profile Photo Updated Succesfully');

		return redirect('user/profile');
	}

	public function professionalProfile()
	{
		$data['user'] 	= Auth::user();

		return view('profile.professional-profile', $data);
	}
}
