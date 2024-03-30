@extends(env('TEMPLATE_LY_GPS__DEV__UI').'layout.layout')


@section('head_title')
    {{ $title_text or "dev.ui" }}
@endsection




@section('header','')
@section('description'){{ $title_text or '首页' }} - {{ config('gh.info.info.name') }}@endsection
@section('breadcrumb')
{{--    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>--}}
@endsection
@section('content')
<div class="full-container">


    <section class="probootstrap-intro banner-for-root _none" data-stellar-background-ratio="0.5">
        <div class="block-fill">
            <div class="block-fill">

                <div class="slide-container swiper-container">
                    <div class="swiper-wrapper">
                        @if(!empty($info->custom3))
                            @foreach($info->custom3 as $img)
                                <div class="swiper-slide box1"><img src="{{ url(config('common.host.'.env('APP_ENV').'.cdn').'/'.$img->img) }}" alt="上海龙臻国际物流有限公司 Banner Image {{ $loop->index + 1 }}"></div>
                            @endforeach
                        @endif
                    </div>
                    <!-- 如果需要分页器 -->
                    <div class="swiper-pagination"></div>

                    <!-- 如果需要导航按钮 -->
                    <div class="swiper-button-prev"></div>
                    <div class="swiper-button-next"></div>

                    <!-- 如果需要滚动条 -->
                    <!--<div class="swiper-scrollbar"></div>-->
                </div>

                <div id="slide-container main-slider _none">

                    @if(!empty($info->custom3))
                        @foreach($info->custom3 as $img)
                            <div class="slide"><img src="{{ url(config('common.host.'.env('APP_ENV').'.cdn').'/'.$img->img) }}" alt="Slide"></div>
                        @endforeach
                    @endif
                    {{--<div class="slide"><img src="{{ url('/common/images/banner01.jpeg') }}" alt="Slide"></div>--}}
                    {{--<div class="slide"><img src="{{ url('/common/images/banner02.jpeg') }}" alt="Slide"></div>--}}
                    {{--<div class="slide"><img src="{{ url('/common/images/banner03.jpeg') }}" alt="Slide"></div>--}}
                </div>

                <div class="probootstrap-intro-text">
                    <div class="banner-title-box">
                        <div class="banner-title-bin">
                            {{--<h1 class="banner-title-row probootstrap-animate">{{ trans('custom.info.name') }}</h1>--}}
                            <h1 class="banner-title-row probootstrap-animate">{{ trans('custom.text.banner_root_title') }}</h1>
                            <div style="display:none;">上海一站式搬家、上海厂房搬迁公司、上海仓储物流公司</div>
                            <div class="banner-title-row probootstrap-subtitle probootstrap-animate">
                                <h2 style="margin-bottom:0;">
                                    <a href="javascript:void(0);" rel="nofollow" target="_blank">{{ trans('custom.info.slogan') }}</a>
                                </h2>
                            </div>
                        </div>
                    </div>
                    {{--<p class="watch-intro probootstrap-animate"><a href="" class="popup-vimeo">Watch the video <i class="icon-play2"></i></a></p>--}}
                </div>

            </div>
        </div>
        {{--<a class="probootstrap-scroll-down js-next" href="index.html#next-section">Scroll down <i class="icon-chevron-down"></i></a>--}}
    </section>


    {{--banner--}}
    <div class="banner-container main-slider-wrapper clearfix">

        <div class="banner-slider-container">
            <div class="banner-slider-box" id="main-slider">
{{--                <div class="swiper-slide"><img src="{{ url('/common/images/banner1.jpg') }}" alt="Slide"></div>--}}
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/1.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/2.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/3.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/4.jpg') }}" alt="Slide"></div>
            </div>
        </div>


        <div class="banner-text-container _none- hidden-xs">
            <div class="banner-title-box">
                <div class="banner-title-bin">
                    {{--<h1 class="banner-title-row probootstrap-animate">一站式家庭&企业搬迁安置服务商</h1>--}}
                    <div class="banner-title-row wow fadeInUp">
                        <span class="banner-title">
                            <a href="javascript:void(0);" rel="nofollow">一站式家庭&企业搬迁安置服务商</a>
                        </span>
                    </div>
                    <div class="banner-title-row wow fadeInUp">
                        <span class="banner-subtitle">
                            <a href="javascript:void(0);" rel="nofollow">Ensuring Your Move's Success !</a>
                        </span>
                    </div>
                </div>
            </div>
            {{--<p class="watch-intro probootstrap-animate"><a href="" class="popup-vimeo">Watch the video <i class="icon-play2"></i></a></p>--}}
        </div>

    </div>


    {{--banner--}}
    <div class="banner-container main-slider-wrapper clearfix">

        <div class="banner-slider-container">
            <div class="banner-slider-box" id="main-slider">
                {{--                <div class="swiper-slide"><img src="{{ url('/common/images/banner1.jpg') }}" alt="Slide"></div>--}}
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/1.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/2.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/3.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/resource/custom/gh/images/slider/4.jpg') }}" alt="Slide"></div>
            </div>
        </div>

        <div class="banner-slider-contents" id="slider-contents">
            <div class="container text-center">
                <div class="jumbotron">
                    <div class="padding-8px title-md color-f _bold">{{ config('gh.info.info.company_name') }}</div>
                    <div class="contents clearfix">
                        <p class="font-16px-"><b>{{ config('gh.info.info.company_slogan') }}</b></p>
                    </div>
                    <a class="btn btn-warning btn-lg btn-3d" data-hover="联系我们" href="{{ url('/contact') }}" role="button">联系我们</a>
                    <a class="btn btn-default btn-lg btn-border" href="javascript:void(0);" role="button">Get a Quote</a>
                </div>
            </div>
        </div>

    </div>


    {{--<!-- module-activity -->--}}
    <section class="module-wrapper" style="height:64px;padding:0;background:#fff;">
        <div class="container" style="height:100%;position:relative;">
            <div class="row- activity-row">
            <span class="activity-title  title-zh  microsoft pull-left">
                <b>优惠活动</b>
            </span>
                <span class="activity-body  body-zh ">
                <span class="marquee">
                    <b>欧洲血液学协会(EHA)成立于1992年，经过将近30年的发展，</b>
                </span>
            </span>
                <span class="activity-link-button pull-right" role="button">
                <a href="http://local-keron.com/activity/2910"><b>了解更多</b></a>
            </span>
            </div>
        </div>
    </section>

    <style>

        /* Make it pretty */
        .microsoft {
            /*padding-left: 1.5em;*/
            position: relative;
            font-size: 20px;
        }
        .microsoft:before, .microsoft::before {
            position: absolute;
            left: -36px;
            /*top: -16px;*/
            width: 16px;
            height: 16px;
            content: '';
            box-shadow: 0 16px 0 #F65314, 20px 36px 0 #7CBB00, 0 36px 0 #00A1F1, 20px 16px 0 #FFBB00;
            z-index: 2;
        }
        /*.microsoft:after, .microsoft::after {*/
        /*position: absolute;*/
        /*top: -16px;*/
        /*left: -16px;*/
        /*width: 16px;*/
        /*height: 16px;*/
        /*content: '';*/
        /*background-image: linear-gradient(90deg, white 70%, rgba(255,255,255,0));*/
        /*z-index: 1;*/
        /*}*/


        .activity-row {
            position: relative;
            height: 100%;
            font-size: 16px;
        }
        .activity-title {
            height: 100%; line-height: 68px; padding: 0 8px;
            text-align: center; color: #ea5d5f; font-size: 16px; background: #fff;
            float: left;
            z-index: 3;
        }
        .activity-title.title-zh { width: 88px; }
        .activity-title.title-en { width: 180px; }

        .activity-body {
            position: relative;
            height: 100%;
            line-height: 68px;
            margin: 0 auto;
            white-space: nowrap;
            box-sizing: border-box;
            overflow: hidden;
            float: left;
            z-index: 1;
        }
        .activity-body.body-zh {
            width: calc(100% - 208px);
            width: -moz-calc(100% - 208px);
            width: -webkit-calc(100% - 208px);
        }
        .activity-body.body-en {
            width: calc(100% - 300px);
            width: -moz-calc(100% - 300px);
            width: -webkit-calc(100% - 300px);
        }

        .activity-link-button {
            width: 120px; height: 40px; line-height: 40px; margin-top: 12px;
            text-align: center; color:#fff; background: #ea5d5f;
            z-index: 3;
        }
        .activity-link-button a { color: #fff; }
        .activity-link-button:hover { background: #337ab7; }

        @media screen and (max-width:768px) {
            .activity-row { font-size: 14px; }
            .activity-title { padding: 16px 4px; line-height: 18px; font-size: 14px; }
            .activity-title.title-zh { width: 48px; }
            .activity-title.title-en { width: 96px; }
            .activity-body.body-zh {
                width: calc(100% - 128px);
                width: -moz-calc(100% - 128px);
                width: -webkit-calc(100% - 128px);
            }
            .activity-body.body-en {
                width: calc(100% - 176px);
                width: -moz-calc(100% - 176px);
                width: -webkit-calc(100% - 176px);
            }
            .activity-link-button { width: 80px; }
        }

        .marquee {
            position:relative;
            width: 100%;
            height: 100%;
            float: left;
            animation: marquee 10s linear infinite;
        }
        .marquee:hover { animation-play-state: paused }

        /* Make it move */
        @keyframes marquee {
            0%   { text-indent: 100% }
            100% { text-indent: 0 }
        }
        @media screen and (max-width:768px) {
            .marquee { animation: marquee 5s linear infinite;}
            @keyframes marquee {
                0%   { text-indent: 100% }
                100% { text-indent: -20% }
            }
        }





    </style>




    <section class="module-container module-wrapper module-bg-blue bg-dark">
        <div class="container">


            <div class="row">

                <header class="module-row module-header-container text-center">
                    <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white" style="visibility: visible; animation-name: slideInLeft;">
                        <b>最新产品</b>
                    </div>
                    <div class="wow slideInRight module-subtitle-row title-sm" style="visibility: visible; animation-name: slideInRight;">
                        hahaha
                    </div>
                </header>

                {{--年龄--}}
                <div class="col-xs-12 col-sm-6 col-md-4">
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

            </div>


        </div>
    </section>




    {{--左右结构--}}
    <section class="module-container module-wrapper module-bg-pink">
        <div class="container">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>我们的服务</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span>欢迎来看我们的最新产品</span>
                </div>
            </header>

            <div class="module-body-container text-left">
                @for ($i = 0; $i < 4; $i++)
                    <div class="item-piece col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="box-body-">
                            <ul class="products-list product-list-in-box">
                                <a href="{{ url('/product-detail?id=123') }}">
                                    <li class="item">
                                        <div class="product-img">
                                            <div class="image-box">
                                                <img src="{{ url('/resource/custom/gh/images/slider/1.jpg') }}" alt="Product Image">
                                            </div>
                                        </div>
                                        <div class="product-info">
                                            <a href="javascript:void(0)" class="product-title">
                                                {{ $item->title or 'TITLE' }}
                                            </a>
                                            <span class="product-description">
                                                {{ $item->description or 'description' }}
                                            </span>
                                            <span class="product-description">
                                                <span class="label label-warning pull-right-">
                                                    125元 /5件 起批
                                                </span>
                                            </span>
                                        </div>
                                    </li>
                                </a>
                            </ul>
                        </div>
                    </div>
                @endfor
            </div>

            <footer class="module-footer-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">
                        <a href="http://local-keron.com/quote" class="btn btn-lg btn-block btn-ghost btn-ghost-white" role="button">
                            咨询报价
                        </a>
                    </p>
                </div>
            </footer>


        </div>
    </section>




    {{--上下结构--}}
    <section class="module-container module-wrapper module-bg-blue">
        <div class="container">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>我们的服务</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span>欢迎来看我们的最新产品</span>
                </div>
            </header>

            <div class="module-body-container text-center">
            @for ($i = 0; $i < 4; $i++)
            <div class="item-piece col-xs-12 col-sm-6 col-md-6 col-lg-6">
                <div class="box box-widget pull-left  text-left">
                    <div class="box-header with-border _none">
                        <div class="user-block">
                            <img class="img-circle" src="/custom/gh/images/slider/1.jpg" alt="User Image">
                            <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                            <span class="description">Shared publicly - 7:30 PM Today</span>
                        </div>
                        <!-- /.user-block -->
                        <div class="box-tools">
                            <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                <i class="fa fa-circle-o"></i></button>
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                            <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="padding:0;">
                        <img src="{{ url('/resource/custom/gh/images/slider/1.jpg') }}" alt="Product Image">

                        {{--            <p>I took this photo this morning. What do you guys think?</p>--}}
                        {{--            <span class="label label-warning pull-right">$1800</span>--}}
                        {{--            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>--}}
                        {{--            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>--}}
                        {{--            <span class="pull-right text-muted">127 likes - 3 comments</span>--}}
                    </div>
                    <div class="box-body">

                        <a href="javascript:void(0)" class="product-title">
                            <b>{{ $item->title or 'TITLE' }}</b>
                        </a>

                        <p>{!!  $item->description or 'description' !!}</p>
{{--                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>--}}
{{--                        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>--}}
{{--                        <span class="pull-right text-muted">127 likes - 3 comments</span>--}}
                    </div>
                    <div class="box-footer">
                        <span class="label label-warning pull-right margin-right-4px">5件起批</span>
                        <span class="label label-danger pull-right margin-right-4px">99元/件</span>
                    </div>
                </div>
            </div>
            @endfor
            </div>

            <footer class="module-footer-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">
                        <a href="http://local-keron.com/quote" class="btn btn-lg btn-block btn-ghost btn-ghost-white" role="button">
                            咨询报价
                        </a>
                    </p>
                </div>
            </footer>

        </div>
    </section>


    {{--上下结构--}}
    <section class="module-container module-wrapper module-bg-orange">
        <div class="container">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>最新产品</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span>欢迎来看我们的最新产品</span>
                </div>
            </header>

            <div class="module-body-container text-center">
                @for ($i = 0; $i < 4; $i++)
                    <div class="item-piece col-xs-12 col-sm-6 col-md-6 col-lg-6">
                        <div class="box box-widget pull-left text-center">

                            <div class="box-header with-border _none">
                                <div class="user-block">
                                    <img class="img-circle" src="/custom/gh/images/slider/1.jpg" alt="User Image">
                                    <span class="username"><a href="#">Jonathan Burke Jr.</a></span>
                                    <span class="description">Shared publicly - 7:30 PM Today</span>
                                </div>
                                <!-- /.user-block -->
                                <div class="box-tools">
                                    <button type="button" class="btn btn-box-tool" data-toggle="tooltip" title="Mark as read">
                                        <i class="fa fa-circle-o"></i></button>
                                    <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                                    </button>
                                    <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
                                </div>
                                <!-- /.box-tools -->
                            </div>
                            <!-- /.box-header -->

                            <div class="box-body" style="padding:8px;">
                                <img src="{{ url('/resource/custom/gh/images/slider/1.jpg') }}" alt="Product Image">

{{--                                <p>I took this photo this morning. What do you guys think?</p>--}}
{{--                                <span class="label label-warning pull-right">$1800</span>--}}
{{--                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>--}}
{{--                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>--}}
{{--                                <span class="pull-right text-muted">127 likes - 3 comments</span>--}}
                            </div>

                            <div class="box-body">

                                <a href="javascript:void(0)" class="product-title">
                                    <b>{{ $item->title or 'TITLE' }}</b>
                                </a>

{{--                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>--}}
{{--                                <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>--}}
{{--                                <span class="pull-right text-muted">127 likes - 3 comments</span>--}}
                            </div>

                            <div class="box-footer" style="padding:12px 0;">
                                <p>{!!  $item->description or 'description' !!}</p>
                            </div>

                        </div>
                    </div>
                @endfor
            </div>

            <footer class="module-footer-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">
                        <a href="http://local-keron.com/quote" class="btn btn-lg btn-block btn-ghost btn-ghost-white" role="button">
                            更多产品
                        </a>
                    </p>
                </div>
            </footer>

        </div>
    </section>


    {{--模板--}}
    <section class="module-container module-wrapper module-bg-blue">
        <div class="container">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>模板</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span>模板</span>
                </div>
            </header>

            <div class="module-body-container text-center">
            </div>

            <footer class="module-footer-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">
                        <a href="http://local-keron.com/quote" class="btn btn-lg btn-block btn-ghost btn-ghost-white" role="button">
                            更多产品
                        </a>
                    </p>
                </div>
            </footer>

        </div>
    </section>


    {{--客户--}}
    <section class="module-container module-wrapper module-bg-orange">
        <div class="container">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>我们的客户</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span></span>
                </div>
            </header>

            <div class="module-body-container text-center">
                <div class="cooperation-container">
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-09/5b6bb29c337741533784732.png" alt="阿里影视">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b6996743e66f1533646452.png" alt="阿里云">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b69966753ac81533646439.png" alt="京东">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b6996411f70f1533646401.png" alt="cooperation-11">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b6995f127ae61533646321.png" alt="cooperation-9">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b6995ca49f251533646282.png" alt="cooperation-6">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b69951b8c9a61533646107.png" alt="cooperation-5">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b6995079aa851533646087.png" alt="cooperation-4">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="http://softorg.cn">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b6886824b7bc1533576834.png" alt="cooperation-4">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b688677ea0281533576823.png" alt="cooperation-2">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/research/common/2018-08-07/5b68866abbcc71533576810.png" alt="cooperation-1">
                            </a>


                        </div>
                    </div>
                    <div class="cooperation-item col-md-3 probootstrap-box-" role="button">
                        <div class="cooperation-item-box pulse">
                            <a target="_blank" href="javascript:void(0);">
                                <img class="" src="http://cdn.local-keron.com/outside/unique/items/cover_item_405759070650.jpg" alt="资讯测试2">
                            </a>


                        </div>
                    </div>
                </div>
            </div>

            <footer class="module-footer-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">
                        <a href="http://local-keron.com/quote" class="btn btn-lg btn-block btn-primary" role="button">
                            查看全部
                        </a>
                    </p>
                </div>
            </footer>

        </div>
    </section>





    {{--常见问题--}}
    <section class="module-container module-wrapper module-bg-blue- bg-light">
        <div class="container">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>模板</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span>模板</span>
                </div>
            </header>

            <div class="module-body-container text-center">

                <div class="box box-success box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">问题1</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        The body of the box
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-success box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">fqa</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        The body of the box
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-default box-solid collapsed-box">
                    <div class="box-header with-border">
                        <h3 class="box-title">Expandable</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-plus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body" style="display: none;">
                        The body of the box
                    </div>
                    <!-- /.box-body -->
                </div>
                <div class="box box-warning box-solid">
                    <div class="box-header with-border">
                        <h3 class="box-title">Collapsable</h3>

                        <div class="box-tools pull-right">
                            <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                            </button>
                        </div>
                        <!-- /.box-tools -->
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        The body of the box
                    </div>
                    <!-- /.box-body -->
                </div>

            </div>

            <footer class="module-footer-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">
                        <a href="http://local-keron.com/quote" class="btn btn-lg btn-block btn-ghost btn-ghost-white" role="button">
                            更多产品
                        </a>
                    </p>
                </div>
            </footer>

        </div>
    </section>




    <section class="module-container module-wrapper" style="background:url(http://cdn.local-keron.com/research/common/2018-08-16/5b745acd0edb71534352077.jpg)">
        <div class="container container-full">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>视频展示</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span>观看搬家仓储视频，了解我们的一站式搬家服务流程</span>
                </div>
            </header>


            <div class="module-body-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">

                        <a class="btn btn-ghost btn-ghost-white btn-lg btn-block lightcase-video- _none" data-rel="lightcase" role="button" href="https://player.youku.com/embed/XMjQ4NTk0NDYyMA==">
                            <i class="fa fa-play-circle-o" style="font-size:64px;"></i>
                        </a>
                        <a class="btn btn-ghost btn-ghost-white btn-lg btn-block lightcase-video- _none" data-rel="lightcase" role="button" href="" data-lc-options="{width:640, height:336, autoplay:false}" data-lc-href="http://cdn.local-keron.com/videos/KERON_ZH.mp4">
                            <i class="fa fa-play-circle-o" style="font-size:64px;"></i>
                        </a>


                        <a class="btn btn-ghost btn-ghost-white btn-lg btn-block _none" data-fancybox-="" data-width="640" data-height="336" href="http://cdn.local-keron.com/videos/KERON_ZH.mp4">
                            <i class="fa fa-play-circle-o" style="font-size:64px;"></i>
                        </a>
                        <a class="btn btn-ghost btn-ghost-white btn-lg btn-block" data-fancybox="" href="#myVideo">
                            <i class="fa fa-play-circle-o" style="font-size:64px;"></i>
                        </a>
                        <video width="720" height="416" controls="" id="myVideo" style="display:none;">
                            <source src="http://cdn.local-keron.com/videos/KERON_ZH.mp4" type="video/mp4">
                        </video>

                    </p>
                </div>
            </div>

            <footer class="module-footer-container text-center">
                <div class="wow slideInUp Upcol-md-4 col-md-offset-4">
                </div>
            </footer>

        </div>
    </section>

    <section class="module-container module-wrapper" style="background:url(http://cdn.local-keron.com/research/common/2018-08-10/5b6cdde0c1beb1533861344.jpg)">
        <div class="container container-full">

            <header class="module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line module-title title-white">
                    <b>常见问题解答</b>
                </div>
                <div class="wow slideInRight module-subtitle-row module-title title-white">
                    <span>您想问的，很可能就在这里</span>
                </div>
            </header>


            <div class="module-body-container text-center">
                <div class="wow slideInUp col-md-4 col-md-offset-4">
                    <p class="text-center">
                        <a href="http://local-keron.com/faqs" class="btn btn-ghost btn-ghost-white btn-lg btn-block" role="button">
                            了解更多
                        </a>
                    </p>
                </div>
            </div>

            <footer class="module-row module-footer-container text-center">
                <a href="http://www.piano-lai.com/rent-out/list" class="view-more style-light">查看更多 <i class="fa fa-hand-o-right"></i></a>
            </footer>

        </div>
    </section>

    
    <section class="module-container module-wrapper text-center bg-light module-video">
        <div class="container main-container">

            <header class="module-row module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line title-lg _bold" style="visibility: visible; animation-name: slideInLeft;">视频教程</div>
                <div class="wow slideInRight module-subtitle-row title-sm" style="visibility: visible; animation-name: slideInRight;">
                    钢琴入门教程
                    小汤一
                    第01讲
                </div>
            </header>

            <div class="module-row module-body-container">
                <div class="section-container- text-center">

                    <video width="720" height="auto" controls="true" controlslist="nodownload" autoplay="autoplay-" id="myVideo">
                        <source src="http://www.piano-lai.com/uploads/custom/videos/xiaotang01/xiaotang01_01.mp4" type="video/mp4">
                    </video>

                </div>
            </div>

            <div class="module-row module-body-container bg-white">
                <div class="section-container">

                    <figure class="text-container clearfix">
                        <div class="text-box clearfix text-center">
                            <span class="title-with-double-line border-light title-sm">钢琴入门教学 小汤一</span>
                        </div>
                        <div class="text-box clearfix">
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=01">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第01讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=02">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第02讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=03">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第03讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=04">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第04讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=05">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第05讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=06">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第06讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=07">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第07讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=08">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第08讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=09">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第09讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=10">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第10讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=11">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第11讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=12">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第12讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=13">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第13讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=14">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第14讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=15">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第15讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=16">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第16讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=17">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第17讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=18">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第18讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=19">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第19讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=20">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第20讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=21">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第21讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=22">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第22讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=23">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第23讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=24">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第24讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=25">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第25讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=26">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第26讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=27">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第27讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=28">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第28讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=29">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第29讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang01?id=30">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第30讲</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </figure>

                </div>
            </div>

            <div class="module-row module-body-container bg-white">
                <div class="section-container">

                    <figure class="text-container clearfix">
                        <div class="text-box clearfix text-center">
                            <span class="title-with-double-line border-light title-sm">钢琴入门教学 小汤二</span>
                        </div>
                        <div class="text-box clearfix">
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=01">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第01讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=02">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第02讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=03">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第03讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=04">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第04讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=05">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第05讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=06">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第06讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=07">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第07讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=08">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第08讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=09">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第09讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=10">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第10讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=11">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第11讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=12">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第12讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=13">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第13讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=14">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第14讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=15">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第15讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=16">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第16讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=17">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第17讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=18">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第18讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=19">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第19讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=20">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第20讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=21">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第21讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=22">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第22讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=23">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第23讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=24">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第24讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=25">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第25讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=26">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第26讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=27">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第27讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=28">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第28讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=29">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第29讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=30">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第30讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=31">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第31讲</span>
                                    </button>
                                </a>
                            </div>
                            <div class="col-lg-1 col-md-1 col-sm-2 col-xs-3 button-col">
                                <a href="http://www.piano-lai.com/course/xiaotang02?id=32">
                                    <button class="btn btn-default btn-3d" data-hover="点击查看">
                                        <span>第32讲</span>
                                    </button>
                                </a>
                            </div>
                        </div>
                    </figure>

                </div>
            </div>

            <div class="module-row module-body-container bg-f">
                <div class="section-container">

                    <figure class="text-container clearfix">
                        <div class="text-box clearfix text-center">
                            <span class="title-with-double-line border-light title-sm">钢琴入门教学 小汤三</span>
                        </div>
                        <div class="text-box clearfix">
                            <span>敬请期待</span>
                        </div>
                    </figure>

                </div>
            </div>


            <div class="module-row module-body-container">

                <section class="section-container bg-light bg-f">
                    <div class="row">

                        <header class="module-row module-header-container with-border-bottom text-center">
                            <div class="wow slideInLeft module-title-row title-md _bold" style="visibility: hidden; animation-name: none;">热门租琴</div>

                        </header>

                        <div class="module-row module-body-container">
                            <div class="col-lg-6 col-md-6 col-sm-6 item-col">
                                <a class="zoom- clearfix" target="_blank" href="http://www.piano-lai.com/item/2944">
                                    <div class="item-container model-left-right padding-8px bg-grey-f5">

                                        <figure class="image-container padding-top-1-4-">
                                            <div class="image-box">
                                                <img data-action="zoom-" src="http://gps.gps.com/resource/custom/gh/images/slider/1.jpg" alt="Property Image">

                                            </div>
                                        </figure>

                                        <figure class="text-container text-left">
                                            <div class="text-box">
                                                <div class="text-title-row">
                                                    <span class="_bold">yamaha  yus5</span>
                                                </div>
                                                <div class="text-description-row">
                                                    <div>
                                                        <span>租金：<i class="fa fa-cny"></i> <span class="color-red _bold">128元/月 或 256/月免押金</span></span>
                                                    </div>
                                                    <div>
                                                        <span>押金：<i class="fa fa-cny"></i> 80000 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>

                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 item-col">
                                <a class="zoom- clearfix" target="_blank" href="http://www.piano-lai.com/item/2943">
                                    <div class="item-container model-left-right padding-8px bg-grey-f5">

                                        <figure class="image-container padding-top-1-4-">
                                            <div class="image-box">
                                                <img data-action="zoom-" src="http://gps.gps.com/resource/custom/gh/images/slider/1.jpg" alt="Property Image">

                                            </div>
                                        </figure>

                                        <figure class="text-container text-left">
                                            <div class="text-box">
                                                <div class="text-title-row">
                                                    <span class="_bold">yamaha yus3</span>
                                                </div>
                                                <div class="text-description-row">
                                                    <div>
                                                        <span>租金：<i class="fa fa-cny"></i> <span class="color-red _bold">128元/月 或 256/月免押金</span></span>
                                                    </div>
                                                    <div>
                                                        <span>押金：<i class="fa fa-cny"></i> 50000 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>

                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 item-col">
                                <a class="zoom- clearfix" target="_blank" href="http://www.piano-lai.com/item/2942">
                                    <div class="item-container model-left-right padding-8px bg-grey-f5">

                                        <figure class="image-container padding-top-1-4-">
                                            <div class="image-box">
                                                <img data-action="zoom-" src="http://gps.gps.com/resource/custom/gh/images/slider/1.jpg" alt="Property Image">

                                            </div>
                                        </figure>

                                        <figure class="text-container text-left">
                                            <div class="text-box">
                                                <div class="text-title-row">
                                                    <span class="_bold">yamaha yus</span>
                                                </div>
                                                <div class="text-description-row">
                                                    <div>
                                                        <span>租金：<i class="fa fa-cny"></i> <span class="color-red _bold">128元/月 或 256/月免押金</span></span>
                                                    </div>
                                                    <div>
                                                        <span>押金：<i class="fa fa-cny"></i> 18000 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>

                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 item-col">
                                <a class="zoom- clearfix" target="_blank" href="http://www.piano-lai.com/item/2941">
                                    <div class="item-container model-left-right padding-8px bg-grey-f5">

                                        <figure class="image-container padding-top-1-4-">
                                            <div class="image-box">
                                                <img data-action="zoom-" src="http://gps.gps.com/resource/custom/gh/images/slider/1.jpg" alt="Property Image">

                                            </div>
                                        </figure>

                                        <figure class="text-container text-left">
                                            <div class="text-box">
                                                <div class="text-title-row">
                                                    <span class="_bold">yamaha UX300</span>
                                                </div>
                                                <div class="text-description-row">
                                                    <div>
                                                        <span>租金：<i class="fa fa-cny"></i> <span class="color-red _bold">128元/月 或 256/月免押金</span></span>
                                                    </div>
                                                    <div>
                                                        <span>押金：<i class="fa fa-cny"></i> 42000 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>

                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 item-col">
                                <a class="zoom- clearfix" target="_blank" href="http://www.piano-lai.com/item/2933">
                                    <div class="item-container model-left-right padding-8px bg-grey-f5">

                                        <figure class="image-container padding-top-1-4-">
                                            <div class="image-box">
                                                <img data-action="zoom-" src="http://gps.gps.com/resource/custom/gh/images/slider/1.jpg" alt="Property Image">

                                            </div>
                                        </figure>

                                        <figure class="text-container text-left">
                                            <div class="text-box">
                                                <div class="text-title-row">
                                                    <span class="_bold">yamaha u3</span>
                                                </div>
                                                <div class="text-description-row">
                                                    <div>
                                                        <span>租金：<i class="fa fa-cny"></i> <span class="color-red _bold">128元/月 或 256/月免押金</span></span>
                                                    </div>
                                                    <div>
                                                        <span>押金：<i class="fa fa-cny"></i> 12000 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>

                                    </div>
                                </a>
                            </div>

                            <div class="col-lg-6 col-md-6 col-sm-6 item-col">
                                <a class="zoom- clearfix" target="_blank" href="http://www.piano-lai.com/item/2932">
                                    <div class="item-container model-left-right padding-8px bg-grey-f5">

                                        <figure class="image-container padding-top-1-4-">
                                            <div class="image-box">
                                                <img data-action="zoom-" src="http://gps.gps.com/resource/custom/gh/images/slider/1.jpg" alt="Property Image">

                                            </div>
                                        </figure>

                                        <figure class="text-container text-left">
                                            <div class="text-box">
                                                <div class="text-title-row">
                                                    <span class="_bold">yamaha u2</span>
                                                </div>
                                                <div class="text-description-row">
                                                    <div>
                                                        <span>租金：<i class="fa fa-cny"></i> <span class="color-red _bold">128元/月 或 256/月免押金</span></span>
                                                    </div>
                                                    <div>
                                                        <span>押金：<i class="fa fa-cny"></i> 10000 </span>
                                                    </div>
                                                </div>
                                            </div>
                                        </figure>

                                    </div>
                                </a>
                            </div>

                        </div>

                        <footer class="module-row module-footer-container text-center">
                            <a href="http://www.piano-lai.com/rent-out/list" class="view-more">查看更多 <i class="fa fa-hand-o-right"></i></a>
                        </footer>

                    </div>
                </section>
            </div>

        </div>
    </section>


    <footer role="contentinfo" class="probootstrap-footer background-blue">
        <div class="site-footer">
            <div class="container">

                <div class="row mb60">
                    <div class="col-lg-12 col-md-12 section-heading probootstrap-animate-">
                        <h2 class="module-title title-white">联系我们</h2>

                    </div>
                </div>

                <div class="row">

                    <div class="col-md-4 _none">
                        <div class="probootstrap-footer-widget">
                            <h3><b>第三方合作</b></h3>
                            <p></p>
                            <p><a href="javascript:void(0);" class="link-with-icon _none-">Learn More <i class=" icon-chevron-right"></i></a></p>
                        </div>
                        <div class="probootstrap-footer-widget _non">
                            <h3>联系我们</h3>
                            <ul class="probootstrap-footer-social">
                                <li><a href=""><i class="icon-twitter"></i></a></li>
                                <li><a href=""><i class="icon-facebook"></i></a></li>
                                <li><a href=""><i class="icon-instagram2"></i></a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="probootstrap-footer-widget">
                            <h3><b>合作伙伴</b></h3>

                            <div class="col-xs-3 col-sm-2 col-md-3 partner-option">
                                <a target="_blank" href="javascript:void(0);" rel="nofollow">
                                    <figure>
                                        <div class="image-box"><img src="http://cdn.local-keron.com/research/common/2018-08-10/5b6d57ef591d01533892591.png" alt="360"></div>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-xs-3 col-sm-2 col-md-3 partner-option">
                                <a target="_blank" href="javascript:void(0);" rel="nofollow">
                                    <figure>
                                        <div class="image-box"><img src="http://cdn.local-keron.com/research/common/2018-08-10/5b6d57db6cf4c1533892571.png" alt="sogou"></div>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-xs-3 col-sm-2 col-md-3 partner-option">
                                <a target="_blank" href="javascript:void(0);" rel="nofollow">
                                    <figure>
                                        <div class="image-box"><img src="http://cdn.local-keron.com/research/common/2018-08-10/5b6d57ac92c9c1533892524.png" alt="guge"></div>
                                    </figure>
                                </a>
                            </div>
                            <div class="col-xs-3 col-sm-2 col-md-3 partner-option">
                                <a target="_blank" href="http://baidu.com" rel="nofollow">
                                    <figure>
                                        <div class="image-box"><img src="http://cdn.local-keron.com/research/common/2018-08-10/5b6d4e95d63611533890197.png" alt="baidu"></div>
                                    </figure>
                                </a>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="probootstrap-footer-widget">
                            <h3><b>微信公众号</b></h3>

                            <ul class="probootstrap-product-list">
                                <li class="mb10">
                                    <div class="text">
                                        <b><i class="fa fa-qrcode" style="visibility:hidden-;"></i></b> &nbsp;&nbsp;
                                        <span><img src="http://local-keron.com/custom/images/wechat.png" alt="Wechat Qrcode" style="height:120px;"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="probootstrap-footer-widget _non">
                            <h3><b>关注我们</b></h3>

                            <ul class="probootstrap-footer-social _none">
                                <li><a href=""><i class="icon-twitter"></i></a></li>
                                <li><a href=""><i class="icon-facebook"></i></a></li>
                                <li><a href=""><i class="icon-instagram2"></i></a></li>
                                <li><a href=""><i class="icon-twitter"></i></a></li>
                                <li><a href=""><i class="icon-facebook"></i></a></li>
                                <li><a href=""><i class="icon-instagram2"></i></a></li>
                            </ul>

                            <div class="footer-social">

                                <a rel="nofollow" target="_blank" href="http://www.wechat.com">
                                    <img src="http://local-keron.com/common/images/logo-icon/icon-logo-wechat.png" alt="WeChat Logo">
                                </a>
                                <a rel="nofollow" target="_blank" href="http://www.linkedin.com/company/keron-international-relocation-movers/">
                                    <img src="http://local-keron.com/common/images/logo-icon/icon-logo-linkedin.png" alt="Linkedin Logo">
                                </a>
                                <a rel="nofollow" target="_blank" href="https://moveaide.com/movers/keron-international-relocation-shanghai-china-mover-reviews">
                                    <img src="http://local-keron.com/common/images/logo-icon/icon-logo-moveaide.png" alt="MoveAide Logo">
                                </a>
                                <a rel="nofollow" target="_blank" href="http://www.smartshanghai.com/venue/15561/keron_international_relocation_and_movers_zhongshan_bei_lu">
                                    <img src="http://local-keron.com/common/images/logo-icon/icon-logo-smart.png" alt="Instagram Logo">
                                </a>
                                <a rel="nofollow" target="_blank" href="http://www.thatsmags.com/shanghai/directory/1795108/keron-international-relocation-and-movers">
                                    <img src="http://local-keron.com/common/images/logo-icon/icon-logo-thats.png" alt="Thatsmags Logo">
                                </a>
                                <a rel="nofollow" target="_blank" href="https://v.youku.com/v_show/id_XMjQ4NTk0NDYyMA==.html">
                                    <img src="http://local-keron.com/common/images/logo-icon/icon-logo-youku.png" alt="Youku Logo">
                                </a>
                                <a rel="nofollow" target="_blank" href="https://www.baidu.com/">
                                    <img src="http://local-keron.com/common/images/logo-icon/icon-logo-baidu.png" alt="Baidu Logo">
                                </a>




                            </div>
                        </div>
                    </div>

                    <div class="col-md-4">
                        <div class="probootstrap-footer-widget">
                            <h3><b>联系方式</b></h3>

                            <ul class="probootstrap-product-list">
                                <li class="mb10">
                                    <div class="text">
                                        <b><i class="fa fa-location-arrow"></i></b> &nbsp;&nbsp;
                                        <span>上海市普陀区中山北路1958号2608室</span>
                                    </div>
                                </li>
                                <li class="mb10">
                                    <div class="text">
                                        <b><i class="fa fa-phone"></i></b> &nbsp;&nbsp;

                                        <span>4008-215-527</span>
                                    </div>
                                </li>
                                <li class="mb10">
                                    <div class="text">
                                        <b><i class="fa fa-envelope"></i></b> &nbsp;&nbsp;

                                        <span>mail@keronmoving.com</span>
                                    </div>
                                </li>
                                <li class="mb10">
                                    <div class="text">
                                        <b><i class="fa fa-weixin"></i></b> &nbsp;&nbsp;
                                        <span>KERONwechat</span>
                                    </div>
                                </li>
                                <li class="mb10">
                                    <div class="text">
                                        <b><i class="fa fa-globe"></i></b> &nbsp;&nbsp;
                                        <span>www.keron-relo.com</span>
                                    </div>
                                </li>
                                <li class="mb10 _none">
                                    <div class="text">
                                        <b><i class="fa fa-weixin"></i></b> &nbsp;&nbsp;
                                        <span><img src="http://local-keron.com/custom/images/wechat.png" alt="Wechat_Qrcode" style="height:120px;"></span>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>

                </div>

            </div>
        </div>
        <div class="site-footer-bottom">
            <div class="container">
                <div class="row mt20 mb20">
                    <div class="col-md-12 text-center">
                        <div>
                            <small> Copyright©2018.  KERON All Rights Reserved.</small><br>
                        </div>
                        <div>
                            <small>
                                <span>上海一站式搬家</span> |
                                <span>企业搬迁</span> |
                                <span>国际货运物流</span> |
                                <span>厂房搬迁</span> |
                                <span>仓储物流</span> |
                                <span>上门打包搬家公司</span>
                            </small>
                        </div>
                        <div>
                            <a target="_blank" href="https://beian.miit.gov.cn" style="color:#ccc;"><small>沪ICP备20018423号</small></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </footer>



</div>
@endsection


@section('js')
<script>
    $(function() {
    });
</script>
@endsection
