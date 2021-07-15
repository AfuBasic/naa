@extends('layouts.app')

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Members</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>Members</h1>
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
					<h2 class="card-title">Members</h2>
				</header>
				<div class="card-body">
					@include('includes.alert')

					<form class="form-horizontal" style="margin-bottom:15px;">
						{{csrf_field()}}
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search Members" aria-describedby="search-members" id="search-box">
							<button type="submit" class="input-group-addon" id="search-members">
								<i class="fa fa-search"></i>&nbsp;Search
							</button>
						</div>

					</form>

					<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0" id="datatable">
						<thead>
							<tr>
								<th>ID</th>
								<th>Name</th>
								<th>NAA Email</th>
								<th>Phone</th>
								<th>State</th>
								<th>Status</th>
								<th>&nbsp;</th>
							</tr>
						</thead>
						<tbody>
							@foreach($users as $row)
							<tr>
								<th>{{$row->membership_id}}</th>
								<td>{{ucwords($row->first_name.' '.$row->last_name)}}</td>
								<td><a href="mailto:{{$row->naa_email}}">{{$row->naa_email}}</a></td>
								<td>{{$row->mobile_number}}</td>
								<td>{{$row->state}}</td>
								<td>
									@if($row->status == 'enabled')
									<span class="badge badge-success badge-xs">
										{{ucfirst($row->status)}}
									</span>
									@elseif($row->status == 'disabled')
									<span class="badge badge-warning badge-xs">
										{{ucfirst($row->status)}}
									</span>
									@elseif($row->status == 'pending')
									<span class="badge badge-danger badge-xs">
										{{ucfirst($row->status)}}
									</span>
									@endif
								</td>
								<td>
									<a href="{{url('admin/member/'.$row->id.'/'.md5(time()))}}" class="btn btn-primary btn-xs mb-2">View Details</a>
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