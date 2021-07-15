<li class="dropdown">
	<a class="dropdown-item dropdown-toggle" href="{{url('user/home')}}">
		<i class="icon-compass"></i>&nbsp;My NAA <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{url('user/home')}}">Dashboard</a></li>
		<li><a class="dropdown-item" href="{{url('user/email')}}">Email</a></li>					
		<li><a class="dropdown-item" href="{{url('user/auction/list')}}">List An Auction</a></li>
		<li><a class="dropdown-item" href="{{url('user/auction')}}">My Auctions</a></li>
	</ul>
</li>

<li class="dropdown">
	<a class="dropdown-item dropdown-toggle" href="javascript:void(0)">
		<i class="icon-user"></i>&nbsp;Profile <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{url('user/profile')}}">Personal Info</a></li>
		<li><a class="dropdown-item" href="{{url('user/professional')}}">Professional Info</a></li>
		<li><a class="dropdown-item" href="#">Request for Welcome Pack</a></li>
		<li><a class="dropdown-item" href="#">Request for Certificate</a></li>
		<li><a class="dropdown-item" href="#">Request for Training</a></li>
		<li><a class="dropdown-item" href="#">Request for Company Association</a></li>
	</ul>
</li>

<li>
	<a class="dropdown-item" href="{{url('user/payments')}}">
		<i class="icon-wallet"></i>&nbsp;Payments
	</a>
</li>

@php
	$notifications = \App\Notification::count(Auth::user()->id);
@endphp
<li>
	<a class="dropdown-item" href="{{url('user/notifications')}}">
		<i class="icon-bell"></i>&nbsp;Notifications @if($notifications > 0) <span class="tag tag-pill tag-danger tag-up ld ld-pulse">{{$notifications}}</span> @endif
	</a>
</li>

<li class="dropdown">
	<a class="dropdown-item dropdown-toggle" href="javascript:void(0)">
		<i class="icon-docs"></i>&nbsp;Resources <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{url('user/resources/code-of-conduct')}}">Code of Conduct</a></li>
		<li><a class="dropdown-item" href="{{url('user/resources/naa-constitution')}}">NAA Constitution</a></li>
		<li><a class="dropdown-item" href="{{url('user/resources/website-policy')}}">Website Policy</a></li>
		<li><a class="dropdown-item" href="#">Publications</a></li>
	</ul>
</li>

<li>
	<a class="dropdown-item" href="{{url('user/auctions')}}">
		<i class="icon-basket-loaded"></i>&nbsp;Auctions
	</a>
</li>

<li>
	<a class="nav-link" href="{{url('logout')}}"><i class="icon-logout"></i>&nbsp;Logout</a>
</li>

