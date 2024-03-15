@extends(env('TEMPLATE_RZK_WEB_DEF').'layout.layout')


@section('head_title')新闻动态-瑞足康-社区养生@endsection
@section('meta_title')瑞足康-社区养生@endsection
@section('meta_author')瑞足康-社区养生@endsection
@section('meta_description')瑞足康-社区养生@endsection
@section('meta_keywords')瑞足康-社区养生@endsection




@section('content')
<div class="item active">
    <img src="/custom/rzk/image/index/news.jpg" alt="">
</div>

{{--<!--content start-->--}}
<div class="common_main">
    <div class="common_container">
        <div class="common_top">
            当前位置：<a href="/news/index">新闻中心</a> > <a href="/news/industry">最新动态</a>
        </div>

        <div class="common_c_left">
            <div class="left_nav">
                <a href="/news/index"><div class="left_nava left_navav">>最新动态</div></a>
                <a href="/news/industry"><div class="left_nava">>行业新闻</div></a>
            </div>
        </div>

        <div class="common_c_right">
            <div class="article_container">
                <h3>{{ $item->title or 'TITLE' }}</h3>
                <h6>{{ $item->created_at->format('Y-m-d') }}</h6>
                <div>
                    {!! $item->content or '' !!}
                </div>
            </div>
            <div class="article_np">
                <ul>
{{--                    <li>上一篇：没有了 </li>--}}
{{--                    <li>下一篇：<a href='100.html'>上海沐浴行业协会足道专业委员会二届三次秘书处会议圆满召开，百龄足品牌于世才先生受聘为专委会执行秘书长</a></li>--}}
                </ul>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="common_shadow"><img src="../image/index/shadow.png" alt=""></div>
</div>
{{--<!--content end-->--}}
@endsection


@section('custom-js')
    <script type="text/javascript" src="/custom/rzk/js/kefu.js"></script>
{{--    <script type="text/javascript" src="/custom/rzk/js/bfix.js"></script>--}}
    <script type="text/javascript" src="/custom/rzk/js/index.js"></script>
@endsection