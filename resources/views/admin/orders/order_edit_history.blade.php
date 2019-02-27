@extends('admin.layouts.layout')
@section('content')
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
            <div data-pages="parallax">
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
    </div>
</div>
    <div class="container-fluid bg-white"  
        data-notif-msg="{{ Session::has('message') ? Session::get('message') : '' }}" 
        data-notif-cls="{{ Session::has('alert-class') ? Session::get('alert-class') : '' }}"
        >
        <div class="row">
            <div class="card card-transparent">
                <div class="card-header">
                    <div class="col-12 text-right">
                        <div class="pull-right">
                            <input type="text" id="search-table" class="form-control pull-right" placeholder="Search">
                        </div>
                    </div>
                </div>

                <div class="card-body col-12">
                    <div class="table-responsive">
                        <table class="table" id="tableWithSearch">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Customer Name</th>
                                    <th>Pulled By</th>
                                    <th>Date Written</th>
                                    <th>Origin</th>
                                    <th>Date Picked Up</th>
                                    <th>Status</th>
                                    <th>Order Picked Up</th>
                                    <th>Partial Order</th>
                                    <th>Shipped By</th>
                                    <th>Checked By</th>
                                    <th>Notes</th>
                                    <th>Updated On</th>
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
                                                <span>{{ $value->pulled_by }}</span>
                                            </td>
                                            <td class="v-align-middle semi-bold">
                                                <span>{{ $value->date_written ? date('m/d/Y', strtotime($value->date_written)) : '' }}</span>
                                            </td>
                                            <td class="v-align-middle semi-bold">
                                                <span>{{ \App\Models\Admin\Origination::getNameById($value->origination_id) }}</span>
                                            </td>
                                            <td class="v-align-middle semi-bold">
                                                <span>{{ $value->date_picked_up ? date('m/d/Y', strtotime($value->date_picked_up)) : '' }}</span>
                                            </td>
                                            <td class="v-align-middle semi-bold">
                                                <span>
                                                    @if(is_null($value->status))
                                                        {{-- code... --}}
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
                                                <span>
                                                    {{ \App\Models\Admin\PickedUpAt::getNameById($value->order_picked_up_at) }}
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
                                                <span>{{ $value->shipped_by }}</span>
                                            </td>
                                            <td class="v-align-middle semi-bold">
                                                <span>{{ $value->checked_by }}</span>
                                            </td>
                                            <td class="v-align-middle semi-bold">
                                                <span>{{ $value->notes }}</span>
                                            </td>
                                            <td class="v-align-middle semi-bold">
                                                <span>{{ $value->updated_at ? date('m/d/Y | h:i A', strtotime($value->updated_at)) : '' }}</span>
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
    </div>
    <style type="text/css">
        @media (max-width:767px) {
            div.dataTables_paginate,
            div.dataTables_info,
            div.dataTables_filter{
                margin: 5px;
                width: 100%;
                text-align: left !important;
                float: left !important;
            }
        }
    </style>
@stop