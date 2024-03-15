@extends(env('TEMPLATE_RZK_WEB_DEF').'layout.layout')


@section('head_title')瑞足康-社区养生@endsection
@section('meta_title')瑞足康-社区养生@endsection
@section('meta_author')瑞足康-社区养生@endsection
@section('meta_description')瑞足康-社区养生@endsection
@section('meta_keywords')瑞足康-社区养生@endsection




@section('content')
<div class="item active">
    <img src="/custom/rzk/image/index/product.jpg" alt="">
</div>

{{--<!--content start-->--}}
<div class="common_main">
    <div class="common_container">
        <div class="common_top">
            当前位置：<a href="/index">主页</a> > <a href="index.html">产品/服务</a> >
        </div>
        <!--<img src="http://wap.blz9.com/image/product.jpg" alt="">-->


        <!-- <div class="c_title">
            <p>瑞足康系列产品</p>
            <p>上海瑞足康健康管理有限公司旗下拥有养生和养护两大类近50余款产品，</p>
            <p>主要包括熏蒸沐足系列、蕲艾系列、人参系列和足之源系列四大系列。</p>
        </div>
      
        <div class="xzmz">
            <img src="/image/index/product1.png" alt="">
            <ul>
              <li>
                <img src="/image/index/product1-01.png" alt="">
                <p>瑞足康中草药沐足包</p>
              </li>
              <li>
                <img src="/image/index/product1-02.png" alt="">
                <p>瑞足康肠胃舒熏蒸包</p>
              </li>
              <li>
                <img src="/image/index/product1-03.png" alt="">
                <p>瑞足康祛寒舒熏蒸包</p>
              </li>
            </ul>
            <ul>
              <li>
                <img src="/image/index/product1-04.png" alt="">
                <p>瑞足康筋骨舒熏蒸包</p>
              </li>
              <li>
                <img src="/image/index/product1-05.png" alt="">
                <p>瑞足康血清舒熏蒸包</p>
              </li>
              <li>
                <img src="/image/index/product1-06.png" alt="">
                <p>瑞足康肾舒宝熏蒸包</p>
              </li>
              <li>
                <img src="/image/index/product1-07.png" alt="">
                <p>瑞足康安睡舒蒸包等</p>
              </li>
            </ul>
        </div>
        
        <div class="qaxl">
            <img src="/image/index/product2.png" alt="">
            <ul>
              <li>
                <img src="/image/index/product2-01.png" alt="">
                <p>瑞足康蕲艾贴</p>
              </li>
              <li>
                <img src="/image/index/product2-02.png" alt="">
                <p>瑞足康艾足贴</p>
              </li>
              <li>
                <img src="/image/index/product2-03.png" alt="">
                <p>瑞足康蕲艾眼贴</p>
              </li>
              <li>
                <img src="/image/index/product2-04.png" alt="">
                <p>瑞足康三年珍品雷火灸</p>
              </li>
            </ul>
        </div>

        <div class="rsxl">
            <img src="/image/index/product3.png" alt="">
            <ul>
              <li>
                <img src="/image/index/product3-01.png" alt="">
                <p>瑞足康人参养肤膏</p>
              </li>
              <li>
                <img src="/image/index/product3-02.png" alt="">
                <p>瑞足康人参皂</p>
              </li>
              <li>
                <img src="/image/index/product3-03.png" alt="">
                <p>瑞足康人参面膜</p>
              </li>
              <li>
                <img src="/image/index/product3-04.png" alt="">
                <p>瑞足康红参蜜膏</p>
              </li>
              <li>
                <img src="/image/index/product3-05.png" alt="">
                <p>瑞足康人参元素口服液等</p>
              </li>
            </ul>
        </div> -->


        <!--div class="zzyxl">
            <img src="/image/index/product4.png" alt="">
            <ul>
              <li>
                <img src="/image/index/product4-01.png" alt="">
                <p>瑞足康足之源抗菌膏</p>
              </li>
              <li>
                <img src="/image/index/product4-02.png" alt="">
                <p>瑞足康足之源抗真菌膜</p>
              </li>
              <li>
                <img src="/image/index/product4-03.png" alt="">
                <p>瑞足康复合抗菌洗浴剂</p>
              </li>
              <li>
                <img src="/image/index/product4-04.png" alt="">
                <p>瑞足康老茧角质抗菌膜</p>
              </li>
              <li>
                <img src="/image/index/product4-05.png" alt="">
                <p>瑞足康足之源肤清剂</p>
              </li>
            </ul>
            <ul>
              <li>
                <img src="/image/index/product4-06.png" alt="">
                <p>瑞足康亮甲膜</p>
              </li>
              <li>
                <img src="/image/index/product4-07.png" alt="">
                <p>瑞足康纳米抗菌剂</p>
              </li>
              <li>
                <img src="/image/index/product4-08.png" alt="">
                <p>瑞足康纳米抗菌粉</p>
              </li>
              <li>
                <img src="/image/index/product4-09.png" alt="">
                <p>瑞足康喷雾抗菌剂</p>
              </li>
              <li>
                <img src="/image/index/product4-10.png" alt="">
                <p>瑞足康清爽美哫剂</p>
              </li>
            </ul>
        </div-->

        <div class="tsService">
            <div class="t_title">
                <p>特色服务</p>
                <!--p>瑞足康健康管理有限公司旗下在全国范围内拥有千余家瑞足康品牌跨区域连锁门店，</p-->
                <p>瑞足康品牌养生门店提供9大专业服务</p>
            </div>
            <ul>
                @foreach($product_service as $item)
                    <li>
                        <img src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt="">
                        <p>{{ $item->title or 'TITLE' }}</p>
                    </li>
                @endforeach
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-01.png" alt="">--}}
{{--                    <p>足道</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-02.png" alt="">--}}
{{--                    <p>中医穴位推拿</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-03.png" alt="">--}}
{{--                    <p>拔罐</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-04.png" alt="">--}}
{{--                    <p>刮痧</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-05.png" alt="">--}}
{{--                    <p>采耳</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-06.png" alt="">--}}
{{--                    <p>精修脚</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-07.png" alt="">--}}
{{--                    <p>艾灸调理</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-08.png" alt="">--}}
{{--                    <p>疼痛调理</p>--}}
{{--                </li>--}}
{{--                <li>--}}
{{--                    <img src="/custom/rzk/image/index/product5-09.png" alt="">--}}
{{--                    <p>亚健康调理</p>--}}
{{--                </li>--}}
            </ul>
        </div>
    </div>
</div>
{{--<!--content end-->--}}
@endsection


@section('custom-js')
    <script type="text/javascript" src="/custom/rzk/js/kefu.js"></script>
{{--    <script type="text/javascript" src="/custom/rzk/js/bfix.js"></script>--}}
    <script type="text/javascript" src="/custom/rzk/js/index.js"></script>
@endsection