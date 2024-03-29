@extends(env('TEMPLATE_GH_WEB_ADMIN').'layout.layout')


@section('head_title')
    {{--@if(in_array(env('APP_ENV'),['local']))L.@endif--}}
    {{ $head_title or '首页' }} - 管理员系统 - {{ config('info.info.short_name') }}
@endsection




@section('header','Admin')
@section('description')管理员系统 - {{ config('info.info.short_name') }}@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-dashboard"></i>首页</a></li>
    <li><a href="#"><i class="fa "></i>Here</a></li>
@endsection
@section('content')
{{--订单统计--}}
<div class="row">
    <div class="col-md-12">
        <div class="callout callout-success- bg-white">

            <h4>工单统计</h4>

            <div class="callout-body">
                <span>总计 <text class="text-black font-24px">{{ $order_count_for_all or '' }}</text> 单</span>
                <span>导入 <text class="text-black font-24px">{{ $query_order_count_for_export or '' }}</text> 单</span>
                <span>待发布 <text class="text-teal font-24px">{{ $order_count_for_unpublished or '' }}</text> 单</span>
                <span>已发布 <text class="text-green font-24px">{{ $order_count_for_published or '' }}</text> 单</span>
                <span>待审核 <text class="text-aqua font-24px">{{ $order_count_for_waiting_for_inspect or '' }}</text> 单</span>
                <span>已审核 <text class="text-blue font-24px">{{ $order_count_for_inspected or '' }}</text> 单</span>
                <span>通过 <text class="text-green font-24px">{{ $order_count_for_accepted or '' }}</text> 单</span>
                <span>拒绝 <text class="text-red font-24px">{{ $order_count_for_refused or '' }}</text> 单</span>
                <span>重复 <text class="text-orange font-24px">{{ $order_count_for_repeat or '' }}</text> 单 </span>
                <span>内部通过 <text class="text-green font-24px">{{ $order_count_for_accepted_inside or '' }}</text> 单</span>
            </div>

            <div class="box box-info margin-top-32px">

                {{--<div class="box-header">--}}
                {{--</div>--}}

                <div class="box-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div id="eChart-order-statistics" style="width:100%;height:320px;"></div>
                        </div>
                    </div>
                </div>

                {{--<div class="box-footer">--}}
                {{--</div>--}}

            </div>

        </div>
    </div>
</div>
@endsection




@section('custom-style')
<style>
    .main-content .callout .callout-body span { margin-right:12px; }
</style>
@endsection



@section('custom-js')
    <script src="{{ asset('/resource/component/js/echarts-5.4.1.min.js') }}"></script>
@endsection
@section('custom-script')
<script>
    $(function() {


    });
</script>
@endsection