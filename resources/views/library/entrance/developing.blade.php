@extends('library.layout.layout')


{{--html.head--}}
@section('head_title') 【GPS】developing @endsection
@section('meta_author')@endsection
@section('meta_title')@endsection
@section('meta_description')@endsection
@section('meta_keywords')@endsection



{{--header--}}
@section('component-header')
    @include('library.component.header')
@endsection


{{--footer--}}
@section('component-footer')
    @include('library.component.footer')
@endsection




{{--custom-content--}}
@section('custom-content')

    {{--banner--}}
    @include('library.component.banner-for-root')

    <div class="page-root">


        @include('library.module.module-product-1', ['items'=>$items])

        @include('library.module.module-product-2', ['items'=>$items])

        @include('library.module.module-block-bar', ['items'=>$items])

        @include('library.module.module-left-right', ['items'=>$items])

        @include('library.module.module-article-list', ['items'=>$items])

        @include('library.module.module-recycle')

        @include('library.module.module-advantage-1')

        @include('library.module.module-coverage', ['items'=>$items])

        @include('library.module.module-qrcode')

        @include('library.module.module-client-1')


        @include('library.group.group-1', ['data'=>$item,'items'=>$items])


    </div>

@endsection




{{--style--}}
@section('custom-style')
<style>
</style>
@endsection




{{--style--}}
@section('custom-script')
<script>
</script>
@endsection