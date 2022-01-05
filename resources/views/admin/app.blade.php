<!DOCTYPE html>
<html>
<head>
    <title>Superior Sulbar</title>
    <meta charset="utf-8" />
    <meta content="ie=edge" http-equiv="x-ua-compatible" />
    <meta content="template language" name="keywords" />
    <meta content="Tamerlan Soziev" name="author" />
    <meta content="Admin dashboard html template" name="description" />
    <meta content="width=device-width, initial-scale=1" name="viewport" />
    <link href="favicon.png" rel="shortcut icon" />
    <link href="apple-touch-icon.png" rel="apple-touch-icon" />
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css" />
    <link href="{{asset('assets')}}/bower_components/select2/dist/css/select2.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/dropzone/dist/dropzone.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/bower_components/slick-carousel/slick/slick.css" rel="stylesheet" />
    <link href="{{asset('assets')}}/css/main.css?version=4.4.0" rel="stylesheet" />
</head>
@stack('add-style')
<style>
    .content-box {
        min-height: 900px;
    }
</style>
<body class="menu-position-side menu-side-left full-screen with-content-panel">
<div class="all-wrapper with-side-panel solid-bg-all">
    @if (false)
    @include('admin.components.onboarding_modal')
    @include('admin.components.search_suggestion')
    @endif
    <div class="layout-w">
        <!--------------------
        START - Mobile Menu
        -------------------->
        @include('admin.components.mobile_menu')
        <!--------------------
        END - Mobile Menu
        --------------------><!--------------------
        START - Main Menu
        -------------------->
        @include('admin.components.main_menu')
        <!--------------------
        END - Main Menu
        -------------------->
        <div class="content-w">
            <!--------------------
            START - Top Bar
            -------------------->
            @include('admin.components.top_bar')
            <!--------------------
            END - Top Bar
            --------------------><!--------------------
          START - Breadcrumbs
          -------------------->
            @include('admin.components.breadcrumbs')
            <!--------------------
            END - Breadcrumbs
            -------------------->
            <div class="content-panel-toggler">
                <i class="os-icon os-icon-grid-squares-22"></i><span>Sidebar</span>
            </div>
            <div class="content-i">
                <div class="content-box">
                    @yield('content')
                    @include('admin.components.float_bottom')
                </div>
                <!--------------------
                START - Sidebar
                -------------------->
                @if (false)
                @include('admin.components.sidebar')
                @endif
                <!--------------------
                END - Sidebar
                -------------------->
            </div>
        </div>
    </div>
    <div class="display-type"></div>
</div>
<script src="{{asset('assets')}}/bower_components/jquery/dist/jquery.min.js"></script>
<script src="{{asset('assets')}}/bower_components/popper.js/dist/umd/popper.min.js"></script>
<script src="{{asset('assets')}}/bower_components/moment/moment.js"></script>
<script src="{{asset('assets')}}/bower_components/chart.js/dist/Chart.min.js"></script>
<script src="{{asset('assets')}}/bower_components/select2/dist/js/select2.full.min.js"></script>
<script src="{{asset('assets')}}/bower_components/jquery-bar-rating/dist/jquery.barrating.min.js"></script>
<script src="{{asset('assets')}}/bower_components/ckeditor/ckeditor.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap-validator/dist/validator.min.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
<script src="{{asset('assets')}}/bower_components/ion.rangeSlider/js/ion.rangeSlider.min.js"></script>
<script src="{{asset('assets')}}/bower_components/dropzone/dist/dropzone.js"></script>
<script src="{{asset('assets')}}/bower_components/editable-table/mindmup-editabletable.js"></script>
<script src="{{asset('assets')}}/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
<script src="{{asset('assets')}}/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
<script src="{{asset('assets')}}/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
<script src="{{asset('assets')}}/bower_components/perfect-scrollbar/js/perfect-scrollbar.jquery.min.js"></script>
<script src="{{asset('assets')}}/bower_components/tether/dist/js/tether.min.js"></script>
<script src="{{asset('assets')}}/bower_components/slick-carousel/slick/slick.min.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/util.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/alert.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/button.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/carousel.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/collapse.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/dropdown.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/modal.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/tab.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/tooltip.js"></script>
<script src="{{asset('assets')}}/bower_components/bootstrap/js/dist/popover.js"></script>
<script src="{{asset('assets')}}/js/demo_customizer.js?version=4.4.0"></script>
<script src="{{asset('assets')}}/js/main.js?version=4.4.0"></script>
<script>

</script>
@stack('add-script')
</body>
</html>
