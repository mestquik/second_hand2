<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Skydash Admin</title>
    <!-- plugins:css -->

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css">



    <link rel="stylesheet" href="{{asset('backend/css/')}}/bootstrap-toggle.min.css">
    <link rel="stylesheet" href="{{asset('backend/css/')}}/alertify.min.css">



    <link rel="stylesheet" href="{{asset('backend//vendors')}}/feather/feather.css">
    <link rel="stylesheet" href="{{asset('backend//vendors')}}/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" href="{{asset('backend/vendors/css/')}}/vendor.bundle.base.css">
    <link rel="stylesheet" href="{{asset('backend/vendors/js/')}}/vendor.bundle.base.js">
    <!-- endinject -->
    <!-- Plugin css for this page -->
    <link rel="stylesheet" href="{{asset('backend/vendors/')}}/datatables.net-bs4/dataTables.bootstrap4.css">
    <link rel="stylesheet" href="{{asset('/backend/')}}/vendors/ti-icons/css/themify-icons.css">
    <link rel="stylesheet" type="{{asset('backend/')}}/text/css" href="{{asset('backend/')}}/css/select.dataTables.min.css">
    <!-- End plugin css for this page -->
    <!-- inject:css -->
    <link rel="stylesheet" href="{{asset('backend/')}}/css/vertical-layout-light/style.css">
    <!-- endinject -->
{{--    <link rel="shortcut icon" href="{{asset('/img/logos').'/'.$sitelogo->image}}" />--}}
</head>
<body>
@include('backend.inc.header')
<div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <!-- partial -->
    <div class="container-fluid page-body-wrapper">
        <!-- partial:partials/_settings-panel.html -->
        <div class="theme-setting-wrapper">
            <div id="settings-trigger"><i class="ti-settings"></i></div>
            <div id="theme-settings" class="settings-panel">
                <i class="settings-close ti-close"></i>
                <p class="settings-heading">SIDEBAR SKINS</p>
                <div class="sidebar-bg-options selected" id="sidebar-light-theme"><div class="img-ss rounded-circle bg-light border mr-3"></div>Light</div>
                <div class="sidebar-bg-options" id="sidebar-dark-theme"><div class="img-ss rounded-circle bg-dark border mr-3"></div>Dark</div>
                <p class="settings-heading mt-2">HEADER SKINS</p>
                <div class="color-tiles mx-0 px-4">
                    <div class="tiles success"></div>
                    <div class="tiles warning"></div>
                    <div class="tiles danger"></div>
                    <div class="tiles info"></div>
                    <div class="tiles dark"></div>
                    <div class="tiles default"></div>
                </div>
            </div>
        </div>

        <!-- partial -->

        @include('backend.inc.sidebar')
        <!-- partial -->


        <div class="main-panel">


            <div class="content-wrapper">
            @yield('content')
            </div>
            <!-- content-wrapper ends -->

            @include('backend.inc.footer')
            <!-- partial -->
        </div>
        <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->

<script src="{{asset('backend/')}}/js/jquery_3.7.0_jquery.min.js"></script>
<script src="{{asset('backend/')}}/js/alertify.min.js"></script>

<meta name="csrf-token" content="{{ csrf_token() }}">


<script src="{{asset('backend/')}}/vendors/js/vendor.bundle.base.js"></script>


<script src="{{asset('/backend/js/bootstrap-toggle.min.js')}}"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<script src="{{asset('backend/')}}/vendors/chart.js/Chart.min.js"></script>
<script src="{{asset('backend/')}}/vendors/datatables.net/jquery.dataTables.js"></script>
<script src="{{asset('/backend/')}}/vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="{{asset('/backend/js')}}/dataTables.select.min.js"></script>


<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="{{asset('backend/js/off-canvas.js')}}"></script>
<script src="{{asset('backend/js/hoverable-collapse.js')}}"></script>
<script src="{{asset('backend/js/template.js')}}"></script>
<script src="{{asset('backend/js/settings.js')}}"></script>
<script src="{{asset('backend/js/todolist.js')}}"></script>
<!-- endinject -->
<!-- Custom js for this page-->

<script src="{{asset('backend/js/dashboard.js')}}"></script>
<script src="{{asset('backend/js/file-upload.js')}}"></script>
<script src="{{asset('backend/js/Chart.roundedBarCharts.js')}}"></script>
<!-- End custom js for this page-->
@yield('customjs')
</body>

</html>

