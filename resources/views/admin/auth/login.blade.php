@extends('admin.layouts.layout')
@section('content')
<div class="login-wrapper ">
    <div class="bg-pic">
        <img src="{{ URL::asset('backend/img/login-bg.jpg') }}" data-src="{{ URL::asset('backend/img/login-bg.jpg') }}" data-src-retina="{{ URL::asset('backend/img/login-bg.jpg') }}" alt="" class="lazy">

        <div class="bg-caption pull-bottom sm-pull-bottom text-white p-l-20 m-b-20">
            <h2 class="semi-bold text-white">{{ Config::get('app.name') }}</h2>
            <p class="small">images Displayed are solely for representation purposes only, All work copyright of respective owner, otherwise © {{ date('Y') }}</p>
        </div>
    </div>

    <div class="login-container bg-white">
        <div class="p-l-50 m-l-20 p-r-50 m-r-20 p-t-50 m-t-30 sm-p-l-15 sm-p-r-15 sm-p-t-40">
            <img src="{{ URL::asset('backend/img/logo.png') }}" alt="logo" data-src="{{ URL::asset('backend/img/logo.png') }}" data-src-retina="{{ URL::asset('backend/img/logo.png') }}" width="78" height="22">
            <p class="p-t-35">Sign into your account</p>

            <form id="form-login" class="p-t-15" role="form" action="{{ route('admin_login') }}" method="POST">
                <div class="form-group form-group-default">
                    <label>Login</label>
                    <div class="controls">
                        <input type="text" name="email" placeholder="Email Address" class="form-control" required>
                        @csrf
                    </div>
                </div>

                <div class="form-group form-group-default">
                    <label>Password</label>
                    <div class="controls">
                        <input type="password" class="form-control" name="password" placeholder="Credentials" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 no-padding sm-p-l-10">
                        <div class="checkbox ">
                            <input type="checkbox" id="checkbox1" name="remember">
                            <label for="checkbox1">Keep Me Signed in</label>
                        </div>
                    </div>
                </div>
                <button class="btn btn-primary btn-cons m-t-10" type="submit">Sign in</button>
                @if (Session::has('message'))
                    <p class="alert alert-{{ Session::get('alert-class')}}">{{ Session::get('message') }}</p>
                @endif
            </form>
        </div>
    </div>
</div>
<script>
    $(document).ready(function() {
        $('#form-login').validate();
    })
</script>
@stop