@extends('layouts.app')

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Newsletter Subscriptions</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>Newsletter Subscriptions</h1>
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
					<h2 class="card-title">Newsletter Subscriptions</h2>
				</header>
				<div class="card-body">
					@include('includes.alert')

					<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0" id="datatable">
						<thead>
							<tr>
								<th>Email</th>
								<th>Date Joined</th>
								<th>Status</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($newsletter as $row)
							<tr>
								<td><a href="mailto:{{$row->email}}">{{$row->email}}</a></td>
								<td>{{_d($row->created_at)}}</td>
								<td>
									@if($row->status == 'enabled')
									<span class="badge badge-success badge-xs">
										{{ucfirst($row->status)}}
									</span>
									@else
									<span class="badge badge-warning badge-xs">
										{{ucfirst($row->status)}}
									</span>
									@endif
								</td>
								{{-- <td>
									<a href="#" class="btn btn-primary btn-xs mb-2">View Details</a>
								</td> --}}
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