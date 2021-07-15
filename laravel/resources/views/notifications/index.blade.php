@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="#">Home</a></li>
                    <li><a href="{{url('admin')}}">Dashboard</a></li>
                    <li class="active">Notifications</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Notifications</h1>
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

                    @foreach($notifications as $row)

                    <section class="call-to-action featured {{$row->status == 'unread' ? 'featured-primary' : ''}} mb-5">

                        <div class="col-sm-12 col-lg-12">
                            <div class="call-to-action-content">
                                <p class="mb-0">{!! $row->body !!}</p>
                            </div>
                        </div>

                    </section>

                    @endforeach


                    @if(count($notifications) < 1)
                        <p class="text-muted text-center">Information seeking your attention will show here.</p>
                    @endif
                </div>
            </section>
        </div>
        
    </div>

</div>
@endsection