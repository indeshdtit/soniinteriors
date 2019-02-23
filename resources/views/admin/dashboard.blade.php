@extends('admin.layouts.layout')
@section('content')
<div data-pages="parallax">
    <div class="container-fluid p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb sm-p-b-5">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin_dashboard') }}">Home</a>
                </li>
                <li class="breadcrumb-item active">Dashboard</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid p-l-25 p-r-25 p-t-0 p-b-25 sm-padding-10 dashboard-user-card">
    <div class="row">
        <div class="col-lg-12 sm-m-t-10">
            <div class="widget-13 card no-border no-margin widget-loader-circle">
                <div class="container-sm-height no-overflow">
                    <div class="row row-sm-height m-0">
                        <div class="col-12 col-sm-6 col-sm-height  no-padding mb-2">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2 class="text-success no-margin">Search Order</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 m-t-30">
                                        <form action="{{ route('admin_edit_order') }}" method="GET">
                                            <div class="form-group">
                                                <input type="text" class="form-control" name="receipt_number" required="" placeholder="Receipt Number">
                                            </div>
                                            <button type="submit" class="btn-block btn btn-primary">Search</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-12 col-sm-6 col-sm-height  no-padding mb-2">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2 class="text-success no-margin">Create New Order</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-12 m-t-30">
                                        <div class="form-group">
                                            <input type="text" class="form-control" style="visibility: hidden;">
                                        </div>
                                        <p>
                                            <a href="{{ route('admin_add_order') }}" class="btn-block btn btn-primary">Create New</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container-fluid p-l-25 p-r-25 p-t-0 p-b-25 sm-padding-10 dashboard-user-card">
    <div class="row">
        <div class="col-lg-12 sm-m-t-10">
            <div class="widget-13 card no-border no-margin widget-loader-circle">
                <div class="container-sm-height no-overflow">
                    <div class="row row-sm-height m-0">
                        <div class="col-12 col-sm-height col-top no-padding">
                            <div class="card-header">
                                <div class="card-title">
                                    <h2 class="text-success no-margin">Recent Orders</h2>
                                </div>
                            </div>
                            <div class="card-body">
                                <div class="row m-0">
                                    <div class="col-6 col-sm-3 b-l b-grey p-l-10">
                                        <p class="text-grey all-caps font-montserrat small no-margin">Total</p>
                                        <p class="all-caps font-montserrat no-margin text-success">{{ $orders['count']['total'] }}</p>
                                    </div>
                                    <div class="col-3 d-none d-sm-inline-block b-l b-grey p-l-10">
                                        <p class="text-grey all-caps font-montserrat small no-margin">Today</p>
                                        <p class="all-caps font-montserrat no-margin text-success">{{ $orders['count']['today'] }}</p>
                                    </div>
                                    <div class="col-6 col-sm-3 b-l b-grey p-l-10">
                                        <p class="text-grey all-caps font-montserrat small no-margin">This Week</p>
                                        <p class="all-caps font-montserrat no-margin text-success">{{ $orders['count']['this_week'] }}</p>
                                    </div>
                                    <div class="col-3 b-l b-grey d-none d-sm-inline-block p-l-10">
                                        <p class="text-grey all-caps font-montserrat small no-margin">This Month</p>
                                        <p class="all-caps font-montserrat no-margin text-success">{{ $orders['count']['this_month'] }}</p>
                                    </div>

                                    <div class="col-12 m-t-30">
                                        <p class="hint-text all-caps">Latest 5</p>
                                        <table class="table table-condensed">
                                            <tbody>
                                                <tbody>
                                                    @foreach($orders['list'] as $order)
                                                    <tr>
                                                        <td class="all-caps fs-12">
                                                            <span class="text-grey">#{{ $order->order_number }}</span>
                                                        </td>
                                                        <td class="text-right">
                                                            <a href="{{ route('admin_edit_order', $order->id) }}">
                                                                <span class="text-grey">View</span>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    @endforeach
                                                </tbody>
                                            </tbody>
                                        </table>
                                        <p>
                                            <a href="{{ route('admin_orders') }}" class="btn-block mt-3 btn btn-primary">View all</a>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@stop