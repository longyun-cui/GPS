@extends(env('TEMPLATE_LY_GPS__ADMIN').'layout.layout')


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
<div class="full-container">


    <div class="row">



        {{--testing--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">testing</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing') }}">
                                Root <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{--PHP--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">PHP</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">

                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing/php') }}">
                                PHP <span class="pull-right"><b class="badge bg-aqua">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing/php/url') }}">
                                URL <span class="pull-right"><b class="badge bg-aqua">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing/php/++') }}">
                                ++ <span class="pull-right"><b class="badge bg-orange">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing/php/numbers') }}">
                                numbers <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing/php/headers') }}">
                                headers <span class="pull-right"><b class="badge bg-purple">5</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing/php/ip') }}">
                                ip <span class="pull-right"><b class="badge bg-maroon">6</b></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>


        {{--JS--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">JS</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="{{ url('/admin/testing/js') }}">
                                Root <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>
</div>
@endsection