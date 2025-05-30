@extends(env('TEMPLATE_LY_GPS__NAV').'layout.layout')


@section('head_title')
    {{ $title_text or 'Navigation' }}
@endsection




@section('header')@endsection
@section('description'){{ $title_text or '首页' }} - GPS系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">


    {{--待办事--}}
    <div class="row">

        {{--年龄--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">时间</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a href="javascript:void(0);">
                                <i class="fa fa-user text-red margin-right-4px"></i>
                                <span>第{{ $me->diff['total'] + 1 }}天</span>
                                <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="javascript:void(0);">
                                <i class="fa fa-clock-o text-red margin-right-4px"></i>
                                <span>{{ $me->diff['year'] }}岁·{{ $me->diff['month'] }}个月·{{ $me->diff['day'] }}天</span>
                                <span class="pull-right"><b class="badge bg-aqua">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calendar text-green margin-right-4px"></i>
                                <span>{{ "今年·第".intval(date('W'))."周·星期".(date('N')) }}</span>
                                <span class="pull-right"><b class="badge bg-blue">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calendar-check-o text-green margin-right-4px"></i>
                                <span>{{ "今年·第".(date('z') + 1)."天" }}</span>
                                <span class="pull-right"><b class="badge bg-orange">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a href="javascript:void(0);">
                                <i class="fa fa-calendar-minus-o text-red margin-right-4px"></i>
                                <span>{{ "今年·还剩".($me->diff['this_year_day'] - date('z')) }}天</span>
                                <span class="pull-right"><b class="badge bg-red">5</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{--阿里云--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">服务器</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="https://ecs.console.aliyun.com/#/server/i-bp10lxdukyo9gnku1t5a/detail?regionId=cn-hangzhou">
                                【ECS】Hangzhou <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://ecs.console.aliyun.com/#/server/i-j6cgq48vcu8aj97enzhz/detail?regionId=cn-hongkong">
                                【ECS】HK <span class="pull-right"><b class="badge bg-aqua">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://116.62.214.223/public/ppma/index.php">
                                【phpMyAdmin】Hangzhou <span class="pull-right"><b class="badge bg-orange">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://47.52.149.252/phpMyAdmin/">
                                【phpMyAdmin】HK <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://dc.console.aliyun.com/#/domain-list/all">
                                【域名Domain】 <span class="pull-right"><b class="badge bg-purple">5</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://dysms.console.aliyun.com/overview">
                                【短信dysms】 <span class="pull-right"><b class="badge bg-maroon">6</b></span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
        </div>

        {{--阿里云--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">tools</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="https://beian.aliyun.com/order/index.htm">
                                阿里备案 <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://netcn.console.aliyun.com/core/domain/list">
                                阿里域名 <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://dysms.console.aliyun.com/overview">
                                阿里短信 <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://market.aliyun.com/developer">
                                阿里云·开发者工 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://qiye.aliyun.com/">
                                阿里企业邮箱 <span class="pull-right"><b class="badge bg-purple">5</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://mail.163.com/">
                                网易邮箱 <span class="pull-right"><b class="badge bg-maroon">6</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        {{--微信开发--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">微信开发</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="https://open.weixin.qq.com/">
                                微信·开放平台 <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://mp.weixin.qq.com/">
                                微信·公众平台 <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://mp.weixin.qq.com/wiki?t=resource/res_main">
                                微信·公众号·开发文档 <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://open.weixin.qq.com/cgi-bin/showdocument?action=dir_list">
                                微信·开放平台·开发文档 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://mp.weixin.qq.com/debug/wxadoc/dev/">
                                微信·小程序·开发文档 <span class="pull-right"><b class="badge bg-purple">5</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://exmail.qq.com/cgi-bin/loginpage">
                                腾讯企业邮箱 <span class="pull-right"><b class="badge bg-maroon">6</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    {{--导航--}}
    <div class="row">

        {{--K-ORG--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">K-ORG（本地）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://www.k-org.com/">
                                【l】首页 <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://super.k-org.com/admin">
                                【l】SUPER <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://org.k-org.com/admin">
                                【l】ORG <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--K-ORG--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-primary box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">K-ORG（线上）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://www.k-org.cn/">
                                【ON】首页 <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://super.k-org.cn/admin">
                                【ON】super <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://org.k-org.cn/admin">
                                【ON】ORG <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{--lookwit--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">LOOKWIT</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.lookwit.com/admin">
                                【on】SUPER <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://atom.lookwit.com/admin">
                                【on】ATOM <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://doc.lookwit.com/home">
                                【on】DOC <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="javascript:void(0);">
                                【on】 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--ruwei--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">RUWEI</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.ruwei.com/admin">
                                【L】SUPER <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://atom.ruwei.com/admin">
                                【L】ATOM <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://doc.ruwei.com/home">
                                【L】DOC <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="javascript:void(0);">
                                【L】 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    {{--导航--}}
    <div class="row">

        {{--DK 董凯--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">DK 董凯（本地）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.local-dongkai.com/user/staff-list-for-all">
                                【l】Super.员工列表 <span class="pull-right"><b class="badge bg-red">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://cc.local-dongkai.com/">
                                【l】CC.调度系统 <span class="pull-right"><b class="badge bg-purple">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin.local-dongkai.com">
                                【l】Admin.工单列表 <span class="pull-right"><b class="badge bg-purple">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://client.local-dongkai.com">
                                【l】Client.交付列表 <span class="pull-right"><b class="badge bg-blue">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://finance.local-dongkai.com/item/daily-list">
                                【l】Finance.日报列表 <span class="pull-right"><b class="badge bg-green">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin2.local-dongkai.com/item/clue-list">
                                【l】Choice.线索列表 <span class="pull-right"><b class="badge bg-purple">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://customer.local-dongkai.com/item/clue-list">
                                【l】Customer.线索列表 <span class="pull-right"><b class="badge bg-aqua">5</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--DK 董凯--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">DK 董凯（线上）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.feiniji.xyz/user/staff-list-for-all">
                                【ON】Super.员工列表 <span class="pull-right"><b class="badge bg-red">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://cc.feiniji.xyz/">
                                【ON】CC.调度系统 <span class="pull-right"><b class="badge bg-purple">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin.feiniji.xyz">
                                【ON】Admin.工单列表 <span class="pull-right"><b class="badge bg-purple">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://client.feiniji.xyz">
                                【ON】Client.交付列表 <span class="pull-right"><b class="badge bg-blue">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://finance.feiniji.xyz/item/daily-list">
                                【ON】Finance.日报列表 <span class="pull-right"><b class="badge bg-green">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin2.feiniji.xyz/item/clue-list">
                                【ON】Choice.线索列表 <span class="pull-right"><b class="badge bg-purple">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://customer.feiniji.xyz/item/clue-list">
                                【ON】Customer.线索列表 <span class="pull-right"><b class="badge bg-aqua">5</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{--豫好物流--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">豫好物流（本地）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.local-yuhao.com/user/user-list-for-all">
                                【local】Super.员工列表 <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin.local-yuhao.com/item/order-list-for-all">
                                【local】订单列表 <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--豫好物流--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">豫好物流（线上）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.yuhaowuliu.cn/item/record-list-for-all">
                                【ON】Super.记录列表 <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin.yuhaowuliu.cn/item/order-list-for-all">
                                【ON】订单列表 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    {{--导航--}}
    <div class="row">

        {{--ZY兆益信息--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">ZY兆益信息（本地）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.zy.gps.com/">
                                【local】Super <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin.zy.gps.com/">
                                【local】Admin <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://staff.zy.gps.com/">
                                【local】Staff  <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
        {{--ZY兆益信息--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-warning box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">ZY兆益信息（线上）</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://super.zy.chaos01.cn/">
                                【ON】Super <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://admin.zy.chaos01.cn/">
                                【ON】Admin <span class="pull-right"><b class="badge bg-purple">5</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://staff.zy.chaos01.cn/">
                                【ON】Staff <span class="pull-right"><b class="badge bg-maroon">6</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://lxcrm.weiwenjia.com/">
                                励销云 - 工作台 <span class="pull-right"><b class="badge bg-fuchsia">7</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{--GH 桂花--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">GH 桂花</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://gh.gps.com/">
                                【l】首页 <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://gh.gps.com/admin/item/product-list-for-all">
                                【l】Admin.产品列表 <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://gh.chaos01.cn/">
                                【ON】首页 <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://gh.chaos01.cn/admin/item/product-list-for-all">
                                【ON】Admin.产品列表 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


        {{--tools--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">tools</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="">
                                1<span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                2<span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                3<span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                4<span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                5<span class="pull-right"><b class="badge bg-purple">5</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                6<span class="pull-right"><b class="badge bg-maroon">6</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

    </div>


    {{--导航--}}
    <div class="row">


        {{--RZK 瑞足康--}}
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-success box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">RZK 瑞足康</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://rzk.com/">
                                【l】首页 <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://rzk.com/admin">
                                【l】Admin <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://rzk888.com/">
                                【ON】首页 <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://rzk888.com/admin/">
                                【ON】Admin <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://www.blz9.cn/">
                                【ON】百龄足 <span class="pull-right"><b class="badge bg-purple">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>


    {{--头像--}}
    <div class="row">

        {{--头像1--}}
        <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user-2">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-primary">
                    <div class="widget-user-image">
                        <img class="img-circle" src="/AdminLTE/dist/img/user1-128x128.jpg" alt="User Avatar">
                    </div>
                    <!-- /.widget-user-image -->
                    <h3 class="widget-user-username">Nadia Carmichael</h3>
                    <h5 class="widget-user-desc">Lead Developer</h5>
                </div>

                <div class="box-body">
                    <div class="row">
                        <div class="col-xs-6 col-sm-6 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <div class="col-xs-6 col-sm-6 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                    </div>
                    <!-- /.row -->

                </div>

                <div class="box-footer no-padding">
                    <ul class="nav nav-stacked">
                        <li><a href="#">Projects <span class="pull-right badge bg-blue">31</span></a></li>
                        <li><a href="#">Tasks <span class="pull-right badge bg-aqua">5</span></a></li>
                        <li><a href="#">Completed Projects <span class="pull-right badge bg-green">12</span></a></li>
                        <li><a href="#">Followers <span class="pull-right badge bg-red">842</span></a></li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

        {{--头像2--}}
        <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-aqua-active">
                    <h3 class="widget-user-username">Alexander Pierce</h3>
                    <h5 class="widget-user-desc">Founder &amp; CEO</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="/AdminLTE/dist/img/user2-160x160.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->
                </div>
                <div class="box-footer no-padding padding-bottom-8px">
                    <ul class="nav nav-stacked">
                        <li>
                            <a href="#">
                                <i class="fa fa-user text-orange"></i>
                                黄会长
{{--                                <span class="pull-right badge bg-aqua">5</span>--}}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <i class="fa fa-phone text-danger"></i>
                                17721364771
{{--                                <span class="pull-right badge bg-green">12</span>--}}
                            </a>
                        </li>
                        <li>
                            <a href="#">
                                <strong><i class="fa fa-map-marker margin-r-5"></i></strong>
                                Projects Software Engineer Software Engineer 昆山市 陆家镇 南圩路 陈巷农贸市场3楼
{{--                                <span class="pull-right badge bg-blue">31</span>--}}
                            </a>
                        </li>
                        <li>
                            <a href="#">

                                <span class="pull-left margin-2px label label-danger">UI Design</span>
                                <span class="pull-left margin-2px label label-success">Coding</span>
                                <span class="pull-left margin-2px label label-info">Javascript</span>
                                <span class="pull-left margin-2px label label-warning">PHP</span>
                                <span class="pull-left margin-2px label label-primary">Node.js</span>

{{--                                <span class="pull-right badge bg-red">842</span>--}}
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

        {{--头像2 有背景图像--}}
        <div class="col-md-3">
            <!-- Widget: user widget style 1 -->
            <div class="box box-widget widget-user">
                <!-- Add the bg color to the header using any of the bg-* classes -->
                <div class="widget-user-header bg-black" style="background: url('/AdminLTE/dist/img/photo1.png') center center;">
                    <h3 class="widget-user-username">Elizabeth Pierce</h3>
                    <h5 class="widget-user-desc">Web Designer</h5>
                </div>
                <div class="widget-user-image">
                    <img class="img-circle" src="/AdminLTE/dist/img/user3-128x128.jpg" alt="User Avatar">
                </div>
                <div class="box-footer">
                    <div class="row">
                        <div class="col-xs-4 col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">3,200</h5>
                                <span class="description-text">SALES</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 col-sm-4 border-right">
                            <div class="description-block">
                                <h5 class="description-header">13,000</h5>
                                <span class="description-text">FOLLOWERS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                        <div class="col-xs-4 col-sm-4">
                            <div class="description-block">
                                <h5 class="description-header">35</h5>
                                <span class="description-text">PRODUCTS</span>
                            </div>
                            <!-- /.description-block -->
                        </div>
                        <!-- /.col -->
                    </div>
                    <!-- /.row -->

                </div>

                <div class="box-body">
                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- /.widget-user -->
        </div>

        {{--微信开发--}}
        <div class="col-md-3">

            <!-- Profile Image -->
            <div class="box box-primary">
                <div class="box-body box-profile">
                    <img class="profile-user-img img-responsive img-circle" src="/AdminLTE/dist/img/user4-128x128.jpg" alt="User profile picture">

                    <h3 class="profile-username text-center">Nina Mcintire</h3>

                    <p class="text-muted text-center">Software Engineer</p>

                    <ul class="list-group list-group-unbordered">
                        <li class="list-group-item">
                            <b>Followers</b> <a class="pull-right">1,322</a>
                        </li>
                        <li class="list-group-item">
                            <b>Following</b> <a class="pull-right">543</a>
                        </li>
                        <li class="list-group-item">
                            <b>Friends</b> <a class="pull-right">13,287</a>
                        </li>
                    </ul>

                    <a href="#" class="btn btn-primary btn-block"><b>Follow</b></a>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->

        </div>

        <div class="col-md-3">
            <!-- About Me Box -->
            <div class="box box-primary">
                <div class="box-header with-border">
                    <h3 class="box-title">About Me</h3>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <strong><i class="fa fa-book margin-r-5"></i> Education</strong>

                    <p class="text-muted">
                        B.S. in Computer Science from the University of Tennessee at Knoxville
                    </p>

                    <hr>

                    <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>

                    <p class="text-muted">Malibu, California</p>

                    <hr>

                    <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

                    <p>
                        <span class="label label-danger">UI Design</span>
                        <span class="label label-success">Coding</span>
                        <span class="label label-info">Javascript</span>
                        <span class="label label-warning">PHP</span>
                        <span class="label label-primary">Node.js</span>
                    </p>

                    <hr>

                    <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
                </div>
                <!-- /.box-body -->
            </div>
            <!-- /.box -->
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3"><div class="box box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title">Labels</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li><a href="#"><i class="fa fa-circle-o text-red"></i> Important</a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-yellow"></i> Promotions</a></li>
                        <li><a href="#"><i class="fa fa-circle-o text-light-blue"></i> Social</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>
        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-solid box-primary-">
                <div class="box-header with-border">
                    <h3 class="box-title">Folders</h3>

                    <div class="box-tools">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body no-padding">
                    <ul class="nav nav-pills nav-stacked">
                        <li class="active">
                            <a href="#">
                                <i class="fa fa-inbox"></i> Inbox
                                <span class="label label-primary pull-right">12</span>
                            </a>
                        </li>
                        <li><a href="#"><i class="fa fa-envelope-o"></i> Sent</a></li>
                        <li><a href="#"><i class="fa fa-file-text-o"></i> Drafts</a></li>
                        <li><a href="#"><i class="fa fa-filter"></i> Junk <span class="label label-warning pull-right">65</span></a>
                        </li>
                        <li><a href="#"><i class="fa fa-trash-o"></i> Trash</a></li>
                    </ul>
                </div>
                <!-- /.box-body -->
            </div>
        </div>

    </div>


    {{--导航 Tools--}}
    <div class="row">

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">tools</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="http://tool.chinaz.com/">
                                站长工具 <span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://www.bejson.com/">
                                Json验证 <span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://tool.oschina.net/encrypt?type=2">
                                在线加密解密 <span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://www.atool.org/timestamp.php">
                                时间戳 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://pandao.github.io/editor.md/">
                                markdown(github) <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">tools</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="https://tool.chinaz.com/tools/pagecolor.aspx">
                                网页颜色选择器 - 站长工具 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://xingzhengquhua.bmcx.com/">
                                行政区划 - 行政区划代码查询 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://szjrzzwdxje.bmcx.com/">
                                数字金额转中文大写金额 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://www.topdf.cn/">
                                pdf转换成Word转换器 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="https://jinaconvert.com/cn/">
                                在线图片转换器 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="http://www.zuohaotu.com/image-to-ico.aspx">
                                免费在线图片转ICO图标 <span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>

        <div class="col-xs-12 col-sm-6 col-md-3">
            <div class="box box-danger box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">tools</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    <ul class="nav nav-stacked">
                        <li class="">
                            <a target="_blank" href="">
                                 1<span class="pull-right"><b class="badge bg-green">1</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                 2<span class="pull-right"><b class="badge bg-orange">2</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                 3<span class="pull-right"><b class="badge bg-aqua">3</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                 4<span class="pull-right"><b class="badge bg-red">4</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                 5<span class="pull-right"><b class="badge bg-purple">5</b></span>
                            </a>
                        </li>
                        <li class="">
                            <a target="_blank" href="">
                                6<span class="pull-right"><b class="badge bg-maroon">6</b></span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>


    </div>




    <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://cloudconvert.com/">cloudconvert WebP转图片</a>
    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://isparta.github.io/">isparta WebP转图片</a>
    <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://processon.com/">免费在线作图ProcessOn</a>
    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.faviconico.org">在线转icon</a>




    {{--导航--}}
    <div class="row">

        <div class="col-md-12">
            <div class="box box-info">
                <div class="box-header with-border">
                    <h3 class="box-title">Latest Orders</h3>

                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                        <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <div class="table-responsive">
                        <table class="table no-margin">
                            <thead>
                            <tr>
                                <th>项目</th>
                                <th>链接</th>
                                <th>Status</th>
                                <th>Popularity</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td><a href="javascript:void(0);">GPS</a></td>
                                <td>Call of Duty IV</td>
                                <td><span class="label label-success">Shipped</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00a65a" data-height="20">90,80,90,-70,61,-83,63</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">豫好物流</a></td>
                                <td><a href="javascript:void(0);">GPS</a></td>
                                <td><span class="label label-warning">Pending</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#f39c12" data-height="20">90,80,-90,70,61,-83,68</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">董凯</a></td>
                                <td>iPhone 6 Plus</td>
                                <td><span class="label label-danger">Delivered</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#f56954" data-height="20">90,-80,90,70,-61,83,63</div>
                                </td>
                            </tr>
                            <tr>
                                <td><a href="pages/examples/invoice.html">OR7429</a></td>
                                <td>Samsung Smart TV</td>
                                <td><span class="label label-info">Processing</span></td>
                                <td>
                                    <div class="sparkbar" data-color="#00c0ef" data-height="20">90,80,-90,70,-61,83,63</div>
                                </td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix">
                    <a href="javascript:void(0)" class="btn btn-sm btn-info btn-flat pull-left">Place New Order</a>
                    <a href="javascript:void(0)" class="btn btn-sm btn-default btn-flat pull-right">View All Orders</a>
                </div>
                <!-- /.box-footer -->
            </div>
        </div>

    </div>


    {{--工具--}}
    <div class="row">


        <section class="col-lg-6">
            <!-- iCheck -->
            <div class="box box-success">
                <div class="box-header">
                    <h3 class="box-title">iCheck - Checkbox &amp; Radio Inputs</h3>
                </div>
                <div class="box-body">
                    <!-- Minimal style -->

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal" checked>
                        </label>
                        <label>
                            <input type="checkbox" class="minimal">
                        </label>
                        <label>
                            <input type="checkbox" class="minimal" disabled>
                            Minimal skin checkbox
                        </label>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <label>
                            <input type="radio" name="r1" class="minimal" checked>
                        </label>
                        <label>
                            <input type="radio" name="r1" class="minimal">
                        </label>
                        <label>
                            <input type="radio" name="r1" class="minimal" disabled>
                            Minimal skin radio
                        </label>
                    </div>

                    <!-- Minimal red style -->

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="minimal-red" checked>
                        </label>
                        <label>
                            <input type="checkbox" class="minimal-red">
                        </label>
                        <label>
                            <input type="checkbox" class="minimal-red" disabled>
                            Minimal red skin checkbox
                        </label>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <label>
                            <input type="radio" name="r2" class="minimal-red" checked>
                        </label>
                        <label>
                            <input type="radio" name="r2" class="minimal-red">
                        </label>
                        <label>
                            <input type="radio" name="r2" class="minimal-red" disabled>
                            Minimal red skin radio
                        </label>
                    </div>

                    <!-- Minimal red style -->

                    <!-- checkbox -->
                    <div class="form-group">
                        <label>
                            <input type="checkbox" class="flat-red" checked>
                        </label>
                        <label>
                            <input type="checkbox" class="flat-red">
                        </label>
                        <label>
                            <input type="checkbox" class="flat-red" disabled>
                            Flat green skin checkbox
                        </label>
                    </div>

                    <!-- radio -->
                    <div class="form-group">
                        <label>
                            <input type="radio" name="r3" class="flat-red" checked>
                        </label>
                        <label>
                            <input type="radio" name="r3" class="flat-red">
                        </label>
                        <label>
                            <input type="radio" name="r3" class="flat-red" disabled>
                            Flat green skin radio
                        </label>
                    </div>
                </div>
                <!-- /.box-body -->
                <div class="box-footer">
                    Many more skins available. <a href="http://fronteed.com/iCheck/">Documentation</a>
                </div>
            </div>

        </section>




    </div>


    {{--导航--}}
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="box box-default">


                {{----}}
                <div class="box-header with-border">
                    <h3 class="box-title"><b>LY.Product</b></h3>
                </div>
                <div class="box-body">
                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://lookwit.com">Lookwit</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://gps.lookwit.com/admin/">GPS</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://super.lookwit.com/admin/">SUPER</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://org.lookwit.com/admin/">ORG</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://doc.lookwit.com/admin">DOC</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://atom.lookwit.com/admim">ATOM</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://super.lookwit.com/admin/sql/insert">Super.SQL.Insert</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://k-org.cn">K-ORG</a>
                    </div>
                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://ruwei.com">Lookwit</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://gps.ruwei.com/admin/">GPS</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://super.ruwei.com/admin/">SUPER</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://org.ruwei.com/admin/">ORG</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://doc.ruwei.com/admin">DOC</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://atom.ruwei.com/admin">ATOM</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://super.ruwei.com/admin/sql/insert">Super.SQL.Insert</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://k-org.com">K-ORG</a>
                    </div>
                </div>
                <div class="box-body">
                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://k-org.cn">K-ORG</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://super.k-org.cn/admin">Super</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://org.k-org.cn/">ORG</a>
                    </div>
                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://k-org.com">K-ORG</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://super.k-org.com/admin">Super</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://org.k-org.com/">ORG</a>
                    </div>
                </div>


                {{----}}
                <div class="box-header with-border">
                    <h3 class="box-title"><b>LY.Tools</b></h3>
                </div>
                <div class="box-body">

                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://live2.pub:8088/">邮件服务器 live2.pub:8088</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://cuilongyun.win:8088/">邮件服务器 cuilongyun.win:8088</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-black" href="https://beian.aliyun.com/order/index.htm">阿里备案</a>
                        <a target="_blank" class="margin btn btn-xs bg-black" href="https://netcn.console.aliyun.com/core/domain/list">阿里域名</a>
                        <a target="_blank" class="margin btn btn-xs bg-black" href="https://dysms.console.aliyun.com/dysms.htm">阿里短信</a>
                        <a target="_blank" class="margin btn btn-xs bg-black" href="https://market.aliyun.com/developer">阿里云·开发者工具</a>
                        <a target="_blank" class="margin btn btn-xs bg-black" href="https://qiye.aliyun.com/">阿里企业邮箱</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://mail.163.com/">网易邮箱</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="https://open.weixin.qq.com/">微信·开放平台</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="https://mp.weixin.qq.com/">微信·公众平台</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="https://mp.weixin.qq.com/wiki?t=resource/res_main">微信·公众号·开发文档</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="https://open.weixin.qq.com/cgi-bin/showdocument?action=dir_list">微信·开放平台·开发文档</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="https://mp.weixin.qq.com/debug/wxadoc/dev/">微信·小程序·开发文档</a>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="https://exmail.qq.com/cgi-bin/loginpage">腾讯企业邮箱</a>
                    </div>

                </div>


                {{----}}
                <div class="box-header with-border">
                    <h3 class="box-title"><b>Super.SQL</b></h3>
                </div>
                <div class="box-body">
                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://lookwit.com">lookwit</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softorg.cn/super-admin/">超级管理员</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softorg.cn/org-admin/">机构管理员</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softdoc.cn">softdoc</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://k-org.cn/">K-ORG</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.cn/developing/style/gps">softorg.GPS</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.cn/super/admin">企业站超级管理员</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.cn/org/register">企业站注册</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.cn/org/admin">企业站后台</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.cn/o/softorg">企业站前台</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.cn/inside/admin">Inside后台</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.cn/outside/admin">Outside后台</a>
                    </div>
                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://ruwei.com">lookwit</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softorg.com/super-admin/">超级管理员</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softorg.com/org-admin/">机构管理员</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softdoc.com">softdoc</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://k-org.com/">K-ORG</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.com/developing/style/gps">softorg.GPS</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.com/super/admin">企业站超级管理员</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.com/org/register">企业站注册</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.com/org/admin">企业站后台</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.com/o/softorg">企业站前台</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.com/inside/admin">Inside后台</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary" href="http://softorg.com/outside/admin">Outside后台</a>
                    </div>
                </div>


                {{--颜色--}}
                <div class="box-body">

                    <div>
                        <span style="width:120px;float:left;">【btn】</span>
                        <a target="_blank" class="margin btn btn-xs btn-success">success</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger">danger</a>
                        <a target="_blank" class="margin btn btn-xs btn-warning">warning</a>
                        <a target="_blank" class="margin btn btn-xs btn-info">info</a>
                        <a target="_blank" class="margin btn btn-xs btn-primary">primary 原色/基本的/主要的/初级的</a>
                        <a target="_blank" class="margin btn btn-xs btn-error">error</a>
                        <a target="_blank" class="margin btn btn-xs btn-default">default</a>
                    </div>
                    <div>
                        <span style="width:120px;float:left;">【label】</span>
                        <a target="_blank" class="margin btn btn-xs label-success">success</a>
                        <a target="_blank" class="margin btn btn-xs label-danger">danger</a>
                        <a target="_blank" class="margin btn btn-xs label-warning">warning</a>
                        <a target="_blank" class="margin btn btn-xs label-info">info</a>
                        <a target="_blank" class="margin btn btn-xs label-primary">primary 原色/基本的/主要的/初级的</a>
                        <a target="_blank" class="margin btn btn-xs label-error">error</a>
                    </div>
                    <div>
                        <span style="width:120px;float:left;">【alert】</span>
                        <a target="_blank" class="margin btn btn-xs alert-success">success</a>
                        <a target="_blank" class="margin btn btn-xs alert-danger">danger</a>
                        <a target="_blank" class="margin btn btn-xs alert-warning">warning</a>
                        <a target="_blank" class="margin btn btn-xs alert-info">info</a>
                        <a target="_blank" class="margin btn btn-xs alert-primary">primary 原色/基本的/主要的/初级的</a>
                        <a target="_blank" class="margin btn btn-xs alert-error">error</a>
                    </div>
                    <div>
                        <span style="width:120px;float:left;">【bg】</span>
                        <a target="_blank" class="margin btn btn-xs bg-success">success</a>
                        <a target="_blank" class="margin btn btn-xs bg-danger">danger</a>
                        <a target="_blank" class="margin btn btn-xs bg-warning">warning</a>
                        <a target="_blank" class="margin btn btn-xs bg-info">info</a>
                        <a target="_blank" class="margin btn btn-xs bg-primary">primary 原色/基本的/主要的/初级的</a>
                        <a target="_blank" class="margin btn btn-xs bg-error">error</a>
                        <a target="_blank" class="margin btn btn-xs bg-default">default</a>
                    </div>
                    <div>
                        <span style="width:120px;float:left;">【bg】</span>
                        <a target="_blank" class="margin btn btn-xs bg-red">red</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon">maroon 褐红</a>
                        <a target="_blank" class="margin btn btn-xs bg-fuchsia">fuchsia 紫红</a>
                        <a target="_blank" class="margin btn btn-xs bg-orange">orange</a>
                        <a target="_blank" class="margin btn btn-xs bg-yellow">yellow</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue">blue</a>
                        <a target="_blank" class="margin btn btn-xs bg-light-blue">light-blue</a>
                        <a target="_blank" class="margin btn btn-xs bg-aqua">aqua 浅绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-teal">teal 青/蓝绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-green">green</a>
                        <a target="_blank" class="margin btn btn-xs bg-olive">olive 橄榄绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-lime">lime 酸橙绿/淡黄绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-purple">purple</a>
                        <a target="_blank" class="margin btn btn-xs bg-navy">navy 深蓝</a>
                        <a target="_blank" class="margin btn btn-xs bg-black">black</a>
                        <a target="_blank" class="margin btn btn-xs bg-grey">grey</a>
                        <a target="_blank" class="margin btn btn-xs bg-gray">gray</a>
                    </div>
                    <div>
                        <span style="width:120px;float:left;">【active】</span>
                        <a target="_blank" class="margin btn btn-xs bg-red-active">red</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon-active">maroon 褐红</a>
                        <a target="_blank" class="margin btn btn-xs bg-fuchsia-active">fuchsia 紫红</a>
                        <a target="_blank" class="margin btn btn-xs bg-orange-active">orange</a>
                        <a target="_blank" class="margin btn btn-xs bg-yellow-active">yellow</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue-active">blue</a>
                        <a target="_blank" class="margin btn btn-xs bg-light-blue-active">light-blue</a>
                        <a target="_blank" class="margin btn btn-xs bg-aqua-active">aqua 浅绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-teal-active">teal 青/蓝绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-green-active">green</a>
                        <a target="_blank" class="margin btn btn-xs bg-olive-active">olive 橄榄绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-lime-active">lime 酸橙绿/淡黄绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-purple-active">purple</a>
                        <a target="_blank" class="margin btn btn-xs bg-navy-active">navy 深蓝</a>
                        <a target="_blank" class="margin btn btn-xs bg-black-active">black</a>
                        <a target="_blank" class="margin btn btn-xs bg-grey-active">grey</a>
                        <a target="_blank" class="margin btn btn-xs bg-gray-active">gray</a>
                    </div>
                    <div>
                        <span style="width:120px;float:left;">【gradient 渐变】</span>
                        <a target="_blank" class="margin btn btn-xs bg-red-gradient">red</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon-gradient">maroon 褐红</a>
                        <a target="_blank" class="margin btn btn-xs bg-fuchsia-gradient">fuchsia 紫红</a>
                        <a target="_blank" class="margin btn btn-xs bg-orange-gradient">orange</a>
                        <a target="_blank" class="margin btn btn-xs bg-yellow-gradient">yellow</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue-gradient">blue</a>
                        <a target="_blank" class="margin btn btn-xs bg-light-blue-gradient">light-blue</a>
                        <a target="_blank" class="margin btn btn-xs bg-aqua-gradient">aqua 浅绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-teal-gradient">teal 青/蓝绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-green-gradient">green</a>
                        <a target="_blank" class="margin btn btn-xs bg-olive-gradient">olive 橄榄绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-lime-gradient">lime 酸橙绿/淡黄绿</a>
                        <a target="_blank" class="margin btn btn-xs bg-purple-gradient">purple</a>
                        <a target="_blank" class="margin btn btn-xs bg-navy-gradient">navy 深蓝</a>
                        <a target="_blank" class="margin btn btn-xs bg-black-gradient">black</a>
                        <a target="_blank" class="margin btn btn-xs bg-grey-gradient">grey</a>
                        <a target="_blank" class="margin btn btn-xs bg-gray-gradient">gray</a>
                    </div>
                    <div>
                        <span style="width:120px;float:left;">【callout】</span>
                        <a target="_blank" class="margin btn btn-xs callout callout-success">success</a>
                        <a target="_blank" class="margin btn btn-xs callout callout-danger">danger</a>
                        <a target="_blank" class="margin btn btn-xs callout callout-warning">warning</a>
                        <a target="_blank" class="margin btn btn-xs callout callout-info">info</a>
                        <a target="_blank" class="margin btn btn-xs callout callout-primary">primary 原色/基本的/主要的/初级的</a>
                        <a target="_blank" class="margin btn btn-xs callout callout-error">error</a>
                    </div>

                </div>


                .modal-primary .modal-body, .modal-primary .modal-header, .modal-primary .modal-footer,
                .modal-warning .modal-body, .modal-warning .modal-header, .modal-warning .modal-footer,
                .modal-info .modal-body, .modal-info .modal-header, .modal-info .modal-footer,
                .modal-success .modal-body, .modal-success .modal-header, .modal-success .modal-footer,
                .modal-danger .modal-body, .modal-danger .modal-header, .modal-danger .modal-footer




                <div class="box-body">
                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://seo.shmitong.com">SEO</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://juafc.com">汉盟地产</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://shxmej.com">盛贝地产</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://tinymax.cn">JJ-MAX</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://keron-relo.com">Keron</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://yunfei-piano.com">云飞</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://seo.shmitong.com/">米同SEO</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://seo.shmitong.cn/">速效云</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://baixing.suxiaoyun.cn/">速效云-百姓网</a>
                    </div>
                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://seo.mitong.com">SEO</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://local-hanmeng.com">汉盟地产</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://local-shengbei.com">盛贝地产</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://local-jjmax.com">JJ-MAX</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://local-keron.com">Keron</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://local-yunfei.com">云飞</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://www.mitong-seo.com/">米同SEO</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://seo.mitong.com/">速效云</a>
                        <a target="_blank" class="margin btn btn-xs bg-blue" href="http://api.mitong.com/">速效云-百姓网</a>
                    </div>
                </div>

                <div class="box-body">

                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softpub.cn">作者与作品 softpub.cn</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softrow.cn">图表站 softrow.cn</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://softblog.cn">课栈三人行 softblog.cn</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://tinyline.cn">时间线 tinyline.cn</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://topicbus.cn">话题社 topicbus.cn</a>
                        <a target="_blank" class="margin btn btn-xs btn-danger" href="http://you2.pub">树洞 you2.pub</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/login">登录页</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/guest">游客页</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo.date:8088/admin">作品</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/Program/truncate">truncate</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/Program/relation_init">relation_init</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/test">qingbo.test</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/testLearning">qingbo.testLearning</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/testLaravel">qingbo.testLaravel</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://qingbo8.cn:8088/testProgram">qingbo.testProgram</a>
                    </div>

                </div>

            </div>
            <!-- END PORTLET-->
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="box box-default">

                <div class="box-header with-border" style="margin:4px 0 16px">
                    <h3 class="box-title">Developing</h3>
                </div>


                <div class="box-header with-border">
                    <h3 class="box-title">Programming.Tools</h3>
                </div>

                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="https://github.com/">GitHub</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="https://gitlab.com/">GitLab</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="https://gitee.com/">Gitee</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://www.bootcss.com/">BootCSS</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://www.bootcdn.cn/">BootCDN</a>
                    <a target="_blank" class="margin btn btn-xs bg-primary" href="https://oneinstack.com/">oneinstack</a>
                    <a target="_blank" class="margin btn btn-xs bg-primary" href="https://oneinstack.com/docs/lampstack-image-guide/">LAMP环境镜像使用手册</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://github.com/zusaleshi">donghai</a>
                </div>

                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://expo.bootcss.com/">BootCSS.expo</a>
                    <a target="_blank" class="margin btn btn-xs btn-danger" href="http://echarts.baidu.com/index.html">echarts</a>
                    <a target="_blank" class="margin btn btn-xs bg-primary" href="https://adminlte.io/themes/AdminLTE/index.html">AdminLTE</a>
                    <a target="_blank" class="margin btn btn-xs bg-primary" href="https://adminlte.io/themes/AdminLTE/pages/UI/icons.html">Icons</a>
                </div>

                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs btn-danger" href="https://laravel.com/docs/5.5">Docs5.5(English)</a>
                    <a target="_blank" class="margin btn btn-xs btn-primary" href="http://d.laravel-china.org/docs/5.5">Docs5.5</a>
                    <a target="_blank" class="margin btn btn-xs btn-primary" href="http://d.laravel-china.org/docs/5.1">Docs5.1</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://laravelacademy.org/post/153.html">Laravel 精选资源大全</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://laravelacademy.org/post/205.html">Laravel 帮助函数</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://laravelacademy.org/post/178.html">Laravel 集合</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="https://nwidart.com/laravel-modules/v1/introduction">laravel-modules</a>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">Programming.Tools</h3>
                </div>

                <div class="box-body">
                </div>

                {{--Documents--}}
                <div class="box-header with-border">
                    <h3 class="box-title">Documents</h3>
                </div>

                <div class="box-body">
                </div>

                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://www.liaoxuefeng.com/">廖雪峰</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="https://codeigniter.org.cn/docs">codeigniter</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://www.yiichina.com/">yii中文官网</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://select2.github.io/select2/">select2</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://www.open-open.com/lib/view/open1355830836135.html">Redis</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="https://space.bilibili.com/11490447#!/">万力B站</a>
                </div>

                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs btn-danger" href="http://www.w3school.com.cn/">w3school</a>
                    <a target="_blank" class="margin btn btn-xs btn-danger" href="http://www.w3school.com.cn/php/index.asp">php</a>
                    <a target="_blank" class="margin btn btn-xs btn-danger" href="http://www.w3school.com.cn/js/index.asp">js</a>
                    <a target="_blank" class="margin btn btn-xs btn-danger" href="http://www.w3school.com.cn/jquery/index.asp">jquery</a>
                </div>

                {{--Article.Laravel--}}
                <div class="box-header with-border">
                    <h3 class="box-title">Article.Laravel</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://www.runoob.com/design-pattern/design-pattern-tutorial.html">设计模式</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://laravelacademy.org/post/3502.html">多用户认证功能实现详解</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://laravelacademy.org/post/3850.html">集成七牛云存储实现云存储功能</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://laravelacademy.org/post/2605.html">Simple QrCode 二维码</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://coding.imooc.com/class/chapter/111.html">Laravel 5.4 快速开发简书（课程）</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="https://d.laravel-china.org/docs/5.5/migrations">migrations 数据迁移</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://www.maatwebsite.nl/laravel-excel/docs">Laravel Excel</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href=""></a>
                </div>


                {{--Article.JQuery--}}
                <div class="box-header with-border">
                    <h3 class="box-title">Article.JQuery</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://www.cnblogs.com/xiangsj/p/5884808.html">JQuery选中，置顶、上移、下移、置底、删除</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href=""></a>
                </div>


                {{--Article.Bootstrap--}}
                <div class="box-header with-border">
                    <h3 class="box-title">Article.Bootstrap</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://www.runoob.com/bootstrap/bootstrap-modal-plugin.html">Bootstrap 模态框（Modal）插件</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href=""></a>
                </div>


                {{--Article.Others--}}
                <div class="box-header with-border">
                    <h3 class="box-title">Article.Others</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-olive" href="http://www.open-open.com/lib/view/open1355830836135.html">利用predis操作redis方法大全</a>
                    <a target="_blank" class="margin btn btn-xs bg-olive" href=""></a>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">Medsci</h3>
                </div>

                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://chandao.bioon.com:2222">禅道</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://doc.medon.com.cn:2222">日报</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://api.center.medsci.cn/api/docs#/">API.center</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://backend.bioon.com/admin">inside</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://common.backend.medsci.cn/admin">common</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://xy.bioon.com/admin_mooc/">行云后台</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://xy.bioon.com/">行云学院</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://customer.medsci.cn/imbruvica/index">杨森</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://customer.medsci.cn/casemeeting/meeting/list/bayer">拜新同</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://customer.medsci.cn/novonordisk/meeting/list/nhnd">诺和诺德</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://customer.medsci.cn/glypressin/index">可利新</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://customer.medsci.cn/glypressin/record/export">可利新下载</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://trial.medsci.cn/">患者招募</a>
                </div>

            </div>
            <!-- END PORTLET-->
        </div>
    </div>


    {{--Documents--}}
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="box box-default">

                <div class="box-header with-border" style="margin:4px 0 16px">
                    <h3 class="box-title">Life</h3>
                </div>
                <div class="box-body">

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.google.cn/maps">Google地图</a>
                        <a target="_blank" class="margin btn btn-xs bg-purple" href="http://map.baidu.com">百度地图</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://map.baidu.com/subways/index.html?c=shanghai">上海地铁</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs btn-success" href="http://www.dy2018.com/">dy2018</a>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://www.youku.com/">优酷</a>
                        <a target="_blank" class="margin btn btn-xs bg-success" href="https://v.qq.com/">腾讯视频</a>
                        <a target="_blank" class="margin btn btn-xs bg-olive" href="http://www.iqiyi.com/">爱奇艺</a>
                        <a target="_blank" class="margin btn btn-xs bg-purple" href="https://www.iqiyi.com/a_19rrhb3xvl.html">海贼王</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://www.ashleymadison.com">ashleymadison</a>
                        <a target="_blank" class="margin btn btn-xs bg-purple" href="https://weibo.com/u/2427880080/home">微博</a>
                        <a target="_blank" class="margin btn btn-xs bg-purple" href="https://www.douban.com/">豆瓣</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://list.youku.com/show/id_z6e782defbfbd0d4e11ef.html">晓说</a>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://www.iqiyi.com/a_19rrgifngp.html">晓松奇谈</a>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://list.youku.com/show/id_z64feb2249b8211e296da.html">晓说第二季2013-14</a>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://list.youku.com/show/id_zc3c10ca46d8d11e1b52a.html">晓说第一季2012-13</a>

                        <a target="_blank" class="margin btn btn-xs bg-danger" href="http://list.youku.com/show/id_z5bdbf57c947311e3b8b7.html">罗辑思维</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://v.qq.com/detail/8/80376.html">十三邀 3</a>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://v.qq.com/detail/6/68145.html">十三邀 2</a>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://v.qq.com/detail/4/49622.html">十三邀 1</a>

                        <a target="_blank" class="margin btn btn-xs bg-danger" href="http://list.youku.com/show/id_z662fefbfbd61efbfbdef.html">一千零一夜走出季</a>
                        <a target="_blank" class="margin btn btn-xs bg-danger" href="http://list.youku.com/show/id_z7c87f1ae8e6311e5b522.html">一千零一夜</a>

                        <a target="_blank" class="margin btn btn-xs bg-warning" href="http://list.youku.com/show/id_zefbfbd3cefbfbd64efbf.html">圆桌派第3季</a>
                        <a target="_blank" class="margin btn btn-xs bg-warning" href="http://list.youku.com/show/id_z3127efbfbd11250911ef.html">圆桌派第2季</a>
                        <a target="_blank" class="margin btn btn-xs bg-warning" href="http://list.youku.com/show/id_z66ba2c36920211e6b9bb.html">圆桌派第1季</a>

                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://list.youku.com/show/id_zefbfbdefbfbd3e0defbf.html">局部 2</a>
                        <a target="_blank" class="margin btn btn-xs bg-info" href="http://list.youku.com/show/id_zcc117696c7cb11e4b432.html">局部 1</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-success" href="http://www.iqiyi.com/a_19rrhcoc51.html">坑王驾到 2</a>
                        <a target="_blank" class="margin btn btn-xs bg-success" href="http://www.iqiyi.com/a_19rrh9pwd9.html">坑王驾到 1</a>

                        <a target="_blank" class="margin btn btn-xs bg-orange" href="https://www.mgtv.com/h/320520.html">天天向上</a>
                    </div>

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-success" href="http://list.youku.com/show/id_za94e7c9a1af411e5b2ad.html">新城商业</a>
                    </div>

                    <div>
                    </div>

                </div>



                <div class="box-header with-border">
                    <h3 class="box-title">Sports</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-orange" href="https://www.zhibo8.cc">直播吧</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://sports.pptv.com">PPTV</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://sports.sina.com.cn/g/pl/table.html">英超积分榜</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://sports.sina.com.cn/csl/table">中超积分榜</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://sports.qq.com/">腾讯体育</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://sports.qq.com/nba">腾讯NBA</a>

                    <a target="_blank" class="margin btn btn-xs bg-success" href="https://weibo.com/donglu?is_all=1">董路微博</a>
                    <a target="_blank" class="margin btn btn-xs bg-success" href="http://www.yizhibo.com/member/personel/user_info?memberid=39369208">董路一直播</a>
                    <a target="_blank" class="margin btn btn-xs bg-success" href="http://star.longzhu.com/donglu/sport">董路龙珠</a>

                    <a target="_blank" class="margin btn btn-xs btn-success" href="https://www.transfermarkt.com/">德国转会市场</a>
                    <a target="_blank" class="margin btn btn-xs btn-success" href="http://www.stat-nba.com/query.php?QueryType=all&AllType=season&AT=tot&order=1&crtcol=threep&PageNum=50">NBA-数据库</a>
                </div>



                <div class="box-header with-border">
                    <h3 class="box-title">Buy</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs btn-default" href="https://www.amazon.cn/">亚马逊</a>
                    <a target="_blank" class="margin btn btn-xs bg-danger" href="https://www.jd.com/">京东</a>
                    <a target="_blank" class="margin btn btn-xs bg-primary" href="https://luojisiwei.tmall.com/category.htm?spm=a1z10.3-b-s.w4011-14454324002.43.5eeR3T&search=y&orderType=newOn_desc">罗辑思维</a>
                </div>



                <div class="box-header with-border">
                    <h3 class="box-title">Life.Tools</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.gsxt.gov.cn/index.html">企业信用信息</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://xin.baidu.com/">百度企业信用</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://www.tianyancha.com/">天眼查</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://salarycalculator.sinaapp.com/">上海税后工资计算器</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.miitbeian.gov.cn">ICP备案</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.chsi.com.cn/">学信网</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://checkcoverage.apple.com/cn/zh/">apple保修服务和支持期限</a>
                </div>


                <div class="box-header with-border">
                    <h3 class="box-title">Life.Tools</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.zhaopin.com/">智联招聘</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href=""></a>
                </div>

            </div>
            <!-- END PORTLET-->
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="box box-default">

                <div class="box-header with-border" style="margin:4px 0 16px">
                    <h3 class="box-title">企业首页</h3>
                </div>
                <div class="box-body">

                    <div>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.meritse.com/">锐凡企业管理咨询（上海）有限公司</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://www.paintin.cn/">Paintin（插画师）</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://leancapital.tk/">精益资本</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.youguard.cn/">上海誉甲自动化技术有限公司</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.10years.me/account/login">10年后</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.justsy.com">嘉兴嘉赛</a>
                        <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://www.vipp.com/en-us">vipp</a>
                    </div>

                    <div>

                    </div>

                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">design</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="http://www.hellorf.com/">站酷海洛</a>
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href=""></a>
                </div>



            </div>
            <!-- END PORTLET-->
        </div>
    </div>


    {{--Reading--}}
    <div class="row">
        <div class="col-md-12">
            <!-- BEGIN PORTLET-->
            <div class="box box-danger">

                <div class="box-header with-border" style="margin:4px 0 16px">
                    <h3 class="box-title">Reading 读书</h3>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">Miscellaneous</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://www.juzimi.com/">句子迷</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_1.aspx">《山海经》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_67.aspx">《徐霞客游记》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_51.aspx">《笑林广记》</a>

                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_3.aspx">《孙子兵法》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_4.aspx">《三十六计》</a>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">国学</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-maroon" href="https://v.qq.com/detail/8/8jwd4d9xbyar2u1.html">蔡志忠</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_6.aspx">《周易》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_28.aspx">《老子》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_26.aspx">《庄子》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_2.aspx">《论语》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_11.aspx">《孟子》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_20.aspx">《大学》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_21.aspx">《中庸》</a>

                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_18.aspx">《世说新语》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_75.aspx">《菜根谭》</a>

                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://www.daodejing.org/">《道德经》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://www.fosss.org/Book/ZhuangZi/Index.html">《庄子》白话译注</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://www.quanxue.cn/CT_DaoJia/ZhuangZiIndex.html">《庄子》劝学网</a>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">历史</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_5.aspx">《史记》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_8.aspx">《资治通鉴》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_9.aspx">《续资治通鉴》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_40.aspx">《汉书》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_41.aspx">《后汉书》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_54.aspx">《三国志》</a>

                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_19.aspx">《左传》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_143.aspx">《公羊传》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_44.aspx">《吕氏春秋》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_53.aspx">《战国策》</a>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">诗词歌赋</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/gushi/sanbai.aspx">《古诗三百首》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/gushi/tangshi.aspx">《唐诗三百首》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/gushi/songsan.aspx">《宋词三百首》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/gushi/shijing.aspx">《诗经》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/gushi/chuci.aspx">《楚辞》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/gushi/yuefu.aspx">《乐府诗集选》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/wenyan/guanzhi.aspx">《古文观止》</a>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title">名著</h3>
                </div>
                <div class="box-body">
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_105.aspx">《红楼梦》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_106.aspx">《三国演义》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_107.aspx">《水浒传》</a>
                    <a target="_blank" class="margin btn btn-xs bg-purple" href="http://so.gushiwen.org/guwen/book_108.aspx">《西游记》</a>
                </div>

                <div class="box-header with-border">
                    <h3 class="box-title"></h3>
                </div>
                <div class="box-body">
                </div>

            </div>
            <!-- END PORTLET-->
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
