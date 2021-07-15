@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Verify OTP</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Verify OTP</h1>
            </div>
        </div>
    </div>
</section>


<div class="container">

    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Verify OTP</h2>
                </header>
                <div class="card-body">

                  @include('includes.alert')
                   
                    <form class="form-horizontal form-bordered" method="POST" action="{{url('auth/existing/verify/'.$userId.'/'.md5(time()))}}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="otp">
                                One Time Pin
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="otp" name="otp" required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                &nbsp;
                            </label>
                            <div class="col-lg-3">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-asterick"></i> Verify OTP
                                </button>
                                <input type="hidden" name="id" value="{{$otpId}}">
                            </div>
                            <div class="col-lg-3">
                                <a href="{{url('auth/existing/search/'.$userId.'/'.md5(time()))}}">Resend OTP</a>
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>


</div>

@endsection



