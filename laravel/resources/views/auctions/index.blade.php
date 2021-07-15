@extends('layouts.shop')


@section('content')


<div class="container">

  <div class="row">
    <div class="col">
      <hr class="tall mt-4">
    </div>
  </div>

  <div class="row">
    <div class="col-lg-9">

      <div class="row">
        <div class="col-lg-6">
          <h1 class="mb-0"><strong>Auctions</strong></h1>
          <p>Showing 1–10 of {{count($products)}} results.</p>
        </div>
      </div>

      <div class="masonry-loader masonry-loader-showing">

        <div class="row products product-thumb-info-list mt-3" data-plugin-masonry data-plugin-options="{'layoutMode': 'fitRows'}">

          @foreach($products as $row)
          <div class="col-sm-6 col-lg-4 product">
            <a href="#">
              <span class="onsale">0 Bid</span>
            </a>
            <span class="product-thumb-info">
              <a href="shop-cart.html" class="add-to-cart-product">
                <span><i class="fa fa-shopping-cart"></i> Bid Now!</span>
              </a>
              <a href="#">
                <span class="product-thumb-info-image">
                  <span class="product-thumb-info-act">
                    <span class="product-thumb-info-act-left"><em>View</em></span>
                    <span class="product-thumb-info-act-right"><em><i class="fa fa-plus"></i> Details</em></span>
                  </span>
                  <img class="img-fluid" src="{{_product_top_image(json_decode($row->images))}}" style="width:253px; height:253px;">
                </span>
              </a>
              <span class="product-thumb-info-content">
                <a href="#">
                  <h4 class="heading-primary">{{$row->item_name}}</h4>
                  <span class="price">
                    <ins><span class="amount">{{_c($row->price)}}</span></ins>
                  </span>
                </a>
              </span>
            </span>
          </div>

          @endforeach
        </div>
      </div>

      <div class="row">
        <div class="col">
          <ul class="pagination float-right">
            <li class="page-item"><a class="page-link" href="shop-sidebar.html#">«</a></li>
            <li class="page-item active"><a class="page-link" href="shop-sidebar.html#">1</a></li>
            <li class="page-item"><a class="page-link" href="shop-sidebar.html#">2</a></li>
            <li class="page-item"><a class="page-link" href="shop-sidebar.html#">3</a></li>
            <li class="page-item"><a class="page-link" href="shop-sidebar.html#">»</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="col-lg-3">
      <aside class="sidebar">

        <form>
          <div class="input-group input-group-4">
            <input class="form-control" placeholder="Search..." name="s" id="s" type="text">
            <span class="input-group-btn">
              <button type="submit" class="btn btn-primary btn-lg"><i class="fa fa-search"></i></button>
            </span>
          </div>
        </form>

        <hr>

        <h5 class="heading-primary">Categories</h5>

        @foreach(DB::table('auction_categories')->where(['status' => 'active'])->get() as $row)
        <a href="#"><span class="badge badge-dark">{{$row->name}}</span></a>
        @endforeach
        <hr>

        <h5 class="heading-primary">Sponsored Auctions</h5>
        <ul class="simple-post-list">
          <li>
            <div class="post-image">
              <div class="img-thumbnail d-block">
                <a href="#">
                  <img alt="" width="60" height="60" class="img-fluid" src="{{asset('public')}}/img/products/product-1.jpg">
                </a>
              </div>
            </div>
            <div class="post-info">
              <a href="#">Photo Camera</a>
              <div class="post-meta">
                {{_c(299)}}
              </div>
            </div>
          </li>
          <li>
            <div class="post-image">
              <div class="img-thumbnail d-block">
                <a href="#">
                  <img alt="" width="60" height="60" class="img-fluid" src="{{asset('public')}}/img/products/product-2.jpg">
                </a>
              </div>
            </div>
            <div class="post-info">
              <a href="#">Golf Bag</a>
              <div class="post-meta">
                {{_c(720)}}
              </div>
            </div>
          </li>
          <li>
            <div class="post-image">
              <div class="img-thumbnail d-block">
                <a href="#">
                  <img alt="" width="60" height="60" class="img-fluid" src="{{asset('public')}}/img/products/product-3.jpg">
                </a>
              </div>
            </div>
            <div class="post-info">
              <a href="#">Workout</a>
              <div class="post-meta">
                {{_c(720)}}
              </div>
            </div>
          </li>
        </ul>

      </aside>
    </div>
  </div>
</div>


@endsection