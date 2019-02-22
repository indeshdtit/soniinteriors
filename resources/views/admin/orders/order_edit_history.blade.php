@extends('admin.layouts.layout')
@section('content')
<div data-pages="parallax">
    <div class="container-fluid p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
        <div class="inner">
            <ol class="breadcrumb sm-p-b-5 pull-left">
                <li class="breadcrumb-item">
                    <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                </li>
                <li class="breadcrumb-item">
                    <a href="{{ route('admin_edit_order', $order_id) }}">Order</a>
                </li>
                <li class="breadcrumb-item active">Edit History</li>
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
                            <th>Customer Name</th>
                            <th>Date Written</th>
                            <th>Origination</th>
                            <th>Date Picked Up</th>
                            <th>Order Picked Up At</th>
                            <th>Partial Order</th>
                            <th>Status</th>
                            <th>Changed On</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($edit_history))
                            @foreach($edit_history as $key => $value)
                                <tr>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ ++$key }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->customer_name }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->date_written ? date('m/d/Y', strtotime($value->date_written)) : '' }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        @foreach($originations as $origin)
                                            @if($origin->id == $value->origination_id)
                                                <span>{{ $origin->origination_name }}</span>
                                            @endif
                                        @endforeach
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->date_picked_up ? date('m/d/Y', strtotime($value->date_picked_up)) : '' }}</span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>
                                            @foreach($picked_up_at as $picked)
                                                @if($picked->id == $value->order_picked_up_at)
                                                    <span>{{ $picked->picked_up_at }}</span>
                                                @endif
                                            @endforeach
                                        </span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>
                                            @if(is_null($value->is_partial_order))

                                            @else
                                                @if($value->is_partial_order == 1)
                                                    Yes
                                                @elseif($value->is_partial_order == 0)
                                                    No
                                                @endif
                                            @endif
                                        </span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>
                                            @if(is_null($value->status))

                                            @else
                                                @if($value->status == Config::get('constants.status.active'))
                                                    Active
                                                @elseif($value->status == Config::get('constants.status.inactive'))
                                                    Inactive
                                                @elseif($value->status == Config::get('constants.status.completed'))
                                                    Completed
                                                @endif
                                            @endif
                                        </span>
                                    </td>
                                    <td class="v-align-middle semi-bold">
                                        <span>{{ $value->created_at ? date('m/d/Y | h:i A', strtotime($value->created_at)) : '' }}</span>
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