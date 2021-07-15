<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

use DB;
use Response;
use App\User;
use App\Transaction;


class RegisterController extends Controller
{

    public function index()
    {    
        // $users = DB::table('users')->get();

        // foreach($users as $row){

        //     $state = DB::table('states')->where(['name' => $row->state])->first();

        //     $code = $state ? $state->code : 15;

        //     $id = _membershipId($code);

        //     DB::table('users')->where(['id' => $row->id])->update([

        //         'serial'        => $id['serial'],
        //         'membership_id' => $id['id']
        //     ]);
        // }

        return view('auth.register.index');
    }

    public function newRegistration($userId = 0)
    {
        $data['user']             = User::firstOrNew(['id' => $userId]);
        $data['sex'] = ['male', 'female'];

        return view('auth.register.register', $data);

    }


    public function register(Request $request, $userId = 0)
    {
        $user   = User::firstOrNew(['id' => $userId]);
        
        $this->validate($request, [
            'first_name'            => 'required|string|max:255',
            'last_name'             => 'required|string|max:255',
            'email'                 => 'required|email|max:255|unique:users,email,'.$user->id,
            'address'               => 'required',
            'sex'                   => 'required',
            'place_of_birth'        => 'required',
            'date_of_birth'         => 'required',
            'occupation'            => 'required|string',
            'state'                 => 'required',
            'lga'                   => 'required',
            'mobile_number'         => 'required|digits:11',
        ]);

        if($user->id > 0){

            User::where('id', $user->id)->update([
                'first_name'      => request('first_name'),
                'last_name'       => request('last_name'),
                'email'           => request('email'),
                'address'         => request('address'),
                'sex'             => request('sex'),
                'place_of_birth'  => request('place_of_birth'),
                'date_of_birth'   => date('Y-m-d H:i:s', strtotime(request('date_of_birth'))),
                'occupation'      => request('occupation'),
                'mobile_number'   => request('mobile_number'),
                'office_number'   => request('office_number'),
                'state'           => request('state'),
                'lga'             => request('lga')

            ]);

        }else{

            $state  = DB::table('states')->where(['name' => request('state')])->first();

            if(!$state)
                return redirect('/');
                
            $id  = _membershipId($state->id);
        
            $user =  User::create([

                'serial'           => $id['serial'],
                'membership_id'    => $id['id'],
                'first_name'       => request('first_name'),
                'last_name'        => request('last_name'),
                'email'            => request('email'),
                'address'          => request('address'),
                'sex'              => request('sex'),
                'place_of_birth'   => request('place_of_birth'),
                'date_of_birth'    => date('Y-m-d H:i:s', strtotime(request('date_of_birth'))),
                'occupation'       => request('occupation'),
                'mobile_number'    => request('mobile_number'),
                'office_number'    => request('office_number'),
                'state'            => request('state'),
                'lga'              => request('lga'),
                'status'           => 'pending'
            ]);

        }
        


        if(Transaction::where(['payment_type' => 'new_registration', 'user_id' => $userId])->count() < 1){

            Transaction::create([

                'user_id'                   => $user->id,
                'payment_reference'         => str_random(16),
                'payment_type'              => 'new_registration',
                'amount'                    => config('naa.new_membership_fee'),
                'transaction_date'          => date('Y-m-d H:i:s')

            ]);
        }


        request()->session()->flash('success', 'Your Information has been saved succesfully. Your account is currently pending. please review your information and proceed to payment.');

        return redirect('auth/pending/'.$user->id.'/'.md5(time()));
    }



    public function pending($userId = 0)
    {
        $user = User::where(['id' => $userId])->first();

        if(!$user)
            return redirect('/');

        $data['user'] = $user;

        $data['transaction'] = Transaction::where([

            'user_id'       => $user->id, 
            'payment_type'  => $user->type == 'new' ? 'new_registration' : 'existing_registration'

        ])->first();

        if(!$data['transaction'])
            return redirect('/');

        return view('auth.register.pending', $data);
    }



    public function password(Request $request, $id = 0)
    {
        $user = User::where(['id' => $id])->first();

        if(!$user)
            return redirect('/');

        if(request()->has('password')){

            $this->validate($request, [

                'password' => 'required|min:6|confirmed'
            ]);

            User::where(['id' => request('user_id')])->update(['password' => bcrypt(request('password'))]);

            if(Auth::attempt(['email' => $user->email, 'password' => request('password')], true)){

                return redirect()->intended('user/home');

            }else{

                request()->session()->flash('error', 'An Unexpected Error Occured.');
            }
        }
        

        return view('auth.register.password', ['user' => $user]);
    }



    public function continueRegistration(Request $request)
    {
        if(request()->isMethod('post')){

            $this->validate($request, ['email' => 'required|email|max:255']);


            $user = User::where(['email' => request('email')])->first();

            if($user){

                if($user->status == 'enabled'){

                    request()->session()->flash('message', 'Your registration was successful and your account is already active. Login with your Email and Password below.');

                    return redirect('login');
                }

                return redirect('auth/register/'.$user->id);
            }


            $url = url('/');

            request()->session()->flash('error', 'We could not find this email.');

        }

        return view('auth.register.continue');
    }

}
