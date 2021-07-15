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


                    <form class="form-horizontal form-bordered" method="POST" action="{{url('user/training')}}">
                        {{ csrf_field() }}

                        @include('includes.alert')

                        <div class="form-group row {{$errors->has('location') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="location">
                                Select your closest Training Location
                            </label>
                            <div class="col-lg-6">
                                <select name="location" id="location" class="form-control"s>
                                    <option>--select--</option>
                                    <option>Ikeja, Lagos</option>
                                    <option>Iwo Road, Ibadan</option>
                                    <option>Garki, Abuja</option>
                                </select>
                                @if($errors->has('location'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('location') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('membership_years') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="membership_years">
                                How many years have you been a Member of NAA?
                            </label>
                            <div class="col-lg-6">
                                <div class="input-group">
                                    <input type="number" id="membership_years" name="membership_years" class="form-control" placeholder="1" value="{{old('membership_years')}}">
                                    <span class="input-group-addon" id="basic-addon2">Year(s)</span>
                                </div>
                                @if($errors->has('membership_years'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('membership_years') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                &nbsp;
                            </label>
                            <div class="col-lg-6">
                                <input type="submit" id="submit" class="btn btn-primary" value="Continue">
                            </div>
                        </div>

                    </form>

                </div>
            </section>
        </div>
    </div>


</div>

@endsection



