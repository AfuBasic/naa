@extends('layouts.app')

@section('content')

<section class="page-header">
    <div class="container">
        <div class="row">
            <div class="col">
                <ul class="breadcrumb">
                    <li><a href="{{url('/')}}">Home</a></li>
                    <li class="active">Payments</li>
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
                    <h2 class="card-title">Payments</h2>
                </header>
                <div class="card-body">
                    <table class="table table-bordered table-striped mb-0" id="datatable-tabletools">
                        <thead>
                            <tr>
                                <th>Description</th>
                                <th>Amount</th>
                                <th>Status</th>
                                <th>Transaction Date</th>
                                <th>&nbsp;</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($transactions as $row)
                            <tr>
                                <td>{{ucwords(implode(' ', explode('_', $row->payment_type)))}}</td>
                                <td>{{_c($row->amount)}}</td>
                                <td>{{ucwords($row->status)}}</td>
                                <td>{{_d($row->created_at, false)}}</td>
                                <td>
                                    @if($row->status == 'successful')
                                    <a href="#" class="btn btn-success btn-sm">
                                        View Receipt
                                    </a>
                                    @else($row->status == 'pending')
                                    <a href="#" class="btn btn-warning btn-sm">
                                        Pay Now
                                    </a>
                                    @endif
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



