@extends('layouts.app')

@section('content')
<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="#">Home</a></li>
					<li class="active">Member</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>Member</h1>
			</div>
		</div>
	</div>
</section>

<div class="container">

	<div class="row">
		<div class="col-lg-12 mb-4 mb-lg-0">
			<section class="card card-admin">
				<header class="card-header">
					<h2 class="card-title">Notifications</h2>

                </header>
                <div class="card-body">

                 @include('includes.alert')

                 <form class="form-horizontal form-bordered" method="POST" action="{{url('admin/notifications')}}">
                    {{ csrf_field() }}

                    <div class="form-group row {{$errors->has('first_name') ? 'has-danger' : ''}}">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="firstname">
                            Notification
                        </label>
                        <div class="col-lg-6">
                            <textarea class="form-control" id="notification" name="body" rows="6"></textarea>
                        </div>
                    </div>

                    <div class="form-group row {{$errors->has('last_name') ? 'has-danger' : ''}}">
                        <label class="col-lg-3 control-label text-lg-right pt-2" for="lastname">
                           Member(s)
                       </label>
                       <div class="col-lg-6">
                        <select name="user_id" class="form-control select2" required>
                            <option value="0">AAA - All Members</option>
                            @foreach($users as $row)
                            <option value="{{$row->id}}">{{$row->first_name.' '.$row->last_name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <div class="form-group row">
                    <label class="col-lg-3 control-label text-lg-right pt-2" for="occupation">
                        &nbsp;
                    </label>
                    <div class="col-lg-6">
                        <input type="submit" id="submit" class="btn btn-primary" value="Broadcast Notification">
                    </div>
                </div>


            </form>
            <div class="mt-5"></div>
            @if(count($notifications) > 0)
                <table class="table table-responsive-lg table-bordered table-striped table-sm mb-0 mt-5" id="datatable">
                    <thead>
                        <tr>
                            <th>Notification</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($notifications as $row)
                        <tr>
                            <td>{!! $row->body !!}</td>
                            <td>
                                <a href="{{url('admin/notifications/'.$row->id.'/'.md5(time()))}}" class="btn btn-primary btn-xs mb-2" onclick="return confirm('Are you sure ?')">Remove</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            @endif
        </div>
    </section>
</div>
</div>

</div>
@endsection




