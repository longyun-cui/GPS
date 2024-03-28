@extends(env('TEMPLATE_GPS_ADMIN').'layout.layout')


@section('head_title')
    @if(in_array(env('APP_ENV'),['local','dev'])){{ $local or 'L.' }}@endif
    {{ $title_text or 'GPS' }} - 导航系统
@endsection




@section('header','')
@section('description'){{ $title_text or 'GPS' }} - 导航系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">
    <div class="row">



        {{--Moban--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">Moban</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">

                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/moban3030/') }}">
                                moban3030 - 徒步旅行俱乐部网站模板
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/moban2889/') }}">
                                moban2889 - 宽屏响应式业务网站模板
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>




        {{--Jiaoben--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">Jiaoben</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">

                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben1967/') }}">
                                jiaoben1967 - CSS3悬停特效合集Hover.css
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben1597/') }}">
                                jiaoben1597 - jQuery动画标签折叠式菜单
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben2495/') }}">
                                jiaoben2495 - jQuery等高排列插件matchHeight
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben5873/') }}">
                                jiaoben5873 - WickedCSS3动画库演示特效
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben825/') }}">
                                jiaoben825 - jq+css3悬停效果 jquery+css3缩略图悬停效果
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben1087/') }}">
                                jiaoben1087 - css3标题悬停效果 css3标题悬停突出网页特效
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben4404/') }}">
                                jiaoben4404 - CSS3卡片鼠标悬停滑动代码
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben5150/') }}">
                                jiaoben5150 - 鼠标经过CSS3按钮动画特效
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben871/') }}">
                                jiaoben871 - css3 3D下拉菜单 css3 3D翻转下拉菜单
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/jiaoben4660/') }}">
                                jiaoben4660 - 鼠标滑过按钮展开CSS3动画特效
                            </a>
                        </li>


                    </ul>
                </div>
            </div>
        </div>


        {{--17sucai--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">17sucai</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">

                        <li class="">
                            <a target="_blank" href="{{ url('/template-library/17sucai-mouseRight/') }}">
                                17sucai - jQuery自定义鼠标右键菜单插件
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>




    </div>
</div>
@endsection