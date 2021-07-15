@extends('layouts.app')

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Email Account</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>Email Account</h1>
			</div>
		</div>
	</div>
</section>

<div class="container">

	<div class="row">
		<div class="col-lg-12 mb-4 mb-lg-0">
			<section class="card card-admin">
				<header class="card-header">
					<h2 class="card-title">Email Account</h2>

				</header>
				<div class="card-body">
					
                    @include('includes.alert')
                    
					<form class="form-horizontal form-bordered" method="POST" action="{{url('admin/email/new')}}">
                        {{ csrf_field() }}

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="firstname">
                                Member
                            </label>
                            <div class="col-lg-6">
                             <select name="user_id" class="form-control select2" required>
                                @foreach($users as $row)
                                <option value="{{$row->id}}">{{$row->first_name.' '.$row->last_name}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>

                    <div class="form-group row {{$errors->has('username') ? 'has-danger' : ''}}">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="username">
                            Email Username
                        </label>
                        <div class="col-lg-6">

                            <div class="input-group">
                                <input type="text" class="form-control" name="username" placeholder="without @naa.org.ng" required>
                                <button type="button" class="input-group-addon">
                                    @naa.org.ng
                                </button>
                            </div>

                            @if($errors->has('username'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('username') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row {{$errors->has('password') ? 'has-danger' : ''}}">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="password">
                            Password
                        </label>
                        <div class="col-lg-6">
                            <input type="password" class="form-control" id="password" name="password" value="{{old('password')}}" required>
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
                            <input type="password" class="form-control" id="password_confirmation" name="password_confirmation" value="{{old('passsword_confirmation')}}" required>
                            @if($errors->has('passsword_confirmation'))
                            <span class="help-block text-danger">
                                <strong>{{ $errors->first('passsword_confirmation') }}</strong>
                            </span>
                            @endif
                        </div>
                    </div>

                    <div class="form-group row">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="occupation">
                            &nbsp;
                        </label>
                        <div class="col-lg-6">
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






