@extends('admin.layouts.layout')
@section('content')
<link href="{{ URL::asset('backend/plugins/bootstrap-datepicker/css/datepicker3.css') }}" rel="stylesheet" type="text/css" />
<script src="{{ URL::asset('backend/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js') }}" type="text/javascript"></script>

<div data-pages="parallax">
    <div class="container-fluid pull-left p-l-25 p-r-25 sm-p-l-0 sm-p-r-0">
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
<div class="container-fluid content-body-page container-fixed-lg bg-white pull-left" 
    data-notif-msg="{{ Session::has('message') ? Session::get('message') : '' }}" 
    data-notif-cls="{{ Session::has('alert-class') ? Session::get('alert-class') : '' }}">
    <div class="row">
        <div class="col-8">
            <div class="row">
                <div class="card card-transparent">
                    <div class="card-body px-0">
                        <form action="{{ route('admin_add_order') }}" method="POST">
                            @csrf
                            <div class="form-group row align-items-center">
                                <label class="col-md-4 control-label mb-0">Customer Name</label>
                                <div class="col-md-8">
                                    <input type="text" name="customer_name" class="form-control" required="">
                                    @if (isset($errors) && $errors->has('status'))
                                        <label id="status-error" class="error" for="status">{{ $errors->first('status') }}</label>
                                    @endif
                                </div>
                            </div>
                            
                            <div class="form-group row align-items-center">
                                <label for="date_written" class="col-md-4 control-label mb-0">Date Written</label>
                                <div class="col-md-8">
                                    <div id="datepicker_date_written" class="input-group date">
                                        <input class="form-control" id="date_written" name="date_written" required="" type="text" value="{{ old('date_written') }}" readonly="">
                                        <span class="input-group-addon"><i class="fa fa-calendar"></i>
                                        </span>
                                    </div>
                                    @if (isset($errors) && $errors->has('date_written'))
                                        <label id="date_written-error" class="error" for="date_written">{{ $errors->first('date_written') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="col-md-4 control-label mb-0">Origination</label>
                                <div class="col-md-8">
                                    <div class="radio radio-success my-0">
                                        <select class="full-width" data-init-plugin="select2" name="origination_id">
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

                            <div class="form-group row align-items-center">
                                <label for="date_picked_up" class="col-md-4 control-label mb-0">Date Picked up</label>
                                <div class="col-md-8">
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

                            <div class="form-group row align-items-center">
                                <label for="date_picked_up" class="col-md-4 control-label mb-0">Order Picked Up At</label>
                                <div class="col-md-8">
                                    <div class="radio radio-success my-0">
                                        <select class="full-width" data-init-plugin="select2" name="order_picked_up_at">
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

                            <div class="form-group row align-items-center">
                                <label class="col-md-4 control-label mb-0">Is Partial Order</label>
                                <div class="col-md-8">
                                    <div class="radio radio-success my-0">
                                        <select class="full-width" data-init-plugin="select2" name="is_partial_order" required="">
                                            <option value="1">Yes</option>
                                            <option value="0">No</option>
                                        </select>
                                    </div>
                                    @if (isset($errors) && $errors->has('is_partial_order'))
                                        <label id="is_partial_order-error" class="error" for="is_partial_order">{{ $errors->first('is_partial_order') }}</label>
                                    @endif
                                </div>
                            </div>

                            <div class="form-group row align-items-center">
                                <label class="col-md-4 control-label mb-0">Status</label>
                                <div class="col-md-8">
                                    <div class="radio radio-success my-0">
                                        <select class="full-width" data-init-plugin="select2" name="status" required="">
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
                            <br>
                            <div class="row">
                                <div class="col-md-12">
                                    <input type="submit" class="btn btn-success" value="Save" name="submit">
                                </div>
                            </div>
                        </form>
                    </div>
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
</style>
@stop