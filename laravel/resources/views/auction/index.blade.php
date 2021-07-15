@extends('layouts.app')

@section('styles')

@endsection
@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">My Auctions</li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <h1>{{_name()}}</h1>
            </div>
        </div>
    </div>
</section>


<div class="container" style="margin-top:15px;">
    <div class="row">
        <div class="col">
            <section class="card card-admin">
                <header class="card-header">
                    <h2 class="card-title">My Auctions</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                        <thead>
                            <tr>
                                <th>Lot ID</th>
                                <th>Item Name</th>
                                <th>Price</th>
                                <th>Status</th>
                                <th>Date Created</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                           @foreach($auctions as $row)
                            <tr>
                                <td>{{$row->lot_id}}</td>
                                <td>{{$row->item_name}}</td>
                                <td>{{_c($row->price)}}</td>
                                <td>{{$row->status}}</td>
                                <td>{{_d($row->created_at)}}</td>
                                <td>
                                    <a href="#" class="btn btn-success btn-xs">
                                        View
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </section>
        </div>
    </div>

</div>


</div>

@endsection


