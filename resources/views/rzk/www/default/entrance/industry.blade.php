@extends(env('TEMPLATE_RZK_WEB_DEF').'layout.layout')


@section('head_title')产业基地-瑞足康-社区养生@endsection
@section('meta_title')瑞足康-社区养生@endsection
@section('meta_author')瑞足康-社区养生@endsection
@section('meta_description')瑞足康-社区养生@endsection
@section('meta_keywords')瑞足康-社区养生@endsection


@section('content')
<div class="item active">
    <img src="/custom/rzk/image/index/industry.jpg" alt="">
</div>

{{--<!--content start-->--}}
<div class="common_main">
    <div class="common_container">
        <div class="common_top">
            当前位置：<a href="/">主页</a> > <a href="/industry">产业基地</a> >
        </div>

        <div class="content_box erji_box">

            <h2 class="colorzt h2bg tacenter">瑞足康产业基地介绍</h2>

            <div class="taleft margin1 ">
                <img src="/custom/rzk/image/index/industry_a.jpg" alt=""/>
                <p class="margin4">瑞足康是一家综合型的大健康创新型企业。旗下拥有三大运营中心和专业的培训基地。公司致力于推动健康产业发展，
                    助力全民健康生活，立志成为中国“互联网+社区养生”产业领导品牌。</p>
                <img src="/custom/rzk/image/index/industry_b.jpg" alt=""/>
                <p class="margin4">公司目前在吉林通化和湖北蕲春拥有万亩原料产地，总产值达3亿元。</p>
                <img src="/custom/rzk/image/index/industry_c.jpg" alt=""/>
                <p class="margin4">公司现有员工300多人，拥有品牌中心、市场中心，运营中心，物流配送中心、客服中心、人力资源管理中心等完整组织结构。
                    经过多年发展，瑞足康迅速成长为中国大健康产业的知名企业之一，公司将继续发挥健康产业平台的优势，
                    通过科研创新，资本创新，技术创新、商业模式创新，围绕健康产业的发展布局，让更多人享受到养生养足的健康服务。</p>
            </div>

        </div>
    </div>
    <div class="common_shadow"><img src="/custom/rzk/image/index/shadow.png" alt=""></div>
</div>
{{--<!--content end-->--}}
@endsection


@section('custom-js')
    <script type="text/javascript" src="/custom/rzk/js/kefu.js"></script>
{{--    <script type="text/javascript" src="/custom/rzk/js/bfix.js"></script>--}}
    <script type="text/javascript" src="/custom/rzk/js/index.js"></script>
@endsection