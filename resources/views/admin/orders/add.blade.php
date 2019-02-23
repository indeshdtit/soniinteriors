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
                            <li class="breadcrumb-item active">Add</li>
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
            <div class="card card-transparent">
                <div class="card-body col-12">
                    <form action="{{ route('admin_add_order') }}" method="POST" enctype="multipart/form-data" class="row">
                        @csrf
                        <div class="col-12 col-sm-6">
                            <div class="form-group align-items-center">
                                <label class="control-label mb-0">Order Number</label>
                                <input type="text" name="order_number" class="form-control" required="">
                                @if (isset($errors) && $errors->has('order_number'))
                                    <label id="order_number-error" class="error" for="order_number">{{ $errors->first('order_number') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group align-items-center">
                                <label for="date_written" class="control-label mb-0">Date Written</label>
                                <div id="datepicker_date_written" class="input-group date">
                                    <input class="form-control" id="date_written" name="date_written" type="text" value="{{ old('date_written') }}" readonly="">
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
                                <input type="text" name="customer_name" class="form-control" required="">
                                @if (isset($errors) && $errors->has('customer_name'))
                                    <label id="customer_name-error" class="error" for="customer_name">{{ $errors->first('customer_name') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group align-items-center">
                                <label class="control-label mb-0">Pulled by</label>
                                <input type="text" name="pulled_by" class="form-control">
                                @if (isset($errors) && $errors->has('pulled_by'))
                                    <label id="pulled_by-error" class="error" for="pulled_by">{{ $errors->first('pulled_by') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group align-items-center">
                                <label class=" control-label mb-0">Origin</label>
                                <div class="radio radio-success my-0 d-block w-100 m-0 ">
                                    <select class="form-control" data-init-plugin="select2" name="origination_id">
                                        <option value="">-- Select -- </option>
                                        @foreach($originations as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->origination_name }}</option>
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
                                <label for="date_picked_up" class="control-label mb-0">Date Picked up</label>
                                <div id="datepicker_date_written" class="input-group date">
                                    <input class="form-control" id="date_picked_up " name="date_picked_up" type="text" value="{{ old('date_picked_up ') }}" readonly="">
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
                                <div class="radio radio-success my-0 d-block w-100 m-0 ">
                                    <select class="form-control" data-init-plugin="select2" name="status" required="">
                                        @foreach(Config::get('constants.status') as $key => $value)
                                            <option value="{{ $value }}">{{ ucfirst($key) }}</option>
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
                                <div class="radio radio-success my-0 d-block w-100 m-0 ">
                                    <select class="form-control" data-init-plugin="select2" name="order_picked_up_at">
                                        <option value="">-- Select -- </option>
                                        @foreach($picked_up_at as $key => $value)
                                            <option value="{{ $value->id }}">{{ $value->picked_up_at }}</option>
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
                                <div class="radio radio-success my-0 d-block w-100 m-0 ">
                                    <select class="form-control" data-init-plugin="select2" name="is_partial_order" required="">
                                        <option value="1">Yes</option>
                                        <option value="0">No</option>
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
                                <input type="text" name="shipped_by" class="form-control">
                                @if (isset($errors) && $errors->has('shipped_by'))
                                    <label id="shipped_by-error" class="error" for="shipped_by">{{ $errors->first('shipped_by') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group align-items-center">
                                <label class="control-label mb-0">Checked by</label>
                                <input type="text" name="checked_by" class="form-control">
                                @if (isset($errors) && $errors->has('checked_by'))
                                    <label id="checked_by-error" class="error" for="checked_by">{{ $errors->first('checked_by') }}</label>
                                @endif
                            </div>
                        </div>
                        <div class="col-12 col-sm-6">
                            <div class="form-group align-items-center">
                                <label class=" control-label mb-0">Notes</label>
                                <textarea class="form-control" name="notes" rows="4"></textarea>
                                @if (isset($errors) && $errors->has('notes'))
                                    <label id="notes-error" class="error" for="notes">{{ $errors->first('notes') }}</label>
                                @endif
                            </div>
                        </div>
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
                        <div class="col-12 mt-4">
                            <input type="submit" class="btn btn-success" value="Save" name="submit">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
$(document).ready(function() {
    $('.date').datepicker({
        format: 'mm/dd/yyyy',
        autoclose: true
    });
});
</script>
<style type="text/css">
    .input-group-addon{
        position: absolute;
        top: 50%;
        right: 10px;
        transform: translate(0,-50%);
    }
    textarea{
        resize: none;
    }
</style>
@stop