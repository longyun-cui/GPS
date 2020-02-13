{{--<!-- START: module-service -->--}}
<section class="module-container bg-light" id="service-section">
    <div class="container main-container">

        <header class="module-row module-header-container text-center">
            <div class="wow slideInLeft module-title-row title-with-double-line title-md"><b>左右结构 Root-Service-List</b></div>
            <div class="wow slideInRight module-subtitle-row title-sm">description-1</div>
        </header>

        <div class="module-row module-body-container">
            @foreach($items as $v)
                @if($loop->index < 2)
                <div class="row item-left-right-style">
                    <div class="col-md-6 col-sm-6 image-container">
                        <div class="image-box" role="button">
                            <img class="grow" src="{{ config('common.host.'.env('APP_ENV').'.cdn').'/'.$v->cover_pic }}" alt="Images">
                        </div>
                    </div>
                    <div class="col-md-6 col-sm-6 text-container">
                        <div class="text-box">
                            <div class="text-title-row title-sm color-blue"><a href="javascript:void(0);"><b>{{ $v->title or '' }}</b></a></div>
                            <div class="text-description-row"> {{ $v->subtitle or '' }} </div>
                            <a href="javascript:void(0);" class="btn btn-flat btn-primary">了解更多</a>
                        </div>
                    </div>
                </div>
                @endif
            @endforeach
        </div>

        <footer class="module-row module-footer-container text-center">
            <a href="{{ url('/rent-out/list') }}" class="view-more style-dark">查看更多 <i class="fa fa-hand-o-right"></i></a>
        </footer>

    </div>
</section>
{{--<!-- END: module-service -->--}}