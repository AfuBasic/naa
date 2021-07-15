<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class HomeController extends Controller
{
	public function index()
	{
		return redirect('auth');
	}

    public function states()
    {
        $states = DB::table('states')->where('state_id', '>=', 17)->get();

        foreach($states as $row){

            DB::table('states')->where(['state_id' => $row->state_id])->update(['code' => ($row->state_id)]);
        }

        return response()->json(DB::table('states')->get());
    }

    public function lgas(Request $request, $state)
    {
        $lgas = "";
        $lg = DB::table('states')->leftJoin('local_governments','states.id','local_governments.state_id')->where('states.name',$state)->get();

        foreach($lg as $row)
        {
            $lgas .= "<option value='".$row->name."'>".$row->name."</option>";
        }

        return $lgas;
    }
}
