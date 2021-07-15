<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ResourcesController extends Controller
{
    public function codeOfConduct()
    {
        $data['title']  = 'Code of Conduct';
        $data['file']   = 'pdf';

    	return view('resources.index', $data);
    }

    public function naaConstitution()
    {
    	$data['title']  = 'NAA Constitution';
        $data['file']   = 'pdf';
        
        return view('resources.index', $data);
    }

    public function websitePolicy()
    {
    	$data['title']  = 'Website Policy';
        $data['file']   = 'pdf';
        
        return view('resources.index', $data);
    }
}
