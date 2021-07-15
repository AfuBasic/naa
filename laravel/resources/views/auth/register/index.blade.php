@extends('layouts.app')

@section('content')

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Membership Registration</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>Membership Registration</h1>
			</div>
		</div>
	</div>
</section>

<div class="container">

	<div class="featured-boxes featured-boxes-style-8">
		<div class="row">
			<div class="col-lg-6">
				<div class="featured-box featured-box-primary featured-box-text-left" style="height: 298px;">
					<div class="box-content">
						<div class="row">
							<div class="col-12">
								<h2>New Member</h2>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet. Quisque rutrum pellentesque imperdiet. Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
								<a class="btn btn-lg btn-primary mr-1 mb-4" href="{{url('auth/register')}}">
									Register
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-lg-6">
				<div class="featured-box featured-box-secondary featured-box-text-left" style="height: 298px;">
					<div class="box-content">
						<div class="row">
							<div class="col">
								<h2>Exisiting Member</h2>
							</div>
						</div>
						<div class="row">
							<div class="col">
								<p>
								Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet. Quisque rutrum pellentesque imperdiet. Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet.</p>
								<a class="btn btn-lg btn-secondary mr-1 mb-4" href="{{url('auth/existing')}}">
									Verify your Details
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>

	</div>

	<div class="row">
		<div class="col-12">
			<p class="text-center">
				Have you previously started your registration but didn't complete it? <a href="{{url('auth/continue')}}">Click here</a> to continue.
			</p>

		</div>
	</div>

</div>

@endsection

