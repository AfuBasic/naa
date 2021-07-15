<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use \Gufy\CpanelPhp\Cpanel;
use Mail;

class EmailController extends Controller
{

	public function form()
	{
		$data['users']	= User::where(['role' => 'user'])->orderBy('first_name', 'asc')->get();

		return view('admin.emails.form', $data);
	}

	public function newEmail(Request $request)
	{
		$this->validate($request, [

            'username'  => 'required|max:50',
            'password' 	=> 'required|min:8|confirmed'
        ]);

		//https://www.codepunker.com/blog/using-php-to-create-new-subdomains-databases-and-email-accounts-on-a-cpanel-driven-server
		$cpanel = new Cpanel([

			'host'			=> 'https://naa.org.ng:2083/',
			'username'		=> env('CPANEL_USERNAME'),
			'auth_type'		=> 'password',
			'password'		=> env('CPANEL_PASSWORD')
		]);


		$email = $cpanel->execute_action(3, 'Email', 'add_pop', 'cpanel_username', [

			'email'				=> request('username'),
			'password'			=> request('password'),
			'quota'				=> 1024,
			'domain'			=> 'naa.org.ng',
			'skip_update_db'	=> '0'
		]);

		$response 	= json_decode($email);
		$errors 	= '';

		if(isset($response->result->errors) && $response->result->errors != null){

			if(count($response->result->errors) > 0){

				foreach($response->result->errors as $row){

					$errors.= $row.'&nbsp; &nbsp; &nbsp;';
				}

				request()->session()->flash('error', $errors);

				return redirect('admin/email');

			}
			
		}

		$naaEmail = request('username').'@naa.org.ng';

		$user = User::find(request('user_id'));

		User::where(['id' => request('user_id')])->update(['naa_email' => $naaEmail]);

		$emaildata = ['user' => $user, 'username' => $naaEmail, 'password' => request('password')];

		Mail::send('emails.newemail', $emaildata, function($message) use ($user){

            $message->from('hello@naa.org.ng', 'Nigeria Association of Auctioneers');
            $message->subject('New Email Account Created for you!');
            $message->to($user->email);
        });

		request()->session()->flash('message', "{$naaEmail} Created Successfully.");

		return redirect('admin/members');
		
	}
}
