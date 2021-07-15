<li class="dropdown">
	<a class="dropdown-item dropdown-toggle" href="javascript:;">
		<i class="icon-people"></i>&nbsp;Members <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{url('admin/members')}}">All Members</a></li>
		<li><a class="dropdown-item" href="{{url('admin/member')}}">New Member</a></li>					
		<li><a class="dropdown-item" href="{{url('admin/email')}}">New Email Account</a></li>					
		<li><a class="dropdown-item" href="{{url('admin/newsletter')}}">Newsletter Subscriptions</a></li>
	</ul>
</li>

<li class="dropdown">
	<a class="dropdown-item dropdown-toggle" href="javascript:void(0)">
		<i class="icon-basket-loaded"></i>&nbsp;Auction <i class="fa fa-caret-down"></i>
	</a>
	<ul class="dropdown-menu">
		<li><a class="dropdown-item" href="{{url('admin/auctions')}}">All Auctions</a></li>
		<li><a class="dropdown-item" href="#">New Auction</a></li>
	</ul>
</li>

<li>
	<a class="dropdown-item" href="{{url('admin/payments')}}">
		<i class="icon-credit-card"></i>&nbsp;Payments
	</a>
</li>

<li>
	<a class="dropdown-item" href="{{url('admin/notifications')}}">
		<i class="icon-bell"></i>&nbsp;Notifications
	</a>
</li>


<li>
	<a class="nav-link" href="{{url('logout')}}"><i class="icon-logout"></i>&nbsp;Logout</a>
</li>