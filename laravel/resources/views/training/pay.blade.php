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

                    <section class="call-to-action call-to-action-default mb-5">
                        <div class="col-sm-9 col-lg-9">
                            <div class="call-to-action-content">
                                <h3>Pay for your Training and Certification Course. ({{_c(25000)}})</h3>
                            </div>
                        </div>

                        <div class="col-sm-3 col-lg-3">
                            <div class="call-to-action-btn">
                                <a href="javascript:void(0)" class="btn btn-lg btn-primary pay">Pay Now!</a>
                            </div>
                        </div>
                    </section>

                </div>
            </section>
        </div>
    </div>


</div>

<script type="text/javascript">

    var email       = '{{$user->email}}';
    var amount      = '{{$transaction->amount*100}}';
    var orderid     = '{{$transaction->payment_reference}}';
    var redirecturl = '{{url('transaction/training')}}';

    $('.pay').click(() => {

        payWithPaystack(email, amount, orderid, redirecturl);

    });

</script>

@endsection



