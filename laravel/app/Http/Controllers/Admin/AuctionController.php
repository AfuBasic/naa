<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Auction;

class AuctionController extends Controller
{
    public function index()
    {
    	$data['auctions'] = Auction::orderBy('id', 'asc')->get();

        return view('admin.auctions.index', $data);
    }

    public function createCategories()
    {
        DB::table('auction_categories')->insert([

            ['name' => 'Electronics'],
            ['name' => 'Fashion'],
            ['name' => 'Health and Beauty'],
            ['name' => 'Mobile Phones and Tablets'],
            ['name' => 'Vehicles']

        ]);

        dd('done');
    }
}
