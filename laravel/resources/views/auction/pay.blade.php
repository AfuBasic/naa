@extends('layouts.app')

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
        <h1>Auction of {{$auction->item_name}} by {{$auction->business_name}}</h1>
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
          <h2 class="card-title">Auction of {{$auction->item_name}} by {{$auction->business_name}}</h2>
        </header>

        <div class="card-body">

          <table class="table table-bordered table-striped">
            <tbody>
              <tr>
                <th>Business Name</th>
                <td>{{$auction->business_name}}</td>
              </tr>

              <tr>
                <th>Category</th>
                <td>{{DB::table('auction_categories')->where(['id' => $auction->category_id])->first()->name}}</td>
              </tr>

              <tr>
                <th>Lot Number</th>
                <td>{{$auction->lot_id}}</td>
              </tr>

              <tr>
                <th>Item Name</th>
                <td>{{$auction->item_name}}</td>
              </tr>

              <tr>
                <th>Quantity</th>
                <td>{{$auction->quantity}}</td>
              </tr>

              <tr>
                <th>Price</th>
                <td>{{_c($auction->price)}}</td>
              </tr>

              <tr>
                <th>Address</th>
                <td>{{$auction->address.' '.$auction->state.' '.$auction->lga}}</td>
              </tr>

              <tr>
                <th>Status</th>
                <td>Pending</td>
              </tr>

              <tr>
                <td colspan="2">
                  <button type="button" class="btn btn-primary float-right pay"><i class="fa fa-money"></i> Pay N1000 to Publish this Auction</button>
                </td>
              </tr>

            </tbody>
          </table>
        </div>

      </section>

    </div>

  </div>

</div>

<script type="text/javascript">
  
  var email         = '{{$user->email}}';
  var amount        = '{{$transaction->amount*100}}';
  var orderid       = '{{$transaction->payment_reference}}';
  var redirecturl   = '{{url('transaction/auction')}}';

  $('.pay').click(() => {

    payWithPaystack(email, amount, orderid, redirecturl);

  });
</script>
@endsection


