@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Continue Registration</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Continue Registration</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">

    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Enter your Email Address</h2>
                </header>
                <div class="card-body">
                    
                    <form class="form-horizontal form-bordered" method="POST" action="{{url('auth/continue')}}">
                        {{ csrf_field() }}

                        @include('includes.alert')

                        <div class="form-group row {{$errors->has('email') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="firstname">
                                Email Address
                            </label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="firstname" name="email" value="{{old('email')}}">
                                @if($errors->has('email'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="occupation">
                                &nbsp;
                            </label>
                            <div class="col-lg-6">
                                <input type="submit" id="submit" class="btn btn-primary" value="Continue Registration">
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>


</div>

@endsection



