@extends('layouts.app')

@section('content')
<div class="featured-boxes">
	<div class="row">
		<div class="col-md-6 offset-md-3">
			<div class="featured-box featured-box-primary text-left mt-5" style="height: 383.031px;">
				<div class="box-content">
					<h4 class="heading-primary text-uppercase mb-3">Login to your Account</h4>

					@include('includes.alert')
					
					<form action="{{url('login')}}" method="post">
						{{csrf_field()}}

						<div class="form-row">
							<div class="form-group col {{$errors->has('email') ? 'has-danger' : ''}}">
								<label>E-mail Address</label>
								<input type="email" value="{{old('email')}}" name="email" class="form-control form-control-lg">
								@if($errors->has('email'))
								<span class="help-block text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
								@endif
							</div>
						</div>

						<div class="form-row">
							<div class="form-group col {{$errors->has('password') ? 'has-danger' : ''}}">
								<a class="float-right" href="{{url('password/request')}}">(Lost Password?)</a>
								<label>Password</label>
								<input type="password" name="password" class="form-control form-control-lg">
								@if($errors->has('password'))
								<span class="help-block text-danger">
                                    <strong>{{ $errors->first('password') }}</strong>
                                </span>
								@endif
							</div>
						</div>

						<div class="form-row" style="margin-top:20px;">
							<div class="form-group col-lg-6">
								<div class="form-check form-check-inline">
									<label class="form-check-label">
										<input class="form-check-input" type="checkbox" id="remember" name="remember" {{ old('remember') ? 'checked' : '' }}> Remember Me
									</label>
								</div>
							</div>
							<div class="form-group col-lg-6">
								<input type="submit" value="Login" class="btn btn-primary float-right mb-5" data-loading-text="Loading...">
							</div>
						</div>
						<br>
					</form>
				</div>
			</div>
		</div>
	</div>

</div>
@endsection