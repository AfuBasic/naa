@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Training</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h1>
            </div>
        </div>
    </div>
</section>

<div class="container" style="margin-top:15px;">

    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Members Training and Certification</h2>
                </header>
                <div class="card-body">

                    <section class="call-to-action with-borders button-centered mb-5">
                        <div class="col-12">
                            <div class="call-to-action-content">
                                <h3>Your payment for <strong>Membership Training</strong> was successful.</h3>

                                <p class="mb-0">We have also sent you a confirmation email. We would contact you via email if there is any information to pass accross to you.</p>

                            </div>
                        </div>
                        <div class="col-12">
                            <div class="call-to-action-btn">
                                <a href="{{url('user/home')}}" class="btn btn-lg btn-primary">Back to Dashboard</a>
                            </div>
                        </div>
                    </section>


                </div>
            </section>
        </div>
    </div>


</div>



@endsection



