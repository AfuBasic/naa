
@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('choose-registration')}}">Registraton</a></li>
                    <li class="active">New Member</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Payment Successful</h1>
            </div>
        </div>
    </div>
</section>


<div class="container">

    <div class="row">
        <div class="col">
            <div class="alert alert-success alert-admin">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Payment Successful.</h4>
                        <p><strong class="successful">Your payment was processed succesfully. <a href="{{url('auth/password/'.$user->id.'/'.md5(time()))}}">Click here</a> to proceed.</p>
                    </div>

                </div>
            </div>
        </div>
    </div>

</div>


@endsection

