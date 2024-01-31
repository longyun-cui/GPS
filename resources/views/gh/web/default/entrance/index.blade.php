@extends(env('TEMPLATE_GH_WEB_DEF').'layout.layout')


@section('head_title')
    {{ $title_text or "GH' Wardrobe" }}
@endsection




@section('header','')
@section('description'){{ $title_text or '首页' }} - {{ config('gh.info.info.name') }}@endsection
@section('breadcrumb')
{{--    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>--}}
@endsection
@section('content')
<div class="container" style="margin-top:50px; padding-bottom:50px;">

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

    <div class="box box-primary">
        <div class="box-header with-border">
            <h3 class="box-title">最新产品</h3>

            <div class="box-tools pull-right _none">
                <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                </button>
                <button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
            </div>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <ul class="products-list product-list-in-box">
                @include(env('TEMPLATE_GH_WEB_DEF').'component.product-list', ['item_list'=>$item_list])
            </ul>
        </div>
        <!-- /.box-body -->
        <div class="box-footer text-center">
            <a href="javascript:void(0)" class="uppercase">View All Products</a>
        </div>
        <!-- /.box-footer -->
    </div>


    @include(env('TEMPLATE_GH_WEB_DEF').'component.product-list-2', ['item_list'=>$item_list])

    @include(env('TEMPLATE_GH_WEB_DEF').'section.qr_code')

</div>
@endsection


@section('js')
<script>
    $(function() {
    });
</script>
@endsection
