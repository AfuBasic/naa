@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('choose-registration')}}">Registraton</a></li>
                    <li class="active">Set a Password</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Set A Password</h1>
            </div>
        </div>
    </div>
</section>


<div class="container">

    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Create a password for your account</h2>
                </header>
                <div class="card-body">

                   
                   @if(session('error'))
                    <div class="alert alert-danger">{{session('error')}}</div>
                   @endif
                   
                    <form class="form-horizontal form-bordered" method="POST" action="{{url('auth/password/'.$user->id)}}">
                        {{ csrf_field() }}

                        <div class="form-group row {{$errors->has('password') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="password">
                                Password
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}">
                                @if($errors->has('password'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row {{$errors->has('passsword_confirmation') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="passsword_confirmation">
                                Confirm Password
                            </label>
                            <div class="col-lg-6">
                                <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('passsword_confirmation')}}">
                                @if($errors->has('passsword_confirmation'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('passsword_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                &nbsp;
                            </label>
                            <div class="col-lg-6">
                                <input type="hidden" name="user_id" value="{{$user->id}}">
                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>


</div>

@endsection



