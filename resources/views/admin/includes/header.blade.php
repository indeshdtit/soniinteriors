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
        <link href="{{ URL::asset('backend/css/pages-icons.css') }}" rel="stylesheet" type="text/css"/>
        <link href="{{ URL::asset('backend/css/themes/light.css') }}" rel="stylesheet" type="text/css"/>

        <script src="{{ URL::asset('backend/plugins/jquery/jquery-3.2.1.min.js') }}" type="text/javascript"></script>
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
            <nav class="page-sidebar" data-pages="sidebar">
                <div class="sidebar-header">
                    <img src="{{ URL::asset('backend/img/logo.png') }}" alt="logo" class="brand" width="78" height="22">
                </div>

                <div class="sidebar-menu">
                    <ul class="menu-items">
                        <li>
                            <a href="{{ route('admin_dashboard') }}">
                                <span class="title">Dashboard</span>
                            </a>
                            <span class="icon-thumbnail"><i class="fas fa-shield-alt"></i></span>
                        </li>
                        <li>
                            <a href="{{ route('admin_orders') }}">
                                <span class="title">List All</span>
                            </a>
                            <span class="icon-thumbnail"><i class="fas fa-list"></i></span>
                        </li>
                        <li>
                            <a href="{{ route('admin_add_order') }}">
                                <span class="title">Add New</span>
                            </a>
                            <span class="icon-thumbnail"><i class="fas fa-plus"></i></span>
                        </li>
                    </ul>
                    <div class="clearfix"></div>
                </div>
            </nav>

            <div class="page-container">
                <div class="header">
                    <a href="#" class="btn-link toggle-sidebar d-lg-none pg pg-menu" data-toggle="sidebar"></a>
                    <div class="">
                        <div class="brand inline">
                            <img src="{{ URL::asset('backend/img/logo.png') }}" alt="logo" width="78" height="22">
                        </div>
                    </div>

                    <div class="d-flex align-items-center">
                        <div class="dropdown pull-right d-lg-inline-block d-none">
                            <button class="profile-dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <span class="thumbnail-wrapper d32 circular inline">
                                    <img src="{{ URL::asset('backend/img/avatar.jpg') }}" alt="" data-src="{{ URL::asset('backend/img/avatar.jpg') }}" data-src-retina="{{ URL::asset('backend/img/avatar.jpg') }}" width="32" height="32">
                                </span>
                            </button>
                            <div class="dropdown-menu dropdown-menu-right profile-dropdown" role="menu">
                                <a href="javascript:void();" class="clearfix dropdown-item" style="cursor: default;">
                                    <span class="pull-left">{{ str_limit(Auth::user()->name, $limit = 10, $end = '.') }}</span>
                                    <span class="pull-right"><i class="fa fa-user"></i></span>
                                </a>
                                <a href="{{ route('admin_logout') }}" class="clearfix bg-master-lighter dropdown-item">
                                    <span class="pull-left">Logout</span>
                                    <span class="pull-right"><i class="pg-power"></i></span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="page-content-wrapper">
                    <div class="content sm-gutter">
        @endif