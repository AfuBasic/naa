@extends('layouts.app')


@section('content')

<section class="page-header">
  <div class="container">
    <div class="row">
      <div class="col">
        <ul class="breadcrumb">
          <li><a href="{{url('/')}}">Home</a></li>
          <li><a href="#">Auction</a></li>
          <li class="active">Auction</li>
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

<div class="container" style="margin-top:15px;">

  <div class="container">

    <div class="row">
      <div class="col">
        <hr class="tall">
      </div>
    </div>

    <div class="row">
      <div class="col-lg-6">

        <div class="owl-carousel owl-theme" data-plugin-options="{'items': 1}">
          <div>
            <div class="thumbnail">
              <img alt="" class="img-fluid border rounded" src="{{asset('public/img/products/product-7.jpg')}}">
            </div>
          </div>
          <div>
            <div class="thumbnail">
              <img alt="" class="img-fluid border rounded" src="{{asset('public/img/products/product-7-2.jpg')}}">
            </div>
          </div>
          <div>
            <div class="thumbnail">
              <img alt="" class="img-fluid border rounded" src="{{asset('public/img/products/product-7-3.jpg')}}">
            </div>
          </div>
        </div>

      </div>

      <div class="col-lg-6">

        <div class="summary entry-summary">

          <h1 class="mb-0"><strong>Blue Ladies Handbag</strong></h1>

          <div class="review_num">
            <span class="count" itemprop="ratingCount">2</span> reviews
          </div>

          <div title="Rated 5.00 out of 5" class="star-rating">
            <span style="width:100%"><strong class="rating">5.00</strong> out of 5</span>
          </div>

          <p class="price">
            <span class="amount">$22</span>
          </p>

          <p class="mb-4">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh sed elimttis adipiscing. Fusce in hendrerit purus. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Sed tempus nibh sed elimttis adipiscing. Fusce in hendrerit purus. </p>

          <form enctype="multipart/form-data" method="post" class="cart">
            <div class="quantity">
              <input type="button" class="minus" value="-">
              <input type="text" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
              <input type="button" class="plus" value="+">
            </div>
            <button href="#" class="btn btn-primary pt-2 pb-2 pr-3 pl-3">Add to cart</button>
          </form>

          <div class="product_meta">
            <span class="posted_in">Categories: <a rel="tag" href="shop-product-full-width.html#">Accessories</a>, <a rel="tag" href="shop-product-full-width.html#">Bags</a>.</span>
          </div>

        </div>


      </div>
    </div>

  
  </div>

</div>
</div>


@endsection