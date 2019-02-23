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
                        <li class="breadcrumb-item active">Orders</li>
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
        <div class="card card-transparent row m-0 ">
            <div class="card-header w-100">
                <div class="row">
                    <div class="col-12">
                        <!-- <div class="col-6 col-sm-4 col-md-3 col-lg-2"> -->
                            <a href="{{ route('admin_add_order') }}" class="btn btn-primary add_new_btn">Add New Order</a>
                        <!-- </div> -->
                        <!--<div class="col-6 col-sm-4 col-md-3 col-lg-2  pl-1">
                            <input type="text" id="search-table" class="form-control" placeholder="Search">
                        </div> -->
                    </div>
                </div>
            </div>

            <div class="card-body col-12">
                <div class="table-responsive">
                    <table class="table" id="orderTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Receipt Number</th>
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
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if(!empty($list))
                                @foreach($list as $key => $value)
                                    <tr class="{{ $value->is_void ? 'void-order bg-danger' : '' }}">
                                        <td class="v-align-middle semi-bold" data-title="#">
                                            <span>{{ ++$key }}</span>
                                        </td>
                                        <td class="v-align-middle semi-bold" data-title>
                                            <span>
                                                <a href="{{ route('admin_edit_order', $value->id) }}">{{ $value->order_number }}</a>
                                            </span>
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
                                            <span>{{ \App\Models\Admin\PickedUpAt::getNameById($value->order_picked_up_at) }}</span>
                                        </td>
                                        <td class="v-align-middle semi-bold">
                                            <span>{{ $value->is_partial_order ? 'Yes' : 'No' }}</span>
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
                                            <span>
                                                <small>
                                                <a href="{{ route('admin_download_receipt', $value->id) }}">Download Receipt</a>
                                                @if(!$value->is_void)
                                                    <span>&nbsp;|&nbsp;</span>
                                                    <a href="javascript:void(0);" data-location="{{ route('admin_delete_order', $value->id) }}" class="conf_btn">Void</a>
                                                @endif
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
    <style type="text/css">
        .bg-danger td{
            background: #f5c6cb !important;
            text-decoration: line-through;
        }
        @media (max-width:767px) {
            div.dataTables_paginate,
            div.dataTables_info,
            div.dataTables_filter,
            div.dt-buttons{
                margin: 5px;
                width: 100%;
                text-align: left !important;
                float: left !important;
            }
        }
    </style>

    <script type="text/javascript">
        $(document).ready(function() {
            var table = $('#orderTable').DataTable( {
                dom: 'Bfrtip',
                destroy: true,
                pageLength: 50,
                iDisplayLength: 5,
                scrollCollapse: true,
                oLanguage: {
                    sLengthMenu: "_MENU_ ",
                    sInfo: "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
                },
                buttons: [{
                    extend: 'pdfHtml5',
                    text: '&nbsp;Export to PDF&nbsp;',
                    orientation: 'landscape',
                    title: 'Soni Interiors Orders',
                    download: 'open',
                    exportOptions: {
                        modifier: {
                            order: 'original', // 'current', 'applied', 'index', 'original'
                            page: 'all', // 'all', 'current'
                            search: 'applied' // 'none', 'applied', 'removed'
                        },
                        columns: [ 0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12]
                    }
                }]
            });

            $('.buttons-pdf').addClass('btn btn-success');
            $('.buttons-pdf').removeClass('dt-button');

            // $('.add_new_btn').after('&nbsp;'+ $('.dt-buttons').html());
            // $('.card-header').find('.buttons-pdf').attr('onclick', $('.dt-buttons .buttons-pdf').click());
        });
    </script>
@stop