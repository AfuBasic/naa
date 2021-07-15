@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Registration</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>Membership Registration</h1>
            </div>
        </div>
    </div>
</section>


<div class="container">



    <div class="row">
        <div class="col">
            <div class="alert alert-info alert-admin">
                <div class="row">
                    <div class="col-lg-12">

                        <h4>Membership Application</h4>

                        @if($user->type == 'existing')

                        <p><strong class="warning"><i class="fa fa-warning"></i> Important Information</strong>  Please complete this form carefully and ensure that all information entered are valid. Any information found incorrect in this form would render your application invalid. Refer to our <a href="#">terms and conditions for futher info.</a></p>
                        <p class="warning">Please Note that you are expected to pay the sum of Eight Thousand, Seven Hundred and Fifty Naira (N8, 750) for the following:</p>
                        <ol>
                            <li>NAA Online Listing</li>
                            <li>Custom Naa Email Account</li>
                            <li>NAA Identity Card</li>
                        </ol>


                        @else

                        <p><strong class="warning"><i class="fa fa-warning"></i> Important Information</strong>  Please fill this form carefully and ensure that all information entered are valid. Any information found incorrect in this form would render your application invalid. Refer to our <a href="#">terms and conditions for futher info.</a></p>
                        <p class="warning">Please Note that the sum of Three thousand Naira (N3, 000) is required to activate your account.</p>

                        @endif
                    </div>

                </div>
            </div>
        </div>
    </div>
    

</div>

