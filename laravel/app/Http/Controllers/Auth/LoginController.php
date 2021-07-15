<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  public function index(Request $request)
  {
    if(request()->isMethod('post')){

      if(Auth::attempt(['email' => request('email'), 'password' => request('password')], request('remember'))){

        if(Auth::user()->role == 'admin')
          return redirect()->intended('admin');

        return redirect()->intended('user/home');

      }else{

        request()->session()->flash('error', 'Invalid Email or Password');
      }

    }

    return view('auth.login');
  }

  public function logout()
  {
    Auth::logout();

    return redirect('/');
  }
}
