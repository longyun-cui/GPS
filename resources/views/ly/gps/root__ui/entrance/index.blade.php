@extends(env('TEMPLATE_LY_GPS__UI').'layout.layout')


{{--html.head--}}
@section('head_title')ui @endsection
@section('meta_author')@endsection
@section('meta_title')@endsection
@section('meta_description')@endsection
@section('meta_keywords')@endsection




{{--header--}}
@section('component-header')
    @include(env('TEMPLATE_LY_GPS__UI').'component.header')
@endsection


{{--footer--}}
@section('component-footer')
    @include(env('TEMPLATE_LY_GPS__UI').'component.footer')
@endsection


{{--custom-content--}}
@section('custom-content')

    {{--banner--}}
    @include(env('TEMPLATE_LY_GPS__UI').'component.banner-for-root')

    <div class="page-root">


        @include(env('TEMPLATE_LY_GPS__UI').'module.module-1-0', ['data'=>$items])
        @include(env('TEMPLATE_LY_GPS__UI').'module.module-product-1-1', ['items'=>$items])
        @include(env('TEMPLATE_LY_GPS__UI').'module.module-product-1-2', ['items'=>$items])

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-product-2-1', ['items'=>$items])
        @include(env('TEMPLATE_LY_GPS__UI').'module.module-product-2-2', ['items'=>$items])

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-faq-1', ['items'=>$items])

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-block-bar', ['items'=>$items])

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-left-right', ['items'=>$items])

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-article-list', ['items'=>$items])

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-recycle')

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-advantage-1')
        @include(env('TEMPLATE_LY_GPS__UI').'module.module-advantage-2')

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-coverage', ['items'=>$items])

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-qrcode')
        @include(env('TEMPLATE_LY_GPS__UI').'module.module-video')

        @include(env('TEMPLATE_LY_GPS__UI').'module.module-client-1')


        @include(env('TEMPLATE_LY_GPS__UI').'group.group-1', ['data'=>$item,'items'=>$items])


    </div>

@endsection




@section('custom-css')
    <link rel="stylesheet" href="/template-library/jiaoben2806/css/bellows.css">
    <link rel="stylesheet" href="/template-library/jiaoben2806/css/bellows-theme.css">
    {{--<link rel="stylesheet" href="/template-library/jiaoben2806/css/main.css">--}}
@endsection
@section('custom-style')
<style>
</style>
@endsection




@section('custom-js')
    <script src="/template-library/jiaoben2806/js/highlight.pack.js"></script>
    <script src="/template-library/jiaoben2806/js/velocity.min.js"></script>
    <script src="/template-library/jiaoben2806/js/bellows.js"></script>
@endsection
@section('custom-script')
<script>
    $(function() {

        $('.bellows').bellows();

    });
</script>
@endsection