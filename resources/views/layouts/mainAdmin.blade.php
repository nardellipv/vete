<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Limitless - Responsive Web Application Kit by Eugene Kopyov</title>

    <!-- Global stylesheets -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,300,100,500,700,900" rel="stylesheet"
          type="text/css">
    <link href="{{ asset('styleAdmin/assets/css/icons/icomoon/styles.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('styleAdmin/assets/css/bootstrap.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('styleAdmin/assets/css/core.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('styleAdmin/assets/css/components.css') }}" rel="stylesheet" type="text/css">
    <link href="{{ asset('styleAdmin/assets/css/colors.css') }}" rel="stylesheet" type="text/css">


    <!-- /global stylesheets -->

    <!-- Core JS files -->
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/plugins/loaders/pace.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/core/libraries/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/core/libraries/bootstrap.min.js') }}"></script>
    <!-- /core JS files -->

    {{--tostr--}}
    <link rel="stylesheet" href="http://cdn.bootcss.com/toastr.js/latest/css/toastr.min.css">
    <script src="http://cdn.bootcss.com/jquery/2.2.4/jquery.min.js"></script>
    <script src="http://cdn.bootcss.com/toastr.js/latest/js/toastr.min.js"></script>

    <!-- Theme JS files -->
    @yield('css')

    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/tables/datatables/datatables.min.js') }}"></script>
    <script type="text/javascript"
            src="{{ asset('styleAdmin/assets/js/plugins/forms/selects/select2.min.js')}}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/datatables_basic.js') }}"></script>

    @yield('script')

    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/core/app.js') }}"></script>
    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/pages/dashboard.js') }}"></script>

    <script type="text/javascript" src="{{ asset('styleAdmin/assets/js/plugins/ui/ripple.min.js') }}"></script>
    <!-- /theme JS files -->

</head>

<body>

<!-- Main navbar -->
@include('panel.parts._nav')
<!-- /main navbar -->

{!! Toastr::message() !!}

<!-- Page container -->
<div class="page-container">

    <!-- Page content -->
    <div class="page-content">

        <!-- Main sidebar -->
    @include('panel.parts._menu')
    <!-- /main sidebar -->


        <!-- Main content -->
        <div class="content-wrapper">

            <!-- Page header -->
            <div class="page-header page-header-default">
                <div class="breadcrumb-line">
                    <ul class="breadcrumb">
                        <li><a href="index.html"><i class="icon-home2 position-left"></i> Home</a></li>
                        <li class="active">Dashboard</li>
                    </ul>

                    <ul class="breadcrumb-elements">
                        <li><a href="#"><i class="icon-comment-discussion position-left"></i> Support</a></li>
                        <li class="dropdown">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                                <i class="icon-gear position-left"></i>
                                Settings
                                <span class="caret"></span>
                            </a>

                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#"><i class="icon-user-lock"></i> Account security</a></li>
                                <li><a href="#"><i class="icon-statistics"></i> Analytics</a></li>
                                <li><a href="#"><i class="icon-accessibility"></i> Accessibility</a></li>
                                <li class="divider"></li>
                                <li><a href="#"><i class="icon-gear"></i> All settings</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /page header -->


            <!-- Content area -->
            <div class="content">

            @yield('content')


            <!-- Footer -->
                <div class="footer text-muted">
                    &copy; 2015. <a href="#">Limitless Web App Kit</a> by <a href="http://themeforest.net/user/Kopyov"
                                                                             target="_blank">Eugene Kopyov</a>
                </div>
                <!-- /footer -->

            </div>
            <!-- /content area -->

        </div>
        <!-- /main content -->

    </div>
    <!-- /page content -->

</div>
<!-- /page container -->

</body>
</html>