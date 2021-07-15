@extends('layouts.app')

@section('content')

<style type="text/css">

*{

	box-sizing: none !important;	
}

body{

	padding : 0;
	border-box
}
iframe{

	box-shadow: none;
	border: 0;
}
</style>

<section class="page-header">
	<div class="container">
		<div class="row">
			<div class="col">
				<ul class="breadcrumb">
					<li><a href="{{url('home')}}">Home</a></li>
					<li class="active">{{$title}}</li>
				</ul>
			</div>
		</div>
		<div class="row">
			<div class="col">
				<h1>{{$title}}</h1>
			</div>
		</div>
	</div>
</section>

<div class="container">

	<div class="row">

		<div class="col">

			<h2>{{$title}}</h2>

			{{-- <iframe src="http://naa.org.ng/{{$file}}.pdf" style="width:100%; height:800px"></iframe> --}}
			<iframe src="https://naa.org.ng/google.pdf" style="width:100%; height:800px"></iframe>
		</div>

	</div>

</div>
@endsection