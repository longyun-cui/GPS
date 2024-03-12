@extends(env('TEMPLATE_GPS_ADMIN').'layout.layout')


@section('head_title')
    {{ $title_text or 'GPS/Admin' }}
@endsection




@section('header','')
@section('description'){{ $title_text or '首页' }} - GPS系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">



    {{--导航 Tools--}}
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div id="test2" class="demo-tree">
                <div class="layui-tree layui-tree-line" lay-filter="LAY-tree-4">

                    <div data-id="1" class="layui-tree-set layui-tree-setHide layui-tree-spread">
                        <div class="layui-tree-entry">
                            <div class="layui-tree-main">
                                <span class="layui-tree-iconClick layui-tree-icon"><i class="layui-icon layui-icon-subtraction"></i></span>
                                <span class="layui-tree-txt">江西</span>
                            </div>
                        </div>
                        <div class="layui-tree-pack layui-tree-lineExtend layui-tree-showLine" style="display: block;">
                            <div data-id="1000" class="layui-tree-set">
                                <div class="layui-tree-entry">
                                    <div class="layui-tree-main">
                                        <span class="layui-tree-iconClick layui-tree-icon"><i class="layui-icon layui-icon-addition"></i></span><span class="layui-tree-txt">南昌</span>
                                    </div>
                                </div>
                                <div class="layui-tree-pack layui-tree-lineExtend layui-tree-showLine" style="display: none;">
                                    <div data-id="10001" class="layui-tree-set">
                                        <div class="layui-tree-entry">
                                            <div class="layui-tree-main">
                                                <span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                                <span class="layui-tree-txt">青山湖区</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div data-id="10002" class="layui-tree-set layui-tree-setLineShort">
                                        <div class="layui-tree-entry">
                                            <div class="layui-tree-main">
                                                <span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                                <span class="layui-tree-txt">高新区</span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div data-id="1001" class="layui-tree-set">
                                <div class="layui-tree-entry">
                                    <div class="layui-tree-main">
                                        <span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                        <span class="layui-tree-txt">九江</span>
                                    </div>
                                </div>
                            </div>
                            <div data-id="1002" class="layui-tree-set">
                                <div class="layui-tree-entry">
                                    <div class="layui-tree-main">
                                        <span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                        <span class="layui-tree-txt">赣州</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-id="2" class="layui-tree-set layui-tree-setHide">
                        <div class="layui-tree-entry">
                            <div class="layui-tree-main">
                                <span class="layui-tree-iconClick layui-tree-icon"><i class="layui-icon layui-icon-addition"></i></span>
                                <span class="layui-tree-txt">广西</span>
                            </div>
                        </div>
                        <div class="layui-tree-pack layui-tree-lineExtend layui-tree-showLine">
                            <div data-id="2000" class="layui-tree-set">
                                <div class="layui-tree-entry">
                                    <div class="layui-tree-main">
                                        <span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                        <span class="layui-tree-txt">南宁</span>
                                    </div>
                                </div>
                            </div>
                            <div data-id="2001" class="layui-tree-set">
                                <div class="layui-tree-entry"><div class="layui-tree-main"><span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                        <span class="layui-tree-txt">桂林</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div data-id="3" class="layui-tree-set layui-tree-setHide layui-tree-setLineShort">
                        <div class="layui-tree-entry">
                            <div class="layui-tree-main">
                                <span class="layui-tree-iconClick layui-tree-icon"><i class="layui-icon layui-icon-addition"></i></span>
                                <span class="layui-tree-txt">陕西</span>
                            </div>
                        </div>
                        <div class="layui-tree-pack layui-tree-lineExtend"><div data-id="3000" class="layui-tree-set">
                                <div class="layui-tree-entry">
                                    <div class="layui-tree-main">
                                        <span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                        <span class="layui-tree-txt">西安</span>
                                    </div>
                                </div>
                            </div>
                            <div data-id="3001" class="layui-tree-set layui-tree-setLineShort">
                                <div class="layui-tree-entry">
                                    <div class="layui-tree-main">
                                        <span class="layui-tree-iconClick"><i class="layui-icon layui-icon-file"></i></span>
                                        <span class="layui-tree-txt">延安</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>

    </div>





</div>
@endsection


@section('js')
<script>
    $(function() {
    });
</script>
@endsection
