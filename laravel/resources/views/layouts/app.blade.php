<!DOCTYPE html>
<html>
<head>

	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">	
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<meta name="keywords" content="Nigeria Association of Auctioneers Membership Platform" />
	<meta name="description" content="NAA">
	<meta name="author" content="Escape Technologies">
	<title>Nigeria Association of Auctioneers Membership Platform</title>
	<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon" />
	<link rel="apple-touch-icon" href="img/apple-touch-icon.png"> 
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0">
	<link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,600,700,800%7CShadows+Into+Light" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="{{asset('public/vendor/bootstrap/css/bootstrap.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/vendor/font-awesome/css/font-awesome.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/vendor/animate/animate.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/vendor/simple-line-icons/css/simple-line-icons.min.css')}}">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">
	<link rel="stylesheet" href="{{asset('public/vendor/owl.carousel/assets/owl.carousel.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/vendor/owl.carousel/assets/owl.theme.default.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/vendor/magnific-popup/magnific-popup.min.css')}}">
	<link rel="stylesheet" href="{{asset('public/vendor/bootstrap-datepicker/css/bootstrap-datepicker3.css')}}">
	<link rel="stylesheet" href="{{asset('public/edge/vendor/select2/css/select2.css')}}" />
	<link rel="stylesheet" href="{{asset('public/vendor/select2-bootstrap-theme/select2-bootstrap.css')}}" />
	<link rel="stylesheet" href="{{asset('public/css/theme.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/theme-elements.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/theme-blog.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/theme-shop.css')}}">
	<link rel="stylesheet" href="{{asset('public/edge/vendor/bootstrap-fileupload/bootstrap-fileupload.min.css')}}" />
	<link rel="stylesheet" href="{{asset('public/edge/css/theme-admin-extension.css')}}">
	<link rel="stylesheet" href="{{asset('public/edge/css/skins/extension.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/skins/default.css')}}">		
	<link rel="stylesheet" href="{{asset('public/css/custom.css')}}">
	<link rel="stylesheet" href="{{asset('public/css/loading.css')}}">
	<link rel="stylesheet" href="{{asset('public/edge/vendor/datatables/media/css/dataTables.bootstrap4.css')}}" />
	<script src="{{asset('public/vendor/modernizr/modernizr.min.js')}}"></script>
	<script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>

	@yield('styles')
</head>

<body>

	<div class="body">


		@include('includes.header')

		<div role="main" class="main">
			@yield('content')
		</div>

		@include('includes.footer')


	</div>


	<script src="{{asset('public/vendor/jquery.appear/jquery.appear.min.js')}}"></script>
	<script src="{{asset('public/vendor/jquery.easing/jquery.easing.min.js')}}"></script>
	<script src="{{asset('public/vendor/jquery-cookie/jquery-cookie.min.js')}}"></script>
	<script src="{{asset('public/vendor/popper/umd/popper.min.js')}}"></script>
	<script src="{{asset('public/vendor/bootstrap/js/bootstrap.min.js')}}"></script>
	<script src="{{asset('public/vendor/common/common.min.js')}}"></script>
	<script src="{{asset('public/vendor/jquery.validation/jquery.validation.min.js')}}"></script>
	<script src="{{asset('public/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
	<script src="{{asset('public/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
	<script src="{{asset('public/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
	<script src="{{asset('public/vendor/vide/vide.min.js')}}"></script>
	<script src="{{asset('public/vendor/bootstrap-datepicker/js/bootstrap-datepicker.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/autosize/autosize.js')}}"></script>
	<script src="{{asset('public/vendor/bootstrap3-typeahead.min.js')}}"></script>
	<script src="{{asset('public/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/select2/js/select2.js')}}"></script>
	<script src="{{asset('public/js/theme.js')}}"></script>
	<script src="{{asset('public/js/theme.init.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/media/js/jquery.dataTables.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/media/js/dataTables.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/dataTables.buttons.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.bootstrap4.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.html5.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/extras/TableTools/Buttons-1.4.2/js/buttons.print.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/extras/TableTools/JSZip-2.5.0/jszip.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/extras/TableTools/pdfmake-0.1.32/pdfmake.min.js')}}"></script>
	<script src="{{asset('public/edge/vendor/datatables/extras/TableTools/pdfmake-0.1.32/vfs_fonts.js')}}"></script>
	<script src="{{asset('public/edge/js/examples/examples.datatables.default.js')}}"></script>
	<script src="{{asset('public/edge/js/examples/examples.datatables.tabletools.js')}}"></script>
	<script type="text/javascript" src="https://js.paystack.co/v1/inline.js"></script>

	<script type="text/javascript">
		$('.date').datepicker();

		button = $('.pay');

		function payWithPaystack(email = '', amount = 0, orderid = '', redirecturl = '')
		{
			button.prop('disabled', true).html('Loading...');

			var handler = PaystackPop.setup({

				key : 'pk_test_eb615219604cf8aa27d71b9cd6ba507500f56c07',
				email : email,
				amount : amount,
				metadata : {

					orderid : orderid
				},
				callback : function(response){

					console.log(response);
					var url = '{{url('transaction/verify')}}'+'/'+response.reference+'/'+orderid;

					var verify = $.get(url, function(response){

						response = JSON.parse(response);

						if(response.status == 1){

							window.location = redirecturl+'/'+response.payment_reference;

						}else{

							button.prop('disabled', false).html('Payment Failed. Click to try again');
						}
					})
				},
				onClose : function(){

					button.prop('disabled', false).html('Payment Failed. Click to try again');
				}
			});

			handler.openIframe();
		}

		var table = $('#datatable').DataTable({

			"bLengthChange" : false
		});

		$('#search-box').keyup(function(){

			table.search($(this).val()).draw();
		});

		$('.select2').select2();
	</script>

	@yield('scripts')

</body>
</html>
