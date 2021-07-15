<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use App\Auction;
use Mail;
use DB;

class MembersController extends Controller
{
    public function index()
    {

    	$data['users'] 	=  User::where(['role' => 'user'])->orderBy('first_name', 'asc')->get();

    	return view('admin.members.index', $data); 
    }

    public function member(Request $request, $userId = 0)
    {
    	$data['user'] 		       = User::firstOrNew(['id' => $userId]);
        $data['marital_statuses']   = ['single', 'engaged', 'married'];
        
        return view('admin.members.form', $data);
    }

    public function saveMember(Request $request, $id = 0)
    {
    	$user = User::firstOrNew(['id' => $id]);

    	$this->validate($request, [

    		'first_name'            => 'required|string|max:255',
            'last_name'             => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:users,email,'.$user->id,
            'mobile_number'         => 'required|digits:11',
            'type'                  => 'required',
            'state'                 => 'required'
        ]);

        if($user->id > 0){

            User::where('id', $user->id)->update([

                'first_name'       => request('first_name'),
                'last_name'        => request('last_name'),
                'email'            => request('email'),
                'address'          => request('address'),
                'marital_status'   => request('marital_status'),
                'place_of_birth'   => request('place_of_birth'),
                'date_of_birth'    => date('Y-m-d H:i:s', strtotime(request('date_of_birth'))),
                'occupation'       => request('occupation'),
                'mobile_number'    => request('mobile_number'),
                'office_number'    => request('office_number'),
                'state'            => request('state'),
                'lga'              => request('lga')

            ]);

        }else{

            $state  = DB::table('states')->where(['name' => request('state')])->first();

            if(!$state)
                return redirect('/');

            $id  = _membershipId($state->code);

            $user =  User::create([

                'serial'         => $id['serial'],
                'membership_id'  => $id['id'],
                'first_name'     => request('first_name'),
                'last_name'      => request('last_name'),
                'email'          => request('email'),
                'address'        => request('address'),
                'marital_status' => request('marital_status'),
                'place_of_birth' => request('place_of_birth'),
                'date_of_birth'  => date('Y-m-d H:i:s', strtotime(request('date_of_birth'))),
                'occupation'     => request('occupation'),
                'mobile_number'  => request('mobile_number'),
                'office_number'  => request('office_number'),
                'state'          => request('state'),
                'lga'            => request('lga'),
                'status'         => 'pending',
                'type'           => request('type')
            ]);

        }

        request()->session()->flash('message', 'Member saved successfully.');

        return redirect('admin/members');
    }

    public function terminate($id = 0)
    {
        $user = User::find($id);

        if(!$user)
            return redirect()->back();

        User::where(['id' => $user->id])->delete();
        Auction::where(['user_id' => $user->id])->update(['status' => 'disabled']);

        Mail::send('emails.termination', ['user' => $user], function($message) use ($user){

            $message->from('hello@naa.org.ng', 'Nigeria Association of Auctioneers');
            $message->subject('Membership Termination');
            $message->to($user->email);
        });

        request()->session()->flash('message', 'Member has been terminated successfully');

        return redirect('admin/members');
    }
}
