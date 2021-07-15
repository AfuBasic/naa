<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Transaction;
use App\Auction;

class AuctionController extends Controller
{
    public function index()
    {
        $data['auctions'] = Auction::where(['user_id' => Auth::user()->id])->orderBy('id', 'asc')->get();

        return view('auction.index', $data);
    }

    public function listAuction(Request $request)
    {
        $user = Auth::user();

        if($user->status == 'inactive'){

            request()->session()->flash('not_allowed', 'Please complete your Membership Process to become a full member before you can list your Auction.');

        }elseif($user->status == 'pending'){

            request()->session()->flash('not_allowed', 'Please renew your Membership before proceeding to list your Auction.');

        }

        $last_auction = DB::table('auctions')->where(['user_id' => $user->id])->orderBy('created_at', 'desc')->first();

        if(!$last_auction){

            $last_auction = Auction::firstOrNew(['user_id' => $user->id]);
        }

        $data['user']               = $user;
        $data['last_auction']       = $last_auction;

        return view('auction.form', $data);

    }


    public function checkImages(Request $request)
    {
        return response()->json(count(request()->session()->get('images')), 200);
    }

    public function upload(Request $request)
    {
        if(!request()->file('file') || Auth::user()->status != 'active'){

            return response()->json(false, 400);
        }


        $image      = request()->file('file');
        $extension  = $image->getClientOriginalExtension();

        if(!in_array($extension, ['jpeg', 'jpg', 'png', 'gif']))
            return response()->json('error', 400);

        $filename   = str_random(16).'.'.$extension;
        $response   = $image->storeAs('auctions', $filename, 'local');

        if($response){

            request()->session()->push('images', $filename);

            return response()->json(true, 200);
        }

        return response()->json(false, 400);
    }

    public function save(Request $request)
    {

        if(Auth::user()->status != 'active'){

            return redirect('auction-listing');
        }

        $images = request()->session()->get('images');

        request()->session()->forget('images');

        $transaction = Transaction::create([

            'user_id'                   => Auth::user()->id,
            'payment_reference'         => str_random(16),
            'payment_type'              => 'auction',
            'amount'                    => config('naa.new_auction_fee'),
            'transaction_date'          => date('Y-m-d H:i:s')

        ]);

        $auction = Auction::create([

            'user_id'           => Auth::user()->id,
            'business_name'     => request('business_name'),
            'category_id'       => request('category_id'),
            'lot_id'            => request('lot_id'),
            'item_name'         => request('item_name'),
            'slug'              => str_slug(request('business_name').'-'.request('item_name').'-'.str_random(5)),
            'quantity'          => request('quantity'),
            'transaction_id'    => $transaction->id,
            'state'             => request('state'),
            'lga'               => request('lga'),
            'address'           => request('address'),
            'phone'             => request('phone'),
            'price'             => request('price'),
            'images'            => json_encode($images)
        ]);

        request()->session()->flash('message', 'One more step to go, Please pay '._c(1000).', to get your auction published.');

        return redirect('user/auction/pay/'.$auction->slug);
    }

    public function pay(Request $request, $slug = '')
    {
        request()->session()->forget('images');

        $auction  = Auction::where(['slug' => $slug])->first();
        
        if($auction == null)
            return redirect('auction-listing');

        $transaction = Transaction::find($auction->transaction_id);

        if($transaction->status == 'successful'){

            request()->session()->flash('message', 'You have paid for the auction already.');
        }

        $data['user']           = Auth::user();
        $data['auction']        = $auction;
        $data['transaction']    = $transaction;

        return view('auction.pay', $data);
    }

    public function auction(Request $request, $slug = '')
    {
        return redirect('home');
    }

}
