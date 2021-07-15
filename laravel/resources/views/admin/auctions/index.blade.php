@extends('layouts.app')

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Auctions</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>Auctions</h1>
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
					<h2 class="card-title">Auctions</h2>
				</header>
				<div class="card-body">

					@include('includes.alert')

					<form class="form-horizontal" style="margin-bottom:15px;">
						{{csrf_field()}}
						<div class="input-group">
							<input type="text" class="form-control" placeholder="Search Auctions" aria-describedby="search-members" id="search-box">
							<button type="submit" class="input-group-addon" id="search-members">
								<i class="fa fa-search"></i>&nbsp;Search
							</button>
						</div>

					</form>

					<table class="table table-responsive-lg table-bordered table-striped table-sm mb-0" id="datatable">
						<thead>
							<tr>
								<th>Member</th>
								<th>Lot ID</th>
								<th>Item Name</th>
								<th>Price</th>
								<th>Status</th>
								<th>Date Created</th>
								<th>&nbsp;</th>
								
							</tr>
						</thead>
						<tbody>
							@foreach($auctions as $row)
							<tr>
								@php
									$user = \App\User::where(['id' => $row->user_id])->first();
								@endphp
								<td>{{@$user->first_name.' '.@$user->last_name}}</td>
								<td>{{$row->lot_id}}</td>
								<td>{{$row->item_name}}</td>
                                <td>{{_c($row->price)}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{_d($row->created_at)}}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">
                                        View
                                    </a>
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