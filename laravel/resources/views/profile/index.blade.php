@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Profile</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>{{_name()}}</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">

</div>

<div class="container" style="margin-top:15px;">

    <div class="row">
        <div class="col-lg-4">
            <div class="photo" style="display:{{$errors->has('file') ? 'none' : 'block'}}">
                <img alt="" class="img-fluid img-thumbnail img-responsive" src="{{_photo()}}">
            </div>

            <section class="card card-admin upload" style="display:{{$errors->has('file') ? 'block' : 'none'}}">

                <header class="card-header">
                    <h2 class="card-title">Personal Profile</h2>
                </header>
                <div class="card-body">
                    <form action="{{url('user/profile/upload')}}" method="post" enctype="multipart/form-data">
                        {{csrf_field()}}
                        <div class="form-group {{$errors->has('file') ? 'has-danger' : ''}}">
                            <label for="file-upload">Select Image to upload</label>
                            <input type="file" class="form-control-file" id="file-upload" name="file" required>
                            <small id="user-upload" class="form-text text-muted">
                                Make sure you select only images and the size should not be more than 2 Megabytes.
                            </small>
                            @if($errors->has('file'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('file') }}</strong>
                            </span>
                            @endif
                        </div>

                        <div class="form-group">
                            <button type="submit" class="btn btn-success btn-sm mb-2">
                                <i class="fa fa-upload"></i> Upload Photo
                            </button>
                        </div>
                    </form>
                </div>
            </section>

            <button type="button" class="btn btn-outline btn-primary btn-xs mb-2" id="change">
                <i class="fa fa-image"></i> Change Profile Photo
            </button>

        </div>

        <div class="col-lg-8">

            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">
                    Personal Profile
                    <span class="text-info pull-right">
                        {{strtoupper(Auth::user()->status)}}
                    </span>
                </h2>
                </header>
                <div class="card-body">

                    <form class="form-horizontal form-bordered" method="POST" action="{{url('user/profile/edit')}}">
                        {{ csrf_field() }}

                        @include('includes.alert')

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="firstname">
                                Full Name
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="firstname" value="{{_name()}}") disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="email">
                                Email Address
                            </label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="email" value="{{Auth::user()->email}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('address') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="address">
                                Contact Address
                            </label>
                            <div class="col-lg-6">
                                <textarea id="address" class="form-control" rows="3" name="address">{{old('address', Auth::user()->address)}}</textarea>
                                @if($errors->has('address'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Marital Status</label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control date" id="occupation" value="{{ucwords(Auth::user()->marital_status)}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="place_of_birth">
                                Place of Birth
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="place_of_birth" value="{{Auth::user()->place_of_birth}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="date_of_birth">
                                Date of Birth
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control date" id="date_of_birth" value="{{_d(Auth::user()->date_of_birth, false)}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="occupation">
                                Occupation
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control date" id="occupation" value="{{Auth::user()->occupation}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('mobile_number') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="mobile_number">
                                Mobile Number
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" id="mobile_number" name="mobile_number" value="{{old('mobile_number', Auth::user()->mobile_number)}}">
                                @if($errors->has('mobile_number'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('mobile_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('office_number') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="office_number">
                                Office Number
                            </label>
                            <div class="col-lg-6">
                                <input type="number" name="office_number" class="form-control" id="office_number" value="{{old('office_number', Auth::user()->office_number)}}">
                                @if($errors->has('office_number'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('office_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="state">
                                State / LGA
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control state" id="state" value="{{Auth::user()->state. ' - '.Auth::user()->lga}}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                &nbsp;
                            </label>
                            <div class="col-lg-6">
                                <input type="submit" id="submit" class="btn btn-primary" value="Update">
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>

    </div>
</div>

@endsection

@section('scripts')
<script type="text/javascript">
    $(() => {

        $('#change').click(() => {

            $('.photo').toggle();
            $('.upload').toggle();
        })
    });
</script>
@endsection



