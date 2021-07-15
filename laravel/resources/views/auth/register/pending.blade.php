@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li><a href="{{url('/')}}">Registraton</a></li>
                    <li class="active">Payment</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Membership Registration - Payment</h1>
            </div>
        </div>
    </div>
</section>


<div class="container">

    @if(session('success') != '')
    <div class="row">
        <div class="col">
            <div class="alert alert-info">
                {{session('success')}}
            </div>
        </div>
    </div>
    @endif

</div>

<div class="container">

    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Membership Registration</h2>
                </header>
                <div class="card-body">

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            First Name
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{$user->first_name}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Last Name
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{$user->last_name}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Email Address
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{$user->email}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Current Office Address
                        </label>
                        <div class="col-lg-6">
                            <textarea class="form-control" rows="3" disabled>{{$user->address}}</textarea>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">Marital Status</label>
                        <div class="col-lg-6">
                            <select class="form-control form-control-lg mb-3" name="marital_status" disabled>
                                <option value="{{$user->marital_status}}" selected>
                                    {{ucfirst($user->marital_status)}}
                                </option>
                            </select>

                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Place of Birth
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{$user->place_of_birth}}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Date of Birth
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{!! date('M d, Y', strtotime($user->date_of_birth)) !!}" disabled>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Occupation
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{$user->occupation}}" disabled>
                        </div>
                    </div>

                    @if(!empty($user->mobile_number))
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Mobile Number
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{$user->mobile_number}}" disabled>
                        </div>
                    </div>
                    @endif

                    @if(!empty($user->office_number))
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Office Number
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{old('office_number', $user->office_number)}}" disabled>
                        </div>
                    </div>
                    @endif

                    @if(!empty($user->state))
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            State
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{old('state', $user->state)}}" disabled>
                        </div>
                    </div>
                    @endif

                    @if(!empty($user->lga))
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            LGA
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" value="{{old('lga', $user->lga)}}" disabled>
                        </div>
                    </div>
                    @endif


                    @if(!empty($user->last_certificate_id))
                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2">
                            Last Membership Certificate ID Number
                        </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control" id="last_certificate_id" name="last_certificate_id" value="{{$user->last_certificate_id}}" disabled>
                        </div>
                    </div>
                    @endif


                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="occupation">
                            &nbsp;
                        </label>
                        <div class="col-lg-3">

                            <a href="{{url('auth/register/'.$user->id.'/'.md5(time()))}}" class="btn btn-warning">
                                <i class="fa fa-arrow-circle-left"></i> Edit Information
                            </a>
                        </div>


                        <div class="col-lg-3">
                            @if($transaction->status != 'successful')
                            <button type="button" class="btn btn-success pay">
                                Continue to Payment ({{_c($transaction->amount)}}) <i class="fa fa-arrow-circle-right"></i> 
                            </button>
                            @else
                            <a href="{{url('auth/password/'.$user->id.'/'.md5(time()))}}" class="btn btn-info">
                                Continue to Profile <i class="fa fa-arrow-circle-right"></i> 
                            </a>
                            @endif
                        </div>

                    </div>

                </div>
            </section>
        </div>
    </div>


</div>

<script type="text/javascript">

    var email       = '{{$user->email}}';
    var amount      = '{{$transaction->amount*100}}';
    var orderid     = '{{$transaction->payment_reference}}';
    var redirecturl = '{{url('transaction/registration')}}';

    $('.pay').click(() => {

        payWithPaystack(email, amount, orderid, redirecturl);

    });

</script>

@endsection

