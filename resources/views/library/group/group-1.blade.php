{{--house-detail--}}
<div class="module-container" id="property-single">
    <div class="container main-container">

            {{--头部信息--}}
            @include('library.module.section-header-info', ['data'=>$data])

            {{--基本信息--}}
            @include('library.module.section-information', ['data'=>$data])

            {{--最新动态--}}
            {{--@include('library.module.section-recent-news', ['data'=>$data])--}}

            {{--图片展示--}}
            {{--@include('library.module.section-images', ['data'=>$data])--}}

            {{--图文详情--}}
            @include('library.module.section-detail', ['data'=>$data,'title_is'=>0])

            {{--视频展示--}}
            {{--@include('library.module.section-video')--}}

            {{--地图--}}
            {{--@include('library.module.section-map')--}}

            {{--经纪人--}}
            {{--@include('library.module.section-agent')--}}

            @include('library.module.section-block-bar', ['items'=>$items])

    </div>
</div>