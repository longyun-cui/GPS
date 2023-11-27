@extends(env('TEMPLATE_GPS_DEF').'layout.layout')


@section('head_title')
    @if(in_array(env('APP_ENV'),['local','dev'])){{ $local or 'L.' }}@endif
    {{ $title_text or 'Test-list' }} - 导航系统
@endsection




@section('header','')
@section('description'){{ $title_text or 'Test-list' }} - 导航系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PORTLET-->
        <div class="box box-default">

            <div class="box-header with-border">
                <h3 class="box-title"><b>Testing</b></h3>
            </div>

            <div class="box-body">
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing') }}">Root</a>
            </div>

            <div class="box-body">
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing/js') }}">JS</a>
            </div>

            <div class="box-body">
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing/php') }}">PHP</a>
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing/php/url') }}">URL</a>
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing/php/++') }}">++</a>
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing/php/numbers') }}">++</a>
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing/php/headers') }}">headers</a>
                <a target="_blank" class="margin- btn btn-sm btn-primary" href="{{ url('/testing/php/ip') }}">ip</a>
            </div>

            <div class="box-footer">
            </div>

        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endsection