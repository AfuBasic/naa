@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Dashboard</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <h1>{{$user->first_name.' '.$user->last_name}}</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">

    <div class="row">

        @if($training == null && @$training->status != 'successful')

        <div class="col">
            <div class="alert alert-warning alert-admin">
                <div class="row">
                    <div class="col-lg-12">
                        <h4>Membership Listing</h4>
                        <p>
                            <strong class="warning">
                                <i class="fa fa-warning"></i> Requirements for Full Membership</strong><br>  
                            Just a few more steps to go! Your membership information is yet to be complete. Find below the list of the required documents to complete your registration</p>
                            <ol>
                                <li>Payment for Members Training and Certification Course. ({{_c(25000)}})</li>
                                <li>Attending the Training and Passing the CERTIFICATION Examination</li>
                                <li>Submission of the Required Documentation (To be Confirmed by Sec. Gen)</li>
                                <li>Payment of the Association Welcome Pack listed above - N8,750</li>
                            </ol>

                            <a href="{{url('user/training')}}" class="btn btn-success btn-lg pull-right">
                                Register For Training
                            </a>
                            <br>
                            <br>
                        </div>

                    </div>
                </div>
            </div>

            @endif
        </div>

    </div>

    <div class="container" style="margin-top:15px;">


        <div class="row">
            <div class="col">
                <section class="card card-admin">
                    <header class="card-header">
                        <h2 class="card-title">Dashboard</h2>
                    </header>
                    <div class="card-body">

                        <div class="row">
                           <div class="col-lg-8">
                            <div class="tabs tabs-primary">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#profile" data-toggle="tab">
                                            <i class="fa fa-certificate"></i> Profile
                                        </a>
                                    </li>
                                </ul>
                                <div class="tab-content">
                                    <div id="profile" class="tab-pane active">
                                        <h3>{{Auth::user()->first_name.' '.Auth::user()->last_name}}</h3>

                                        <div class="row">
                                            <div class="col-sm-4">
                                                <div class="photo">
                                                    <img alt="" class="img-fluid img-thumbnail img-responsive" src="{{_photo()}}">
                                                    <a href="{{url('user/profile')}}" class="btn btn-outline btn-block btn-primary btn-xs mb-2 mt-2">
                                                        <i class="fa fa-certificate"></i> Go to Profile
                                                    </a>
                                                </div>
                                            </div>
                                            <div class="col-sm-8">

                                                <table class="table table-responsive table-bordered table-striped">

                                                    <tbody>

                                                        <tr>
                                                            <th>{{_svg('essential/id-card-5.svg')}}Member ID</th>
                                                            <td>{{Auth::user()->membership_id}}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>{{_svg('web/envelope.svg')}}Email</th>
                                                            <td>{{Auth::user()->email}}</td>
                                                        </tr>
                                                        <tr>
                                                            <th>{{_svg('essential/calendar-2.svg')}}Membership Since</th>
                                                            <td>{{_d(Auth::user()->created_at, false)}}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>{{_svg('signals/100-prohibition.svg')}}Membership Expires</th>
                                                            <td>{{_d(Auth::user()->created_at.' + 1 year', false)}}</td>
                                                        </tr>

                                                        <tr>
                                                            <th>{{_svg('essential/home-2.svg')}}State Chapter</th>
                                                            <td><a href="#">Find a state chapter</a></td>
                                                        </tr>

                                                    </tbody>
                                                </table>

                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-4">
                            <div class="tabs tabs-quaternary">
                                <ul class="nav nav-tabs">
                                    <li class="nav-item active">
                                        <a class="nav-link" href="#membership-status" data-toggle="tab">
                                           <i class="fa fa-certificate"></i> Membership Status
                                       </a>
                                   </li>
                               </ul>
                               <div class="tab-content">
                                <div id="membership-status" class="tab-pane active">

                                 <div class="text-center" style="margin-bottom:15px;">
                                    {{_svg('essential/'.$badge, 'svg-30')}}
                                </div>
                                <div class="text-center">
                                    <h3 class="text-{{$cssclass}}" style="margin-bottom:0">{{Auth::user()->status}}</h3>
                                    <small class="text-danger">{{$difference}} Days Remaining</small>
                                    <hr>
                                    @if($training == null && @$training->status != 'successful')
                                    <a href="{{url('user/training')}}" class="btn btn-success">
                                        Register For Training
                                    </a>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>

        </div>
    </section>
</div>


{{-- <div class="col-12">

    <hr class="d-lg-none tall" />

    <h2><i class="fa fa-calendar"></i> Upcoming <strong>Events</strong></h2>

    <div class="toggle toggle-primary" data-plugin-toggle data-plugin-options="{ 'isAccordion': true }">
        <section class="toggle active">
            <label>AUCTION! AUCTION!! AUCTION!!!</label>
            <div class="toggle-content">

             <article class="post post-large blog-single-post">


                <div class="post-date">
                    <span class="day">10</span>
                    <span class="month">Jan</span>
                </div>

                <div class="post-content">

                    <h2><a href="#">AUCTION! AUCTION!! AUCTION!!!</a></h2>

                    <p>This is to inform the public that there will be an auction sale, For more information contact the auctioneer;-08052427108, 08124875522, isibor@naa.org.ng , benstrser@yahoo.com</p>

                    <a href="#" class="btn btn-outline btn-success mb-2 pull-right">
                        <i class="fa fa-google"></i> Add this event to your Google Calendar
                    </a>
                </div>
            </article>

        </div>
    </section>
    
</div> --}}
</div>
</div>


</div>

@endsection