<div class="container">

    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">Application Form</h2>
                </header>
                <div class="card-body">

                    @php
                    $action = $user->type == 'existing' ? 'existing/register' : 'register';
                    @endphp
                    
                    <form class="form-horizontal form-bordered" method="POST" action="{{url('auth/'.$action.'/'.$user->id)}}">
                        {{ csrf_field() }}

                        @include('includes.alert')

                        <div class="form-group row {{$errors->has('first_name') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="firstname">
                                First Name
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="firstname" name="first_name" value="{{old('first_name', $user->first_name)}}" @if($user->type == 'existing') disabled @endif>
                                @if($errors->has('first_name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('last_name') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="lastname">
                                Last Name
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="lastname" name="last_name" value="{{old('last_name', $user->last_name)}}" @if($user->type == 'existing') disabled @endif>
                                @if($errors->has('last_name'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('email') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="email">
                                Email Address
                            </label>
                            <div class="col-lg-6">
                                <input type="email" class="form-control" id="email" name="email" value="{{old('email', $user->email)}}" @if($user->type == 'existing') disabled @endif>
                                @if($errors->has('email'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('address') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="address">
                                Contact Address
                            </label>
                            <div class="col-lg-6">
                                <textarea id="address" class="form-control" rows="3" name="address">{{old('address', $user->address)}}</textarea>
                                @if($errors->has('address'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('address') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        
                        <div class="form-group row {{$errors->has('marital_status') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2">Sex</label>
                            <div class="col-lg-6">
                                <select class="form-control form-control-lg mb-3" name="sex">

                                    @foreach($sex as $row)

                                    @if(old('marital_status', $user->marital_status) == $row)
                                    <option value="{{$row}}" selected>{{ucfirst($row)}}</option>
                                    @else
                                    <option value="{{$row}}">{{ucfirst($row)}}</option>
                                    @endif

                                    @endforeach
                                </select>

                                @if($errors->has('marital_status'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('marital_status') }}</strong>
                                </span>
                                @endif

                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('place_of_birth') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="place_of_birth">
                                Place of Birth
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="place_of_birth" name="place_of_birth" value="{{old('place_of_birth', $user->place_of_birth)}}">
                                @if($errors->has('place_of_birth'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('place_of_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('date_of_birth') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="date_of_birth">
                                Date of Birth
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control date" id="date_of_birth" name="date_of_birth" value="{{old('date_of_birth', $user->date_of_birth)}}">

                                @if($errors->has('date_of_birth'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('date_of_birth') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('occupation') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="occupation">
                                Occupation
                            </label>
                            <div class="col-lg-6">
                                <select name="occupation" id="occupation" class="form-control select2" required>
                                    <option>--select--</option>
                                    <option value="Architecture, Planning & Environmental Design">
                                        Architecture, Planning & Environmental Design
                                    </option>
                                    <option value="Arts & Entertainment">Arts & Entertainment</option>
                                    <option value="Business">Business</option>
                                    <option value="Communications">Communications</option>
                                    <option value="Education">Education</option>
                                    <option value="Engineering & Computer Science">
                                        Engineering & Computer Science
                                    </option>
                                    <option value="Environment">Environment</option>
                                    <option value="Government">Government</option>
                                    <option value="Health & Medicine">Health & Medicine</option>
                                    <option value="International">International</option>
                                    <option value="Law & Public Policy">Law & Public Policy</option>
                                    <option value="Nonprofit">Nonprofit</option>
                                    <option value="Sciences-Biological & Physical">
                                        Sciences-Biological & Physical
                                    </option>
                                </select>
                                @if($errors->has('occupation'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('occupation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('mobile_number') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="mobile_number">
                                Mobile Number
                            </label>
                            <div class="col-lg-6">
                                <input type="number" class="form-control" id="mobile_number" name="mobile_number" value="{{old('mobile_number', $user->mobile_number)}}" @if($user->type == 'existing') disabled @endif>
                                @if($errors->has('mobile_number'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('mobile_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('office_number') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="office_number">
                                Office Number
                            </label>
                            <div class="col-lg-6">
                                <input type="number" name="office_number" class="form-control" id="office_number" value="{{old('office_number', $user->office_number)}}">
                                @if($errors->has('office_number'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('office_number') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row {{$errors->has('state') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="state">
                                State
                            </label>
                            <div class="col-lg-6">
                                <select name="state" class="form-control select2 state" required>
                                    <option value="">--Select State--</option>
                                    @foreach(DB::table('states')->orderBy('name', 'asc')->get() as $row)
                                    @if(old('state', $user->state) == $row->name)
                                        <option value="{{$row->name}}" data-ids="{{$row->id}}" selected>{{$row->name}}</option>
                                    @else
                                        <option value="{{$row->name}}">{{$row->name}}</option>
                                    @endif
                                    @endforeach
                                </select>
                                @if($errors->has('state'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('state') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>

                         <div class="form-group row {{$errors->has('lga') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="lga">
                                LGA
                            </label>
                            <div class="col-lg-6">
                                <select name="lga" id="lga" class="form-control select2"></select>
                                @if($errors->has('lga'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('lga') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>


                        @if($user->type == 'existing')
                        <div class="form-group row {{$errors->has('last_certificate_id') ? 'has-danger' : ''}}">
                            <label class="col-lg-3 control-label text-lg-right pt-2" for="last_certificate_id">
                                Last Membership Certificate ID Number
                            </label>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" id="last_certificate_id" name="last_certificate_id" value="{{old('last_certificate_id', $user->last_certificate_id)}}">
                                @if($errors->has('last_certificate_id'))
                                <span class="help-block text-danger">
                                    <strong>{{ $errors->first('last_certificate_id') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        @endif
                        
                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                Terms
                            </label>
                            <div class="col-lg-6">
                                <div class="checkbox">
                                    <label>
                                        <input type="checkbox" id="checkbox">
                                        I hereby declare that the information given by me are correct to the best of my knowledge and i promise to comply with the rules and regulations if my application is approved.

                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label class="col-lg-3 control-label text-lg-right pt-2">
                                &nbsp;
                            </label>
                            <div class="col-lg-6">
                                <input type="submit" id="submit" class="btn btn-primary" value="Submit">
                            </div>
                        </div>


                    </form>
                </div>
            </section>
        </div>
    </div>


</div>

@endsection

@section('scripts')
<script type="text/javascript">

    $('#submit').prop('disabled', true);

    $('#checkbox').change(() => {

        if($('#checkbox').is(':checked')){

            $('#submit').prop('disabled', false);

        }else{

            $('#submit').prop('disabled', true);
        }
    });

    $("select.state").on("change", function () {
        v = $(this).find("option:selected").text()
        console.log(v)
        $.get('{{url('lgas')}}/'+v, response => {
        $("select#lga").select2("destroy")
        $("select#lga").html(response);
        $("select#lga").select2()
    });
    })
    

    @if(old('occupation', $user->occupation) != '')
        $('#occupation').val('{{old('occupation', $user->occupation)}}');
    @endif
</script>
@endsection



