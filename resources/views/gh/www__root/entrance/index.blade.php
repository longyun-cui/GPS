@extends(env('TEMPLATE_GH_WWW').'layout.layout')


@section('head_title')
    {{ $title_text or "GH' Wardrobe" }}
@endsection




@section('header','')
@section('description'){{ $title_text or '首页' }} - {{ config('gh.info.info.name') }}@endsection
@section('breadcrumb')
{{--    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>--}}
@endsection
@section('content')
<div class="full-container">

    <div class="banner-container main-slider-wrapper clearfix margin-bottom-16px">
        <div class="banner-slider-container">
            <div class="banner-slider-box" id="main-slider">
{{--                <div class="swiper-slide"><img src="{{ url('/common/images/banner1.jpg') }}" alt="Slide"></div>--}}
                <div class="slide"><img src="{{ url('/custom/gh/images/slider/1.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/custom/gh/images/slider/2.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/custom/gh/images/slider/3.jpg') }}" alt="Slide"></div>
                <div class="slide"><img src="{{ url('/custom/gh/images/slider/4.jpg') }}" alt="Slide"></div>
            </div>
        </div>
        <div id="slider-contents">
            <div class="container text-center">
                <div class="jumbotron">
                    <div class="padding-8px title-xl color-f _bold">{{ config('gh.info.info.company_name') }}</div>
                    <div class="contents clearfix"></div>
{{--                    <div class="contents clearfix">--}}
{{--                    <p class="font-24px"><b>{{ config('gh.info.info.company_slogan') }}</b></p>--}}
{{--                    </div>--}}
                    <a class="btn btn-warning btn-lg btn-3d" data-hover="联系我们" href="{{ url('/contact') }}" role="button">联系我们</a>
                    <a class="btn btn-default btn-border btn-lg" href="javascript:void(0);" role="button">Get a Quote</a>
                </div>
            </div>
        </div>
    </div>


    <div class="box box-primary _none-">
        <div class="box-header with-border">
            <h3 class="box-title">最新产品</h3>

            <div class="box-tools pull-right _none">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <div class="box-body">
            <ul class="products-list product-list-in-box">
                @include(env('TEMPLATE_GH_WWW').'component.product-list', ['item_list'=>$item_list])
            </ul>
        </div>
        <div class="box-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View All Products</a>
        </div>
    </div>


    <div class="module-container text-center bg-light margin-bottom-16px">
        <div class="container full-container">

            <header class="module-row module-header-container text-center">
                <div class="wow slideInLeft module-title-row title-with-double-line title-lg" style="visibility: visible; animation-name: slideInLeft;"><b>最新产品</b></div>
                <div class="wow slideInRight module-subtitle-row title-sm" style="visibility: visible; animation-name: slideInRight;"></div>
            </header>
            @include(env('TEMPLATE_GH_WWW').'component.product-list-2', ['item_list'=>$item_list])
        </div>
    </div>


    <div class="module-container text-center bg-dark margin-bottom-16px">
        @include(env('TEMPLATE_GH_WWW').'section.qr_code')
    </div>




</div>
@endsection


@section('js')
<script>
    $(function() {
    });
</script>
@endsection
