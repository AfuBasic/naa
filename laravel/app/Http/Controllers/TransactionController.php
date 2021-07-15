<?php
namespace App\Http\Controllers;

require_once('Paystack/Paystack.php');


use Illuminate\Http\Request;
use Response;
use App\User;
use App\Transaction;
use App\Auction;
use Illuminate\Support\Facades\Auth;
use Mail;

class TransactionController extends Controller
{
    public function __construct()
    {

    }

    public function verifyPayment($transactionReference = '', $paymentReference = '')
    {
    	$transaction = Transaction::where(['payment_reference' => $paymentReference])->first();

    	if(!$transaction){

 			echo json_encode(['status' => 0]);

            exit(0);
        }

    	$paystack = new \Paystack('sk_test_c669014c080fb8d78b2a6d7e90193fb8815e7b94');

    	try{

    		$paystackTransaction = $paystack->transaction->verify(['reference' => $transactionReference]);

    		if((bool)$paystackTransaction->status == true){

    			Transaction::where(['payment_reference' => $paymentReference])->update([

    				'amount' 					=> $paystackTransaction->data->amount / 100,
    				'gateway_status' 			=> $paystackTransaction->data->status,
    				'transaction_reference' 	=> $paystackTransaction->data->reference,
    				'status' 					=> 'successful'

    			]);

    			echo json_encode(['status' => 1, 'payment_reference' => $paymentReference]);

    		}else{

                echo json_encode(['status' => 0]);
            }
    		
    	}catch(Exception $e){

    		echo json_encode(['status' => 0]);
    	}
    }

    public function registration($paymentReference = 0)
    {
        $transaction = Transaction::where(['payment_reference' => $paymentReference])->first();

        if(!$transaction)
            return redirect('/choose-registration');


        $user = User::where(['id' => $transaction->user_id])->first();     

        $data['user'] = $user;

        return view('auth.payment-successful', $data);
    }

    public function training($paymentReference = 0)
    {
        $user = Auth::user();

        Mail::send('emails.training', ['user' => $user], function($message) use($user){

            $message->from('hello@naa.org.ng', 'Nigeria Association of Auctioneers');
            $message->subject('Training Payment Succesful');
            $message->to($user->email);

        });

        User::where(['id' => $user->id])->update([

            'status' => 'active'
        ]);

        return view('training.successful');
    }

    public function auction(Request $request, $paymentReference = 0)
    {
        $user = Auth::user();

        $transaction = Transaction::where(['payment_reference' => $paymentReference])->first();

        if(!$transaction){

            return redirect('user/home');
        }

       $auction  = Auction::where(['transaction_id' => $transaction->id])->first();

       if(!$auction){

            return redirect('user/home');
       }

        Auction::where(['id' => $auction->id])->update([ 'status' => 'enabled' ]);

        request()->session()->flash('message', 'Payment Successful. Your auction is now live!');

        return redirect('user/auction/auction/'.$auction->slug);

        Mail::send('emails.auction', ['user' => $user], function($message) use ($user){

            $message->from('hello@naa.org.ng', 'Nigeria Association of Auctioneers');
            $message->subject('Auction Listing Payment Succesful');
            $message->to($user->email);
        });


    }
}
