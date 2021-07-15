<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use \Carbon\Carbon;
use App\User;
use App\Transaction;
use App\Otp;

class ExistingMembersController extends Controller
{
    public function index()
    {
        return view('auth.existing.index');
    }

    public function register(Request $request, $userId = 0)
    {
        $user = User::firstOrNew(['id' => $userId]);

        $this->validate($request, [

            'address'               => 'required',
            'marital_status'        => 'required',
            'place_of_birth'        => 'required',
            'date_of_birth'         => 'required',
            'occupation'            => 'required|string',
            'state'                 => 'required',
            'lga'                   => 'required',
        ]);

        $user =  User::where(['id' => $user->id])->update([

            'address'                   => request('address'),
            'marital_status'            => request('marital_status'),
            'place_of_birth'            => request('place_of_birth'),
            'date_of_birth'             => date('Y-m-d H:i:s', strtotime(request('date_of_birth'))),
            'occupation'                => request('occupation'),
            'office_number'             => request('office_number'),
            'last_certificate_id'       => request('last_certificate_id'),
            'state'                     => request('state'),
            'lga'                       => request('lga')
        ]);


        if(Transaction::where(['payment_type' => 'existing_registration', 'user_id' =>$userId])->count() < 1){

            Transaction::create([

                'user_id'                   => $user->id,
                'payment_reference'         => str_random(16),
                'payment_type'              => 'existing_registration',
                'amount'                    => config('naa.existing_membership_fee'),
                'transaction_date'          => date('Y-m-d H:i:s')

            ]);
        }


        request()->session()->flash('success', 'Your Information has been updated succesfully. Your account is currently pending. please review your information and proceed to payment.');

        return redirect('auth/pending/'.$user->id.'/'.md5(time()));
    }
    
    public function search(Request $request, $userId = 0)
    {
        if($userId > 0){

            $user = User::where(['id' => $userId])->first();

        }else{
            
            $user = User::where([

                'first_name'    => request('first_name'),
                'last_name'     => request('last_name'),
                'mobile_number' => request('mobile_number'),
                'status'        => 'pending'

            ])->first();

        }
        
        if($user != null){

            $otp = mt_rand(1000, 9999);

            Otp::where(['status' => 'unused', 'user_id' => $user->id])->update(['status' => 'used']);

            $otp = Otp::create([

                'otp'           => $otp,
                'user_id'       => $user->id,
                'ipaddress'     => request()->ip(),

            ]);

            //_sendOTPNotification($user, 'Please use this OTP: '.$otp->otp);

            request()->session()->flash('message', 'A One Time Pin (SMS) has been sent to '.$user->mobile_number.' and '.$user->email.'. Please input it here. OTP expires after 5 Minutes.');

            return redirect('auth/existing/verify/'.$user->id.'/'.md5(time()));


        }else{

            request()->session()->flash('error', 'We could not find your details. Please contact your State Chairman or the Secretary General for futher enquiries. Thank you.');
        }

        return $this->index();
    }

    public function verify(Request $request, $userId = 0)
    {

        if (request()->isMethod('post')){

            $otp                = Otp::where(['id' => request('id')])->first();

            if(!$otp){

                request()->session()->flash('error', 'Invalid OTP');

            }else{

                $createdAt = Carbon::parse($otp->created_at);

                if($createdAt->diffInMinutes(Carbon::now()) > 5){

                    request()->session()->flash('error', 'OTP has expired. click on resend OTP to send a new one.');

                }else{

                    if($otp->otp == request('otp')){

                        Otp::where(['id' => $otp->id])->update(['status' => 'used']);

                        request()->session()->flash('message', 'Phone Number Validated succesfully');
                        
                        return redirect('auth/register/'.$userId.'/'.md5(time()));

                    }else{

                        request()->session()->flash('error', 'Invalid OTP');
                    }
                }
            }

        }

        $data['userId']         = $userId;
        $data['otpId']          = Otp::where(['user_id' => $userId])->orderBy('id', 'DESC')->first()->id;


        return view('auth.existing.verify', $data);
    }

}
