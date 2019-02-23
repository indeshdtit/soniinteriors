@extends('admin.layouts.layout')
@section('content')
<link href="{{ URL::asset('backend/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>
<div class="container-fluid">
    <div class="row">
        <div class="container-fluid pull-left p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
            <div data-pages="parallax">
                <div class="inner">
                    <ol class="breadcrumb sm-p-b-5 pull-left">
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin_dashboard') }}">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('admin_orders') }}">Orders</a>
                        </li>
                        <li class="breadcrumb-item active">Edit</li>
                    </ol>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="container-fluid bg-white"
    data-notif-msg="{{ Session::has('message') ? Session::get('message') : '' }}" 
    data-notif-cls="{{ Session::has('alert-class') ? Session::get('alert-class') : '' }}">
     <div class="row m-0">
        <div class="col-12">
            @if($order_details)
                <div class="row">
                    <div class="card card-transparent">
                        <div class="card-body col-12">
                            <form action="{{ route('admin_edit_order', $order_details->id) }}" method="POST" enctype="multipart/form-data" class="row">
                                @csrf
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Order Number</label>
                                        <span class="form-control">{{ $order_details->order_number }}</span>
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label for="date_written" class="control-label mb-0">Date Written</label>
                                        <div id="datepicker_date_written" class="input-group date">
                                            <input class="form-control" id="date_written" name="date_written" type="text" value="{{ $order_details->date_written ? date('m/d/Y', strtotime($order_details->date_written)) : '' }}" readonly="">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        @if (isset($errors) && $errors->has('date_written'))
                                            <label id="date_written-error" class="error" for="date_written">{{ $errors->first('date_written') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Name</label>
                                        <input type="text" name="customer_name" class="form-control" required="" value="{{ $order_details->customer_name }}">
                                        @if (isset($errors) && $errors->has('customer_name'))
                                            <label id="customer_name-error" class="error" for="customer_name">{{ $errors->first('customer_name') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Pulled by</label>
                                        <input type="text" name="pulled_by" class="form-control" value="{{ $order_details->pulled_by }}">
                                        @if (isset($errors) && $errors->has('pulled_by'))
                                            <label id="pulled_by-error" class="error" for="pulled_by">{{ $errors->first('pulled_by') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Origin</label>
                                        <div class="radio radio-success d-block w-100 m-0">
                                            <select class="form-control" data-init-plugin="select2" name="origination_id">
                                                <option value="">-- Select -- </option>
                                                @foreach($originations as $key => $value)
                                                    <option value="{{ $value->id }}" {{ $value->id == $order_details->origination_id ? "selected" : "" }}>{{ $value->origination_name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if (isset($errors) && $errors->has('origination'))
                                            <label id="origination-error" class="error" for="origination">{{ $errors->first('origination') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label for="date_picked_up " class="control-label mb-0">Date Picked up</label>
                                        <div id="datepicker_date_picked_up" class="input-group date">
                                            <input class="form-control" id="date_picked_up" name="date_picked_up" type="text" value="{{ $order_details->date_picked_up ? date('m/d/Y', strtotime($order_details->date_picked_up)) : '' }}" readonly="">
                                            <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                            </span>
                                        </div>
                                        @if (isset($errors) && $errors->has('date_picked_up '))
                                            <label id="date_picked_up -error" class="error" for="date_picked_up ">{{ $errors->first('date_picked_up ') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Status</label>
                                        <div class="radio radio-success d-block w-100 m-0">
                                            <select class="form-control" data-init-plugin="select2" name="status" required="">
                                                @foreach(Config::get('constants.status') as $key => $value)
                                                    <option value="{{ $value }}" {{ $value == $order_details->status ? "selected" : "" }}>{{ ucfirst($key) }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if (isset($errors) && $errors->has('status'))
                                            <label id="status-error" class="error" for="status">{{ $errors->first('status') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label for="date_picked_up" class="control-label mb-0">Order Picked Up</label>
                                        <div class="radio radio-success d-block w-100 m-0">
                                            <select class="form-control" data-init-plugin="select2" name="order_picked_up_at">
                                                <option value="">-- Select -- </option>
                                                @foreach($picked_up_at as $key => $value)
                                                    <option value="{{ $value->id }}" {{ $value->id == $order_details->order_picked_up_at ? "selected" : "" }}>{{ $value->picked_up_at }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                        @if (isset($errors) && $errors->has('picked_up_at'))
                                            <label id="picked_up_at-error" class="error" for="picked_up_at">{{ $errors->first('picked_up_at') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Is Partial Order</label>
                                        <div class="radio radio-success d-block w-100 m-0">
                                            <select class="form-control" data-init-plugin="select2" name="is_partial_order" required="">
                                                <option value="1" {{ $order_details->is_partial_order == 1 ? "selected" : "" }}>Yes</option>
                                                <option value="0" {{ $order_details->is_partial_order == 0 ? "selected" : "" }}>No</option>
                                            </select>
                                        </div>
                                        @if (isset($errors) && $errors->has('is_partial_order'))
                                            <label id="is_partial_order-error" class="error" for="is_partial_order">{{ $errors->first('is_partial_order') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Shipped by</label>
                                        <input type="text" name="shipped_by" class="form-control" value="{{ $order_details->shipped_by }}">
                                        @if (isset($errors) && $errors->has('shipped_by'))
                                            <label id="shipped_by-error" class="error" for="shipped_by">{{ $errors->first('shipped_by') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Checked by</label>
                                        <input type="text" name="checked_by" class="form-control" value="{{ $order_details->checked_by }}">
                                        @if (isset($errors) && $errors->has('checked_by'))
                                            <label id="checked_by-error" class="error" for="checked_by">{{ $errors->first('checked_by') }}</label>
                                        @endif
                                    </div>
                                </div>
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class=" control-label mb-0">Notes</label>
                                        <textarea class="form-control" name="notes" rows="4">{{ $order_details->notes }}</textarea>
                                        @if (isset($errors) && $errors->has('notes'))
                                            <label id="notes-error" class="error" for="notes">{{ $errors->first('notes') }}</label>
                                        @endif
                                    </div>
                                </div>
                                @if(!$order_details->is_void)
                                <div class="col-12 col-sm-6">
                                    <div class="form-group align-items-center">
                                        <label class="control-label mb-0">Upload Attachments</label>
                                        <div class="col-12 p-0">
                                            <input type="file" name="attachments[]" multiple>
                                            @if (isset($errors) && $errors->has('status'))
                                                <label id="status-error" class="error" for="status">{{ $errors->first('status') }}</label>
                                            @endif
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(sizeof($order_attachments) > 0)
                                <div class="col-12">
                                    <div class="form-group row">
                                        <h6 class="control-label">Attachments</h6>
                                        <div class="col-md-12">
                                            <div class="row">
                                                @foreach($order_attachments as $attachment)
                                                    <div class="col-12 col-sm-6 col-md-3">
                                                        <!-- <a href="javascript:void(0);" onclick="delete_attachment(this, '<?php echo $attachment->id; ?>');" class="remove_document text-crose-field">&#10006;</a> -->
                                                        <a href="{{ url($attachment->attachment_path) }}" target="_blank" class="imganch">
                                                            <img src="{{ url($attachment->attachment_path) }}" class="w-100">
                                                        </a>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                @endif
                                @if(!$order_details->is_void)
                                <div class="col-12 mt-4">
                                    <input type="submit" class="btn btn-success" value="Save" name="submit">
                                    <a class="btn btn-default" href="{{ route('admin_order_edit_history', $order_details->id) }}">See Edit History</a>
                                </div>
                                @endif
                            </form>
                        </div>
                    </div>
                </div>
            @else
        </div>
        <div class="col-12">
            <div class="card card-transparent text-center">
                <div class="card-body py-5">
                    <h3 class="m-0">Order does not exist.</h3>
                    <a href="{{ route('admin_orders') }}" class="mt-3 btn btn-primary btn-xs">View all orders</a>
                </div>
            </div>
            @endif
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.date').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true
    });

    var date_written = "<?php echo strtotime($order_details->date_written); ?>";
    if (date_written.length > 0)
    {
        $('#date_written').datepicker("update", new Date(date_written * 1000));
    }

    var date_picked_up = "<?php echo strtotime($order_details->date_picked_up); ?>";
    if (date_picked_up.length > 0)
    {
        $('#date_picked_up').datepicker("update", new Date(date_picked_up * 1000));
    }
});
</script>
<style type="text/css">
    .input-group-addon{
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translate(0,-50%);
    }
    a.remove_document{
        position: absolute;
        background: white;
        color: red;
        padding: 0px 3px;
        border-radius: 100%;
        right: 0px;
        top: -8px;
    }
    .imganch{
        float: left;
        width: 100%;
    }
    input[readonly], textarea[readonly]{
        background-color: #fff !important;
        color: #444 !important;
    }
</style>
@stop