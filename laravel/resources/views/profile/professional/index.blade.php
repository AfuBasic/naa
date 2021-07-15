@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Professional Profile</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Professional Profile</h1>
            </div>
        </div>
    </div>
</section>

<div class="container">

</div>

<div class="container" style="margin-top:15px;">


    <div class="row">

        <div class="col-12">

            @include('includes.alert')
            
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Work Experience</h2>
                    
                </header>
                <div class="card-body">


                    <div class="form-group row">
                        <table class="table table-no-more table-bordered table-striped mb-0">

                            <thead>
                                <tr>
                                    <th>Position</th>
                                    <th>Organisation</th>
                                    <th>Period</th>
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>

                                @foreach($work_experiences as $row)
                                <tr>
                                    <th>{{ucwords($row->position)}}</th>
                                    <td>{{ucwords($row->organisation)}}</td>
                                    <td>{{ucwords($row->period)}}</td>
                                    <td><a href="{{url('user/professional/work/remove/'.$row->id)}}" class="btn btn-xs btn-warning">Remove</a></td>
                                </tr>
                                @endforeach


                                <tr>
                                    <form action="{{url('user/professional/work')}}" method="post">
                                        {{csrf_field()}}
                                        <td>
                                         <input type="text" class="form-control" id="organisation" placeholder="Position" name="position" required> 
                                     </td>
                                     <td>
                                       <input type="text" class="form-control" id="organisation" placeholder="Organisation" name="organisation" required> 
                                   </td>
                                   <td>
                                       <input type="text" class="form-control" id="organisation" placeholder="Jan 2016 - Present" name="period" required> 
                                   </td>
                                   <td><button type="submit" class="btn btn-sm btn-primary">Add New</button></td>
                               </form>
                           </tr>

                       </tbody>
                   </table>
               </div>

           </div>
       </section>
   </div>

   <div class="col-12">

    <section class="card card-admin">
        <header class="card-header">
            <h2 class="card-title">Certifications</h2>

        </header>
        <div class="card-body">

            <div class="form-group row">
                <table class="table table-no-more table-bordered table-striped mb-0">

                    <thead>
                        <tr>
                            <th>Certification</th>
                            <th>Institution</th>
                            <th>Period</th>
                            <th>&nbsp;</th>
                        </tr>
                    </thead>
                    <tbody>

                        @foreach($certifications as $row)
                        <tr>
                            <th>{{$row->certificate}}</th>
                            <td>{{$row->institution}}</td>
                            <td>{{$row->period}}</td>
                            <td><a href="{{url('user/professional/certification/remove/'.$row->id)}}" class="btn btn-xs btn-warning">Remove</a></td>
                        </tr>
                        @endforeach

                        <tr>
                            <form action="{{url('user/professional/certification')}}" method="post">
                                {{csrf_field()}}
                                <td>
                                 <input type="text" class="form-control" id="organisation" placeholder="Certifcate" name="certificate" required> 
                             </td>
                             <td>
                               <input type="text" class="form-control" id="organisation" placeholder="Institution" name="institution" required> 
                           </td>
                           <td>
                               <input type="text" class="form-control" id="organisation" placeholder="Jan 2016 - Present" name="period" required> 
                           </td>
                           <td><button type="submit" class="btn btn-sm btn-primary">Add New</button></td>
                       </form>
                   </tr>

               </tbody>
           </table>
       </div>

   </div>
</section>
</div>

</div>
</div>


@endsection


