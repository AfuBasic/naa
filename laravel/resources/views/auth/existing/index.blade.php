@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Existing Member</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Existing Member</h1>
            </div>
        </div>
    </div>
</section>


<div class="container">

    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Existing Member</h2>
                </header>
                <div class="card-body">

                  @include('includes.alert')
                   
                    <form class="form-horizontal form-bordered" method="POST" action="{{url('auth/existing/search')}}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="first_name">
                                First Name
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="first_name" name="first_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="last_name">
                                Last Name
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="last_name" name="last_name">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="mobile_number">
                               Mobile Number
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" id="mobile_number" name="mobile_number">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                &nbsp;
                            </label>
                            <div class="col-lg-6">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-search"></i> Search
                                </button>
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>


</div>

@endsection



