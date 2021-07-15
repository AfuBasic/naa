<?php 

use Unicodeveloper\Jusibe\Jusibe;

function _d($dateString = '', $time = true)
{
	if($time == false)
		return date('M d, Y', strtotime($dateString));

	return date('M d, Y g:i A', strtotime($dateString));
}

function _c($amount = 0)
{
	return '&#8358;'.number_format($amount, 2);
}

function _name()
{
	return ucwords(Auth::user()->first_name.' '.Auth::user()->last_name);
}


function _membershipId($code = '')
{	
	$serial = DB::table('users')->orderBy('serial', 'desc')->first()->serial+1;

	if($serial % 100 == 0)
		$serial+=1;

	$code 	= str_pad($code, 2, '0', STR_PAD_LEFT);
	$serial = str_pad($serial, 3, '0', STR_PAD_LEFT);
	$id 	= $code.''.$serial;

	if(DB::table('users')->where(['membership_id' => $id])->count() > 0){

		return _membershipId($code);
	}

	return ['serial' => $serial, 'id' => $id];
}

function _sendSMS_($phone = '', $sms = '')
{
	$url = 'http://routesms.com:8080/bulksms/bulksms?username=escape1&password=z9m2w4x7&type=0&dlr=1';
	$url .= '&destination='.$phone.'&source=NAA&message='.$sms;

	return $url;
}

function _sendSMS($phoneNumber = '8175020329', $body = '')
{
	if(empty($body))
		return;

	$jusibe = new Jusibe('c8facfb93ef1c1d744050ada68c46bd6', 'd50f782d4cb0cc71f16bbd85deb52389');

	$payload = [

		'to'		=> substr($phoneNumber, -11, 11),
		'from'		=> 'NAA',
		'message'	=> $body
	];

	try{

		return $jusibe->sendSMS($payload)->getResponse();

	}catch(Exception $e){

		return $e->getMessage();
	}
}

function _sendOTPNotification($user = object, $body = '')
{
	_sendSMS($user->mobile_number, $body);

	Mail::raw($body, function($message) use ($body, $user){

		$message->subject($body);
		$message->from('mails@naa.org.ng', 'NAA OTP');
		$message->to($user->email);

	});
}

function _svg($name = '', $class = 'svg-15')
{
	$path = asset('public/icons/'.$name);

	echo "<img src='{$path}' class='{$class}'/>";
}

function _photo()
{
	if(Auth::user()->photo == null || !file_exists(public_path('uploads/'.Auth::user()->photo)))
		return asset('public/img/team/default.png');

	return asset('public/uploads/'.Auth::user()->photo);
}

function _product_top_image($images = [])
{
	if(count($images) < 1)
		return '';

	return asset('public/uploads/auctions/'.$images[0]);
}