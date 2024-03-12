<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <link rel="shortcut icon" type="image/ico" href="{{ env('FAVICON_GPS') }}">
    <link rel="shortcut icon" type="image/png" href="{{ env('FAVICON_GPS') }}">
    <link rel="icon" sizes="16x16 32x32 64x64" href="{{ env('FAVICON_GPS') }}">
    <link rel="icon" type="image/png" sizes="196x196" href="{{ env('FAVICON_GPS') }}">

    <title>@yield('head_title')</title>
    <meta name="_token" content="{{ csrf_token() }}"/>

    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">

    <!-- Bootstrap 3.3.6 -->
    {{--<link rel="stylesheet" href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css">--}}
    {{--<link rel="stylesheet" href="/AdminLTE/bootstrap/css/bootstrap.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/AdminLTE/bootstrap/css/bootstrap.min.css') }}">

    <!-- Font Awesome -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.min.css">--}}
    {{--<link href="https://cdn.bootcss.com/font-awesome/4.5.0/css/font-awesome.min.css" rel="stylesheet">--}}
    <link rel="stylesheet" href="{{ asset('/resource/component/css/font-awesome-4.5.0.min.css') }}">

    <!-- Ionicons -->
    {{--<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.min.css">--}}
    {{--<link rel="stylesheet" href="https://cdn.bootcss.com/ionicons/2.0.1/css/ionicons.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/resource/component/css/ionicons-2.0.1.min.css') }}">

    <!-- Theme style -->
    {{--<link rel="stylesheet" href="/AdminLTE/dist/css/AdminLTE.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/AdminLTE.min.css') }}">
    {{--<link href="https://cdn.bootcss.com/admin-lte/2.3.11/css/AdminLTE.min.css" rel="stylesheet">--}}
    <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
          page. However, you can choose any other skin. Make sure you
          apply the skin class to the body tag so the changes take effect.
    -->
    {{--<link rel="stylesheet" href="/AdminLTE/dist/css/skins/skin-blue.min.css">--}}
    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/_all-skins.min.css') }}">
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-black.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-black-light.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-red.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-red-light.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-yellow.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-yellow-light.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-blue.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-blue-light.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-green.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-green-light.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-purple.min.css') }}">--}}
{{--    <link rel="stylesheet" href="{{ asset('/AdminLTE/dist/css/skins/skin-purple-light.min.css') }}">--}}

    {{--<link rel="stylesheet" href="/AdminLTE/plugins/iCheck/all.css">--}}
    <link rel="stylesheet" href="{{ asset('/AdminLTE/plugins/iCheck/all.css') }}">
    {{--<link rel="stylesheet" href="{{ asset('/resource/component/css/iCheck-1.0.2-skins-all.css') }}">--}}


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    {{--<!--[if lt IE 9]>--}}
    {{--<script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>--}}
    {{--<script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>--}}
    {{--<![endif]-->--}}


    {{--<link href="https://cdn.bootcss.com/bootstrap-modal/2.2.6/css/bootstrap-modal.min.css" rel="stylesheet">--}}


    <link rel="stylesheet" href="{{ asset('/AdminLTE/plugins/datatables/dataTables.bootstrap.css') }}">
    <link rel="stylesheet" href="{{ asset('/resource/component/css/jquery.dataTables-1.13.1.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resource/component/css/fixedColumns.dataTables.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/resource/component/css/fileinput-4.4.8.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resource/component/css/fileinput-only.css') }}">

    <link rel="stylesheet" href="{{ asset('/resource/component/css/bootstrap-datetimepicker-4.17.47.min.css') }}">
    <link rel="stylesheet" href="{{ asset('/resource/component/css/bootstrap-datepicker-1.9.0.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/resource/component/css/bootstrap-switch-3.3.4.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/resource/component/css/swiper-4.2.2.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/resource/component/css/lightcase-2.5.0.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/resource/component/css/select2-4.0.5.min.css') }}">

    <link rel="stylesheet" href="{{ asset('/resource/component/plugins/layui-v2.6.8/css/layui.css') }}">


    <!-- Morris chart -->
    <link rel="stylesheet" href="/AdminLTE/plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="/AdminLTE/plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="/AdminLTE/plugins/daterangepicker/daterangepicker.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">


    <link rel="stylesheet" href="{{ asset('/resource/common/css/common.css') }}" media="all" />
    <link rel="stylesheet" href="{{ asset('/resource/common/css/AdminLTE/index.css') }}">

    {{--layout-style--}}
    @include(env('TEMPLATE_GPS_ADMIN').'layout.layout-style')

    @yield('css')
    @yield('style')
    @yield('custom-css')
    @yield('custom-style')

</head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition- skin-black sidebar-mini sidebar-collapse- layout-top-nav- fixed">
<div class="wrapper">


    {{--main-header--}}
    @include(env('TEMPLATE_GPS_ADMIN').'layout.main-header')

    {{--main-sidebar--}}
    @include(env('TEMPLATE_GPS_ADMIN').'layout.main-sidebar')

    {{--main-content--}}
    @include(env('TEMPLATE_GPS_ADMIN').'layout.main-content')

    {{--main-footer--}}
    @include(env('TEMPLATE_GPS_ADMIN').'layout.main-footer')

    {{--control-sidebar--}}
    @include(env('TEMPLATE_GPS_ADMIN').'layout.control-sidebar')


</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

{{--<!-- jQuery 2.2.3 -->--}}
{{--<script src="/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js"></script>--}}
<script src="{{ asset('/AdminLTE/plugins/jQuery/jquery-2.2.3.min.js') }}"></script>


{{--<!-- jQuery UI 1.11.4 -->--}}
{{--<script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>--}}
<script src="{{ asset('/resource/component/js/jquery-ui-1.12.1.min.js') }}"></script>


<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
{{--<script>--}}
{{--    $.widget.bridge('uibutton', $.ui.button);--}}
{{--</script>--}}


<!-- Bootstrap 3.3.6 -->
{{--<script src="/AdminLTE/bootstrap/js/bootstrap.min.js"></script>--}}
<script src="{{ asset('/AdminLTE/bootstrap/js/bootstrap.min.js') }}"></script>

{{--<script src="{{ asset('/AdminLTE/plugins/datatables/jquery.dataTables.min.js') }}"></script>--}}
{{--<script src="{{ asset('/AdminLTE/plugins/datatables/dataTables.bootstrap.min.js') }}"></script>--}}
<script src="{{ asset('/resource/component/js/jquery.dataTables-1.13.1.min.js') }}"></script>
<script src="{{ asset('/resource/component/js/dataTables.fixedColumns.min.js') }}"></script>

{{--<script src="https://cdn.bootcss.com/bootstrap-modal/2.2.6/js/bootstrap-mosdal.min.js"></script>--}}

<!-- Morris.js charts -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="/AdminLTE/plugins/morris/morris.min.js"></script>
<!-- Sparkline -->
<script src="/AdminLTE/plugins/sparkline/jquery.sparkline.min.js"></script>
<!-- jvectormap -->
<script src="/AdminLTE/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
<script src="/AdminLTE/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
<!-- jQuery Knob Chart -->
<script src="/AdminLTE/plugins/knob/jquery.knob.js"></script>
<!-- daterangepicker -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.11.2/moment.min.js"></script>
<script src="/AdminLTE/plugins/daterangepicker/daterangepicker.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="/AdminLTE/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
<!-- Slimscroll -->
<script src="/AdminLTE/plugins/slimScroll/jquery.slimscroll.min.js"></script>

{{--<script src="{{ asset('/resource/component/js/icheck-1.0.2.min.js') }}"></script>--}}
{{--<script src="/AdminLTE/plugins/iCheck/icheck.min.js"></script>--}}
<script src="{{ asset('/AdminLTE/plugins/iCheck/icheck.min.js') }}"></script>


<script src="{{ asset('/resource/component/js/fileinput-4.4.8.min.js') }}"></script>
<script src="{{ asset('/resource/component/js/fileinput-only-1.js') }}"></script>

<script src="{{ asset('/resource/component/js/jquery.form-4.2.2.min.js') }}"></script>

<script src="{{ asset('/resource/component/js/moment-2.19.0.min.js') }}"></script>
<script src="{{ asset('/resource/component/js/moment-2.19.0-locale-zh-cn.js') }}"></script>
<script src="{{ asset('/resource/component/js/moment-2.19.0-locale-ko.js') }}"></script>

{{--<script src="https://cdn.bootcss.com/bootstrap-datetimepicker/4.17.47/js/bootstrap-datetimepicker.min.js"></script>--}}
{{--<script src="https://cdn.bootcdn.net/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>--}}
<script src="{{ asset('/resource/component/js/bootstrap-datetimepicker-4.17.47.min.js') }}"></script>
{{--<script src="{{ asset('/resource/component/js/bootstrap-datetimepicker.zh-CN.js') }}" charset="UTF-8"></script>--}}
<script src="{{ asset('/resource/component/js/bootstrap-datepicker-1.9.0.min.js') }}"></script>
<script src="{{ asset('/resource/component/js/bootstrap-datepicker-1.9.0.zh-CN.min.js') }}"></script>

<script src="{{ asset('/resource/component/js/bootstrap-switch-3.3.4.min.js') }}"></script>

<script src="{{ asset('/resource/component/js/lightcase-2.5.0.min.js') }}"></script>

<script src="{{ asset('/resource/component/js/swiper-4.2.2.min.js') }}"></script>

<script src="{{ asset('/resource/component/js/select2-4.0.5.min.js') }}"></script>

<script src="{{ asset('/resource/component/js/echarts-5.4.1.min.js') }}"></script>

<script src="{{ asset('/resource/component/js/layer-3.5.1/layer.js') }}"></script>
<script src="{{ asset('/resource/component/plugins/layui-v2.6.8/layui.js') }}"></script>


{{--<!-- AdminLTE App -->--}}
{{--<script src="/AdminLTE/dist/js/app.min.js"></script>--}}
<script src="{{ asset('/AdminLTE/dist/js/app.min.js') }}"></script>

<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
{{--<script src="/AdminLTE/dist/js/pages/dashboard.js"></script>--}}
{{--<script src="/AdminLTE/dist/js/pages/dashboard2.js"></script>--}}
{{--<script src="{{ asset('/resource/component/js/pages/dashboard.js') }}"></script>--}}
{{--<script src="{{ asset('/resource/component/js/pages/dashboard2.js') }s}"></scripst>--}}

<!-- AdminLTE for demo purposes -->
<script src="/AdminLTE/dist/js/demo.js"></script>


@yield('js')
@yield('script')
@yield('custom-js')
@yield('custom-script')


{{--layout-script--}}
@include(env('TEMPLATE_GPS_ADMIN').'layout.layout-script')


</body>
</html>
