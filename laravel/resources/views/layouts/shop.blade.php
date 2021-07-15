<!DOCTYPE html>
<html>
<head>

    
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">   

    
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="keywords" content="NAA" />
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
    <link rel="stylesheet" href="{{asset('public/css/theme.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/theme-elements.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/theme-blog.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/theme-shop.css')}}">
    <link rel="stylesheet" href="{{asset('public/css/skins/default.css')}}">        
    <link rel="stylesheet" href="{{asset('public/css/custom.css')}}">
    <script src="{{asset('public/vendor/modernizr/modernizr.min.js')}}"></script>
    <script src="{{asset('public/vendor/jquery/jquery.min.js')}}"></script>

</head>
<body>

    <div class="body">

       @include('includes.header')

       <div role="main" class="main shop">

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
<script src="{{asset('public/vendor/jquery.easy-pie-chart/jquery.easy-pie-chart.min.js')}}"></script>
<script src="{{asset('public/vendor/jquery.gmap/jquery.gmap.min.js')}}"></script>
<script src="{{asset('public/vendor/jquery.lazyload/jquery.lazyload.min.js')}}"></script>
<script src="{{asset('public/vendor/isotope/jquery.isotope.min.js')}}"></script>
<script src="{{asset('public/vendor/owl.carousel/owl.carousel.min.js')}}"></script>
<script src="{{asset('public/vendor/magnific-popup/jquery.magnific-popup.min.js')}}"></script>
<script src="{{asset('public/vendor/vide/vide.min.js')}}"></script>
<script src="{{asset('public/js/theme.js')}}"></script>
<script src="{{asset('public/js/custom.js')}}"></script>
<script src="{{asset('public/js/theme.init.js')}}"></script>
</body>
</html>
