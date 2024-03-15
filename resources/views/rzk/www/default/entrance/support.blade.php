@extends(env('TEMPLATE_RZK_WEB_DEF').'layout.layout')


@section('head_title')运营指导-瑞足康-社区养生@endsection
@section('meta_title')瑞足康-社区养生@endsection
@section('meta_author')瑞足康-社区养生@endsection
@section('meta_description')瑞足康-社区养生@endsection
@section('meta_keywords')瑞足康-社区养生@endsection




@section('content')
<div class="item active">
    <img src="/custom/rzk/image/index/support.jpg" alt="">
</div>

{{--<!-- content start-->--}}
<div class="common_main">
    <div class="common_container">
        <div class="common_top">
            当前位置：<a href="/">主页</a> > <a href="/support">运营指导</a> >
        </div>

        <!--div class="content_box erji_box ">
            <div class="content_box13 sup_box1 ">
                <h2 class="colorzt h2bg">基础运营系统</h2>
                <h4 class="color1">瑞足康运营的底层架构，为门店及其他项目合作方提供运营基础支持</h4>
                <ul>
                    <li class="" >
                        <img src="/image/index/supa%20(1).jpg" alt=""/><br/>
                        <h4>产品研发</h4>
                    </li>
                    <li class="" >
                        <img src="/image/index/supa%20(2).jpg" alt=""/><br/>
                        <h4>技术研发</h4>

                    </li>
                    <li class="" >
                        <img src="/image/index/supa%20(3).jpg" alt=""/><br/>
                        <h4>供应链体系</h4>

                    </li>
                </ul>
                <div class="clear"></div>
                <ul>
                    <li class="" >
                        <img src="/image/index/supa%20(4).jpg" alt=""/><br/>
                        <h4>营销推广</h4>

                    </li>
                    <li class="" >
                        <img src="/image/index/supa%20(5).jpg" alt=""/><br/>
                        <h4>设备采购</h4>

                    </li>
                    <li class="" >
                        <img src="/image/index/supa%20(6).jpg" alt=""/><br/>
                        <h4>产业合作</h4>

                    </li>
                </ul>
                <div class="clear"></div>
            </div>
        </div-->

        <div class="content_box bgcolor4 ">
            <div class="erji_box">
                <h2 class="colorzt tacenter h2bg">门店运营系统</h2>
                <h4 class="margin2">围绕“人货场”三个关键因素，目的是为了提高客流量、 <br/>客单价、转化率等指标，精细化运作，目的形成运营闭环，提高门店业绩</h4>
                <h3 class="tacenter margin2">五个统一</h3>
                <div class="sup_ty">
                    <div class="sup_fa">形象 <br/>统一</div>
                    <div class="sup_fb">产品<br/>统一</div>
                    <div class="sup_fc">能力<br/>统一</div>
                    <div class="sup_fd">店员行为<br/>规范统一</div>
                    <div class="sup_fe">展陈<br/>统一</div>
                </div>
                <h3 class="tacenter margin2">业绩提升</h3>
                <ul class="sup_ts">
                    <li>进店人<br/>数提升</li>
                    <li>成交率<br/>提升</li>
                    <li>客单价<br/>提升</li>
                    <li>重复购买<br/>率提升</li>
                </ul>
                <div class="clear"></div>
            </div>
        </div>

        <div class="content_box content_box8 erji_box">
            <h2 class="colorzt tacenter h2bg">瑞足康大健康产业链</h2>

            <ul class="margin2">

                @foreach($support_industry_chain as $item)
                @if($loop->index < 4)
                <li class="index_box8li" >
                    <img src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt=""/><br/>
                    <h4>{{ $item->title or 'TITLE' }}</h4>
                    <p>{{ $item->description or 'description' }}</p>
                </li>
                @endif
                @endforeach
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_ea.png" alt=""/><br/>--}}
{{--                    <h4>健康农业</h4>--}}
{{--                    <p>--}}
{{--                        农产品种植 <br/>--}}
{{--                        农产品加工<br/>--}}
{{--                        农产品销售<br/>--}}
{{--                        农业旅游--}}
{{--                    </p>--}}
{{--                </li>--}}
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_eb.png" alt=""/><br/>--}}
{{--                    <h4>健康管理</h4>--}}
{{--                    <p>--}}
{{--                        数据采集<br/>--}}
{{--                        数据诊断<br/>--}}
{{--                        预防管理<br/>--}}
{{--                        康养管理--}}
{{--                    </p>--}}
{{--                </li>--}}
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_ec.png" alt=""/><br/>--}}
{{--                    <h4>健康文化</h4>--}}
{{--                    <p> --}}
{{--                        瑞足康文化馆<br/>--}}
{{--                        原材料文化整理<br/>--}}
{{--                        中国传统文化课<br/>--}}
{{--                        中国健康养生培训--}}
{{--                    </p>--}}
{{--                </li>--}}
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_ed.png" alt=""/><br/>--}}
{{--                    <h4>健康创新</h4>--}}
{{--                    <p> --}}
{{--                        养生产品创新<br/>--}}
{{--                        养生技术创新<br/>--}}
{{--                        养生服务创新<br/>--}}
{{--                        培训服务创新--}}
{{--                    </p>--}}
{{--                </li>--}}
            </ul>
            <ul>

                @foreach($support_industry_chain as $item)
                    @if($loop->index >= 4 && $loop->index < 8)
                        <li class="index_box8li" >
                            <img src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt=""/><br/>
                            <h4>{{ $item->title or 'TITLE' }}</h4>
                            <p>{{ $item->description or 'description' }}</p>
                        </li>
                    @endif
                @endforeach
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_ee.png" alt=""/><br/>--}}
{{--                    <h4>健康制造</h4>--}}
{{--                    <p>--}}
{{--                        原材料种植<br/>--}}
{{--                        产品生产<br/>--}}
{{--                        设备生产--}}
{{--                    </p>--}}
{{--                </li>--}}
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_ef.png" alt=""/><br/>--}}
{{--                    <h4>互联网+健康</h4>--}}
{{--                    <p>--}}
{{--                        互联网+保健养生<br/>--}}
{{--                        互联网管理工具<br/>--}}
{{--                        互联网+产品创新<br/>--}}
{{--                        互联网+健康产品营销--}}
{{--                    </p>--}}
{{--                </li>--}}
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_eg.png" alt=""/><br/>--}}
{{--                    <h4>健康培训</h4>--}}
{{--                    <p>--}}
{{--                        健康商学院<br/>--}}
{{--                        理疗技术培训<br/>--}}
{{--                        足疗技师培训<br/>--}}
{{--                        门店运营管理培训--}}
{{--                    </p>--}}
{{--                </li>--}}
{{--                <li class="index_box8li" >--}}
{{--                    <img src="/custom/rzk/image/index/index_eh.png" alt=""/><br/>--}}
{{--                    <h4>健康养生</h4>--}}
{{--                    <p>--}}
{{--                        泡脚足疗服务<br/>--}}
{{--                        艾灸理疗服务<br/>--}}
{{--                        足部修护服务<br/>--}}
{{--                        O2O养生服务--}}
{{--                    </p>--}}
{{--                </li>--}}
            </ul>
            <div class="clear"></div>
        </div>

        <div class="content_box content_box13 content_boxky erji_box">

            <h2 class="colorzt tacenter h2bg">标准化运营流程及内容</h2>
            <ul class="content_ky">

                <li style="margin-left: 0;">
                    <div class="kya">开业前</div>
                    @foreach($support_operation_flow_before as $item)
                    <div class="kyb">
                        <img  src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt="">
                        <br>
                        {{ $item->title or 'TITLE' }}
                    </div>
                    @endforeach
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kya.jpg" alt=""><br>专业选址指导及商圈评估</div>--}}
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kyb.jpg" alt=""><br>装修设计及布局规划</div>--}}
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kyc.jpg" alt=""><br>提供设备和产品</div>--}}

                </li>
                <li>
                    <div class="kya">开业中</div>
                    @foreach($support_operation_flow_ing as $item)
                        <div class="kyb">
                            <img  src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt="">
                            <br>
                            {{ $item->title or 'TITLE' }}
                        </div>
                    @endforeach
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kyd.jpg" alt=""><br>开业策划</div>--}}
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kye.jpg" alt=""><br>技术培训</div>--}}
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kyf.jpg" alt=""><br>开店带店</div>--}}

                </li>
                <li>
                    <div class="kya">开业后</div>
                    @foreach($support_operation_flow_after as $item)
                        <div class="kyb">
                            <img  src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt="">
                            <br>
                            {{ $item->title or 'TITLE' }}
                        </div>
                    @endforeach
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kyg.jpg" alt=""><br>运营培训</div>--}}
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kyh.jpg" alt=""><br>人才培训</div>--}}
{{--                    <div class="kyb"><img  src="/custom/rzk/image/index/index_kyi.jpg" alt=""><br>数据分析</div>--}}
                </li>
                <div class="clear"></div>
            </ul>
            <div class="clear"></div>
        </div>

    </div>
    <div class="common_shadow"><img src="/custom/rzk/image/index/shadow.png" alt=""></div>
</div>
{{--<!--content  end-->--}}
@endsection


@section('custom-js')
    <script type="text/javascript" src="/custom/rzk/js/kefu.js"></script>
{{--    <script type="text/javascript" src="/custom/rzk/js/bfix.js"></script>--}}
    <script type="text/javascript" src="/custom/rzk/js/index.js"></script>
@endsection