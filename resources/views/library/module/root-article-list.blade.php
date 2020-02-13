{{--最新资讯--}}
<section class="module-container bg-light bg-grey">
    <div class="container main-container">

        <header class="module-row module-header-container text-center">
            <div class="wow slideInLeft module-title-row title-with-double-line title-md _bold">Article-list</div>
            <div class="wow slideInRight module-subtitle-row title-sm">Article-description</div>
        </header>

        <div class="module-row module-body-container section-block-container bg-white">

            <div>
                <div class="col-lg-4 col-md-4 col-sm-6 item-col">
                    <section class="section-container article-image-container">
                        <img data-action="zoom-" src="http://cdn.local-yunfei.com/research/common/2018-07-06/5b3f7d157ecfc1530887445.jpg" alt="Property Image">
                    </section>
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 item-col">
                    @include('library.section.section-article-list-1', ['items'=>$items])
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 item-col">
                    @include('library.section.section-article-list-2', ['items'=>[]])
                </div>
            </div>

            <div>
                <div class="col-lg-4 col-md-4 col-sm-6 item-col">
                    @include('library.section.section-article-list-1', ['items'=>$items])
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 item-col">
                    @include('library.section.section-article-list-2', ['items'=>$items])
                </div>
                <div class="col-lg-4 col-md-4 col-sm-6 item-col">
                    @include('library.section.section-article-list-2', ['items'=>$items])
                </div>
            </div>

        </div>

    </div>
</section>