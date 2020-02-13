{{--main--}}
<section class="module-container bg-dark bg-blue-1" id="">
    <div class="container main-container">

        <header class="module-row module-header-container text-center">
            <div class="wow slideInLeft module-title-row title-with-double-line title-md _blod">Section-Left-Right-Bar</div>
            <div class="wow slideInRight module-subtitle-row title-sm">Description-Left-Right-Bar</div>
        </header>

        <div class="module-row module-body-container">
            @foreach($items as $v)
                <div class="col-lg-6 col-md-4 col-sm-6 item-col" >
                    <a class="zoom- clearfix" target="_blank" href="{{ url('/item/'.$v->id) }}">
                        <div class="item-container model-left-right padding-8px bg-grey-f5">

                            <figure class="image-container">
                                <div class="image-box">
                                    <img data-action="zoom-" src="{{ config('common.host.'.env('APP_ENV').'.cdn').'/'.$v->cover_pic }}" alt="Property Image">
                                    {{--<span class="btn btn-warning">热销中</span>--}}
                                </div>
                            </figure>

                            <figure class="text-container">
                                <div class="text-box">
                                    <div class="text-title-row multi-ellipsis-2"><b>{{ $v->title or '' }}</b></div>
                                    <div class="text-description-row">
                                        <div class="row-sm">
                                            租金：<i class="fa fa-cny"></i> <span class="color-red"><b>{{ $v->custom->price or '' }}</b></span>
                                        </div>
                                        <div class="row-md">
                                            <span>押金：<i class="fa fa-cny"></i>123</span>
                                            <span><i class="fa fa-share-alt"></i>1468</span>
                                            <span><i class="fa fa-star"></i>560</span>
                                        </div>
                                    </div>
                                </div>
                            </figure>

                        </div>
                    </a>
                </div>
            @endforeach
        </div>

        <footer class="module-row module-footer-container text-center">
            <a href="{{ url('/rent-out/list') }}" class="view-more style-light">查看更多 <i class="fa fa-hand-o-right"></i></a>
        </footer>

    </div>
</section>