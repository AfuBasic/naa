@extends('layouts.app')

@section('styles')

<link rel="stylesheet" href="{{asset('public/css/overlay.css')}}">
<link rel="stylesheet" href="{{asset('public/dropzone/dropzone.css')}}">
<link rel="stylesheet" href="{{asset('public/dropzone/basic.css')}}">
<style type="text/css">
.dropzone-error{

  border : 2px dotted red !important;
}
</style>
@endsection


@section('content')
<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="col">
        <ul class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li class="active">Auction Listing</li>
        </ul>
      </div>
    </div>
    <div class="row">
      <div class="col">
        <h1>Auction Listing</h1>
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

      @if(session('not_allowed'))
      <div class="overlay">
        <div class="overlay-content alert alert-danger">
          <a href="javascript:void(0);" style="color : #dc3545 !important">
            {{session('not_allowed')}}
          </a>
          <br><br><br>
          <a href="{{url('home')}}" style="font-size:20px;"><i class="fa fa-mail-reply"></i> Click here to go back to Dashboard</a>
        </div>
      </div>
      @endif

      <section class="card card-admin">

        <header class="card-header">
          <h2 class="card-title">Auction Listing Form</h2>
        </header>

        <div class="card-body">


          <form class="form-horizontal form-bordered" id="form" method="post" action="{{url('user/auction/save')}}">

            {{csrf_field()}}

            <div class="form-group row business_name">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="business_name">
                Business Name
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="business_name" name="business_name" value="{{$last_auction->business_name}}" required>
                <span class="help-block text-danger business_name_error" style="display:none;"></span>
              </div>
            </div>

            <div class="form-group row category_id">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="category_id">
                Auction Type
              </label>
              <div class="col-lg-6">
                <select class="form-control" id="category_id" name="category_id" required>
                  @foreach(DB::table('auction_categories')->where(['status' => 'active'])->get() as $row)
                  <option value="{{$row->id}}">{{$row->name}}</option>
                  @endforeach
                </select>
              </div>
            </div>

            <div class="form-group row lot_id">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="lot_id">
                Lot Number
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="lot_id" name="lot_id" required>
              </div>
            </div>

            <div class="form-group row item_name">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="item_name">
                Item Name
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="item_name" name="item_name" required>
              </div>
            </div>

            <div class="form-group row quantity">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="quantity">
                Quantity
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="quantity" name="quantity" value="1">
              </div>
            </div>

            <div class="form-group row price">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="price">
                Unit Price
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="price" name="price">
              </div>
            </div>

            <div class="form-group row phone">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="phone">
                Contact Phone
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="phone" name="phone" value="{{Auth::user()->mobile_number}}">
              </div>
            </div>

            <div class="form-group row state">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="state">
                State
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="state" name="state" value="{{$last_auction->state}}">
              </div>
            </div>

            <div class="form-group row lga">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="lga">
                LGA
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="lga" name="lga" value="{{$last_auction->lga}}">
              </div>
            </div>

            <div class="form-group row address">
              <label class="col-lg-3 control-label text-lg-right pt-2" for="address">
                Address
              </label>
              <div class="col-lg-6">
                <input type="text" class="form-control" id="address" name="address" value="{{$last_auction->address}}">
              </div>
            </div>

            <input type="submit" style="display:none">

          </form>

          <div class="alert alert-danger image-error" style="margin-top: 15px; display:none">
            Please Upload at least one Image.
          </div>

          <div class="row">
            <div class="col-sm-3">
              <form action="{{url('user/auction/upload')}}" method="post" enctype="multipart/form-data" class="form-horizontal dropzone dropzone-first">
                {{ csrf_field() }}
                <div class="dz-message" data-dz-message><span>Click or drop image here to upload. Image One</span></div>
              </form>
            </div>

            <div class="col-sm-3">
              <form action="{{url('user/auction/upload')}}" method="post" enctype="multipart/form-data" class="form-horizontal dropzone">
                 {{ csrf_field() }}
                <div class="dz-message" data-dz-message><span>Click or drop image here to upload. Image Two</span></div>
              </form>
            </div>

            <div class="col-sm-3">
              <form action="{{url('user/auction/upload')}}" method="post" enctype="multipart/form-data" class="form-horizontal dropzone">
                 {{ csrf_field() }}
                <div class="dz-message" data-dz-message><span>Click or drop image here to upload. Image Three</span></div>
              </form>
            </div>

            <div class="col-sm-3">
              <form action="{{url('user/auction/upload')}}" method="post" enctype="multipart/form-data" class="form-horizontal dropzone">
                 {{ csrf_field() }}
                <div class="dz-message" data-dz-message><span>Click or drop image here to upload. Image Four</span></div>
              </form>
            </div>
          </div>

          <div class="form-group row">
            <label class="col-lg-3 control-label text-lg-right pt-2">
              &nbsp;
            </label>
            <div class="col-lg-6 pull-right" style="margin-top: 10px;">
              <input type="button" id="submit" class="btn btn-primary float-right" value="Submit and Proceed to Payment">
            </div>
          </div>

        </div>

      </div>
    </section>
  </div>

</div>
</div>


@endsection

@section('scripts')

<script type="text/javascript" src="{{asset('public/vendor/bootstrap3-typeahead.min.js')}}"></script>
<script src="{{asset('public/dropzone/dropzone.min.js')}}"></script>


<script type="text/javascript">
  $(function(){

    $('#submit').click(() => {

      $.get('{{url('user/auction/check-images')}}', response => {

        if(response < 1){

          $('.image-error').show();
          $('.dropzone-first').addClass('dropzone-error');

        }else{

         $('#form').find('[type="submit"]').trigger('click');
       }

     });


    });

    $.get('{{url('states')}}', response => {

      $('#state').typeahead({source : response});

    });

    $.get('{{url('lgas')}}', response => {

      $('#lga').typeahead({source : response});

    });

  })
</script>
@endsection


