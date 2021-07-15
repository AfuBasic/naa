<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use DB;
use App\Transaction;
use App\Auction;

class AuctionsController extends Controller
{
    public function index(Request $request)
    {
    	$data['products'] 		= Auction::all();

    	return view('auctions.index', $data);
    }
}
