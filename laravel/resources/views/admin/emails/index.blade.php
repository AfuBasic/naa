@extends('layouts.app')

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Email Accounts</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>Email Accounts</h1>
			</div>
		</div>
	</div>
</section>

<style type="text/css">
	.input-group-addon{

		cursor: pointer;
	}
</style>
<div class="container">

	<div class="row">
		<div class="col-lg-12 mb-4 mb-lg-0">
			<section class="card card-admin">
				<header class="card-header">
					<h2 class="card-title">Email Accounts</h2>
				</header>
				<div class="card-body">
					@include('includes.alert')

					<form class="form-horizontal" style="margin-bottom:15px;">
						{{csrf_field()}}
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search Emails" aria-describedby="search-members" id="search-box">
							<button type="submit" class="input-group-addon" id="search-members">
								<i class="fa fa-search"></i>&nbsp;Search
							</button>
						</div>

					</form>

					<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0" id="datatable">
						<thead>
							<tr>
								<th>Name</th>
								<th>Email</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($emails as $row)
							<tr>
								<td></td>
								<td></td>
								<td>
									<a href="#" class="btn btn-warning btn-xs mb-2">Disable</a>
								</td>
							</tr>
							@endforeach
						</tbody>
					</table>
				</div>
			</section>
		</div>
	</div>

</div>
@endsection