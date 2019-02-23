<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, shrink-to-fit=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <title><?php echo Config::get('app.name') . ' | Admin' . (isset($page_title) ? ' | ' . $page_title : ''); ?></title>
        <link rel="icon" type="image/x-icon" href="favicon.ico" />
        <link href="{{ URL::asset('backend/plugins/pace/pace-theme-flash.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('backend/plugins/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('backend/plugins/font-awesome/css/font-awesome.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous" rel="stylesheet">
        <link href="{{ URL::asset('backend/plugins/jquery-scrollbar/jquery.scrollbar.css') }}" rel="stylesheet" type="text/css" media="screen" />
        <link href="{{ URL::asset('backend/plugins/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
        <link href="{{ URL::asset('backend/plugins/switchery/css/switchery.min.css') }}" rel="stylesheet" type="text/css" media="screen" />
        <link href="{{ URL::asset('backend/plugins/jquery-datatable/media/css/dataTables.bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('backend/plugins/jquery-datatable/extensions/FixedColumns/css/dataTables.fixedColumns.min.css') }}" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('backend/plugins/datatables-responsive/css/datatables.responsive.css') }}" rel="stylesheet" type="text/css" />
        <link href="https://cdn.datatables.net/buttons/1.5.2/css/buttons.dataTables.min.css" rel="stylesheet" type="text/css" />
        <link href="{{ URL::asset('backend/css/pages-icons.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('backend/css/themes/light.css') }}" rel="stylesheet" type="text/css"/>

        <script src="{{ URL::asset('backend/plugins/jquery/jquery-3.3.1.js') }}" type="text/javascript"></script>
        <script type="text/javascript">
            var iBaseUrl = '<?php echo url(''); ?>';
            window.onload = function()
            {
                // fix for windows 8
                if (navigator.appVersion.indexOf("Windows NT 6.2") != -1)
                {
                    document.head.innerHTML += '<link rel="stylesheet" type="text/css" href="backend/css/windows.chrome.fix.css" />'
                }
            }
        </script>
    </head>
    <body class="fixed-header menu-pin">
        @if(Auth::check())
            <nav class="navbar navbar-expand-lg navbar-light bg-light fixed-top">
                <div class="container-fluid p-0">
                    <div class="row w-100 m-0 justify-content-between ">
                        <a class="navbar-brand" href="#"><img src="{{ URL::asset('backend/img/logo.png') }}" alt="logo" class="brand" width="78" height="22"></a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <div class="collapse navbar-collapse justify-content-end align-items-center" id="navbarNav">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" href="{{ route('admin_dashboard') }}">
                                        <span class="title">Dashboard</span> &nbsp;
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin_orders') }}">
                                        <span class="title">List All</span> &nbsp;
                                    </a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('admin_add_order') }}">
                                        <span class="title">Add New</span> &nbsp;
                                    </a>
                                </li>
                                <li class="nav-item">
                                   <a class="nav-link" href="{{ route('admin_logout') }}">
                                        <span class="title">Logout</span> &nbsp;
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                    
            </nav>

            <div class="page-container">
                <div class="header">
                    <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar"></a>
                    
                </div>

                <div class="page-content-wrapper">
                    <div class="content sm-gutter">
        @endif