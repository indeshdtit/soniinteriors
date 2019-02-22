@extends('admin.layouts.layout')
@section('content')
<div data-pages="parallax">
    <div class="container-fluid p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb sm-p-b-5 pull-left">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item active">Users</li>
            </ol>
        </div>
    </div>
</div>
<div class="container-fluid container-fixed-lg bg-white pull-left" 
    data-notif-msg="{{ Session::has('message') ? Session::get('message') : '' }}" 
    data-notif-cls="{{ Session::has('alert-class') ? Session::get('alert-class') : '' }}"
    >
    <div class="row">
        <div class="card card-transparent">
            <div class="card-header">
                <div class="col-xs-12 text-right">
                    <div class="pull-left">
                        <a href="{{ route('admin_add_order') }}" class="btn btn-primary btn-sm">Add New Order</a>
                    </div>
                    <div class="pull-right">
                        <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                    </div>
                </div>
            </div>

            <div class="card-body px-0">
                <table class="table table-hover table-responsive-block" id="tableWithSearch">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Receipt Number</th>
                            <th>Customer Name</th>
                            <th>Date Written</th>
                            <th>Origination</th>
                            <th>Date Picked Up</th>
                            <th>Order Picked Up At</th>
                            <th>Partial Order</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($list))
                            @foreach($list as $key => $value)
                                <tr>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ ++$key }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span><a href="{{ route('admin_edit_order', $value->id) }}">{{ $value->order_number }}</a></span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->customer_name }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->date_written ? date('m/d/Y', strtotime($value->date_written)) : '' }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->origination_id }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->date_picked_up ? date('m/d/Y', strtotime($value->date_picked_up)) : '' }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->order_picked_up_at }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->is_partial_order ? 'Yes' : 'No' }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>
                                            @if($value->status == Config::get('constants.status.active'))
                                                Active
                                            @elseif($value->status == Config::get('constants.status.inactive'))
                                                Inactive
                                            @elseif($value->status == Config::get('constants.status.completed'))
                                                Completed
                                            @endif
                                        </span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>
                                            <small>
                                                <a href="javascript:void(0);" data-location="{{ route('admin_delete_order', $value->id) }}" class="conf_btn">Delete</a>
                                            </small>
                                        </span>
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@stop