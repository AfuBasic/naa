@extends('layouts.email')

@section('content')
<tr>
	<td align="center" bgcolor="#fbfcfd">
		<table width="90%" border="0" cellspacing="0" cellpadding="0">
			<tr>
				<td align="center">
					<div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
					<div style="line-height: 44px;">
						<font face="Arial, Helvetica, sans-serif" size="5" color="#57697e" style="font-size: 34px;">
							<span style="font-family: Arial, Helvetica, sans-serif; font-size: 34px; color: #57697e;">
								Membership Training Payment Successful
							</span>
						</font>
					</div>
					<div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
				</td>
			</tr>
			<tr>
				<td align="center">
					<div style="line-height: 24px;">
						<font face="Arial, Helvetica, sans-serif" size="4" color="#57697e" style="font-size: 15px;">
							<span style="font-family: Arial, Helvetica, sans-serif; font-size: 15px; color: #57697e;">
								Hello, {{$user->first_name}}, You are one step closer to activating you memership status with us.<br>
								We would send you regular email updates concerning your account. 
							</span>
						</font>
					</div>
					<div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
				</td>
			</tr>
			<tr>
				<td align="center">
					<div style="line-height: 24px;">
						<a href="#" target="_blank" style="color: #596167; font-family: Arial, Helvetica, sans-serif; font-size: 13px;">
							<font face="Arial, Helvetica, sans-seri; font-size: 13px;" size="3" color="#596167">
								Use this <a href="{{url('user/home')}}">Link</a> to login to your account
							</font>
						</a>
					</div>
					<div style="height: 60px; line-height: 60px; font-size: 10px;"> </div>
				</td>
			</tr>
		</table>		
	</td>
</tr>
@endsection