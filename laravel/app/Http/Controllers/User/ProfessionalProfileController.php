<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;

class ProfessionalProfileController extends Controller
{
	public function index()
	{
		$data['work_experiences'] 	= DB::table('work_experiences')->where([

			'user_id' => Auth::user()->id

		])->orderBy('id', 'asc')->get();

		$data['certifications'] 	= DB::table('certifications')->where([

			'user_id' => Auth::user()->id

		])->orderBy('id', 'asc')->get();

		return view('profile.professional.index', $data);
	}

	public function saveWorkExperience(Request $request)
	{		
		DB::table('work_experiences')->insert([

			'user_id'      	=> Auth::user()->id,
			'position'		=> request('position'),
			'organisation'	=> request('organisation'),
			'period'		=> request('period'),
			'created_at'	=> request('created_at')

		]);

		request()->session()->flash('message', 'Work Experience Updated Succesfully');

		return $this->index();
	}

	public function saveCertification(Request $request)
	{
		DB::table('certifications')->insert([

			'user_id'      		=> Auth::user()->id,
			'certificate'		=> request('certificate'),
			'institution'		=> request('institution'),
			'period'			=> request('period'),
			'created_at'		=> request('created_at')

		]);

		request()->session()->flash('message', 'Certifications Updated Succesfully');

		return $this->index();
	}

	public function removeWorkExperience(Request $request, $id = 0)
	{
		DB::table('work_experiences')->where(['user_id' => Auth::user()->id, 'id' => $id])->delete();

		request()->session()->flash('message', 'Work Experience Removed');

		return $this->index();
	}

	public function removeCertification(Request $request, $id = 0)
	{
		DB::table('certifications')->where(['user_id' => Auth::user()->id, 'id' => $id])->delete();

		request()->session()->flash('message', 'Certification Removed');

		return $this->index();
	}
}
