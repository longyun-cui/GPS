@extends(env('TEMPLATE_RZK_WEB_DEF').'layout.layout')


@section('head_title')瑞足康-社区养生@endsection
@section('meta_title')瑞足康-社区养生@endsection
@section('meta_author')瑞足康-社区养生@endsection
@section('meta_description')瑞足康-社区养生@endsection
@section('meta_keywords')瑞足康-社区养生@endsection


@section('content')
<div class="item active">
    <img src="/custom/rzk/image/index/about.jpg" alt="">
</div>


{{--<!--content start-->--}}
<div class="common_main">
    <div class="common_container">
        <div class="common_top">
            当前位置：<a href="/">主页</a> > <a href="/about">集团实力</a> >
        </div>

        <div class="common_c_left">
            <div class="left_nav">
                <div class="left_nava left_navav"><img src="/custom/rzk/image/index/arrow_l.png" alt=""/>公司简介</div>
                <!--div class="left_nava"><img src="/image/index/arrow_l.png" alt=""/>创始人故事</div-->
                <div class="left_nava"><img src="/custom/rzk/image/index/arrow_l.png" alt=""/>核心团队</div>
                <div class="left_nava"><img src="/custom/rzk/image/index/arrow_l.png" alt=""/>发展历程</div>
                <div class="left_nava"><img src="/custom/rzk/image/index/arrow_l.png" alt=""/>公司文化</div>
            </div>
        </div>

        <div class="common_c_right">
            <div class="about_box xs ">
                {!! $intro->content or '' !!}
            </div>

            <!--div class="about_box  ">
                <img class="about_dimg" src="image/index/about_d.jpg" alt=""/>
                <p class="margin4">经过多年发展，瑞足康已经迅速成长为中国大健康产业的标杆企业，公司将继续发挥健康产业平台的优势，
                通过创新、资本、技术，围绕健康产业的发展布局，打造成大健康产业的领军企业，为提升人民健康福祉做出积极贡献，让更多人享受到养生养足的健康服务。</p>
            </div-->

            <div class="about_box">
                @foreach($team_list as $item)
                <div class="team_box" >
                    <div class="team_img"><img src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt=""/></div>
                    <div class="team_txt ">
                        <h4>{{ $item->title or 'TITLE' }}</h4>
                        <div>
                            {{ $item->description or 'description' }}
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>
                @endforeach
            </div>

            <div class="about_box about_lc">
                <ul>
                    <li>
                        <div class="about_lc_img tacenter"><img src="/custom/rzk/image/index/about_lca.png" alt=""/></div>
                        <div class="about_lc_txt taright">
                            <h4>2002年</h4>
                            <p>吉林力神集团成立于2002年，涉足生物制药、保健品制造、中医药产品研发及生产，经过多年积累，集团实力显著增长。</p>
                        </div>
                    </li>
                    <li>
                        <div class="about_lc_txt taleft">
                            <h4 >2010年</h4>
                            <p>建立原材料基地，形成原料产业链，汇聚上下游优势资源，进一步扩大市场版图。
                            </p>
                        </div>
                        <div class="about_lc_img f-r"><img src="/custom/rzk/image/index/about_lcb.png" alt=""/></div>
                    </li>
                    <li>
                        <div class="about_lc_img taright"><img src="/custom/rzk/image/index/about_lcc.png" alt=""/></div>
                        <div class="about_lc_txt taright">
                            <h4>2010年</h4>
                            <p>建设现代化的总部基地，汇聚上下游优势资源，进一步扩大健康产业版图。</p>
                        </div>
                    </li>
                    <li>
                        <div class="about_lc_txt taleft">
                            <h4>2012年</h4>
                            <p>研发出全新中药配方，开发专利型中药泡脚和足部修护产品，在东北三省，开设中药泡脚连锁门店，取得巨大成功。</p>
                        </div>
                        <div class="about_lc_img f-r"><img src="/custom/rzk/image/index/about_lcd.png" alt=""/></div>
                    </li>
                    <li>
                        <div class="about_lc_img taright"><img src="/custom/rzk/image/index/about_lce.png" alt=""/></div>
                        <div class="about_lc_txt taright">
                            <h4>2015年</h4>
                            <p>建成吉林通化和湖北蕲春两大产业基地，硕果累累，成为大健康产业的代表性企业之一。</p>
                        </div>
                    </li>
                    <li>
                        <div class="about_lc_txt taleft">
                            <h4 >2017年</h4>
                            <p>集团成立互联网+大健康研发中心，以先进的互联网技术，成功探索出互联网+社区养生的运营模式。</p>
                            <br/><br/>
                            <h4 >2018年</h4>
                            <p>响应国家政策，正式开放全国招商合作政策，进一步推动中国大健康产业发展，在全国范围内打造瑞足康品牌连锁门店</p>
                        </div>
                        <div class="about_lc_img f-r"><img src="/custom/rzk/image/index/about_lcf.png" alt=""/></div>
                    </li>
                </ul>
            </div>

            <div class="about_box about_wh  ">
                <ul>
                    <li>
                        <h4>公司愿景</h4>
                        <p>大家都享受到健康、文明、优质的品牌养生服务。</p>
                    </li>
                    <li>
                        <h4>公司使命</h4>
                        <p>为客户创造健康，为合作伙伴创造财富，为行业树立标杆。</p>
                    </li>
                    <li>
                        <h4>企业价值观</h4>
                        <p>以服务为发展，以技术为核心，以健康为使命。</p>
                    </li>
                    <li>
                        <h4>服务理念</h4>
                        <p>以服务为发展，以技术为核心，用心服务，赢在细节。</p>
                    </li>
                </ul>
                <!--  <div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(1).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(2).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(3).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(4).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(5).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(6).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(7).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(8).jpg" alt=""/></div>
                     <div class=" col-lg-4"><img src="/image/index/anout_ry%20(9).jpg" alt=""/></div>
                 </div> -->
            </div>
        </div>
        <div class="clear"></div>
    </div>
    <div class="common_shadow"><img src="/custom/rzk/image/index/shadow.png" alt=""></div>
</div>
{{--<!--content end-->--}}
@endsection


@section('custom-js')
    <script type="text/javascript" src="/custom/rzk/js/kefu.js"></script>
    <script type="text/javascript" src="/custom/rzk/js/bfix.js"></script>
    <script type="text/javascript" src="/custom/rzk/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/custom/rzk/js/index.js"></script>
@endsection