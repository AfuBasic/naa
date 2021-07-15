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
								New Email Account
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
								Hello, {{$user->first_name}}, Your NAA Email account has been created. <br>
								Your username is <strong>{{$username}}</strong> and your password is <strong>{{$password}}</strong><br><br>
								Logon to your portal and select <strong>My NAA >> Email</strong> to access your account.
							</span>
						</font>
					</div>
					<div style="height: 40px; line-height: 40px; font-size: 10px;"> </div>
				</td>
			</tr>
		</table>		
	</td>
</tr>
@endsection