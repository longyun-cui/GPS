@extends(env('TEMPLATE_GH_WEB_DEF').'layout.layout')


@section('head_title')
    {{ $title_text or '产品详情' }} - {{ config('gh.info.info.name') }}
@endsection




@section('header','')
@section('description'){{ $title_text or '产品详情' }} - {{ config('gh.info.info.name') }}@endsection
@section('breadcrumb')
{{--    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>--}}
@endsection
@section('content')
<div class="container" style="margin-top:50px; padding-bottom:50px;">

    <div class="box box-primary">
        <div class="box-header with-border" style="text-align:center;">
            <h2 class="box-title">{{ $item->title or '' }}</h2>
        </div>
        <!-- /.box-header -->
        <div class="box-body">
            <strong class="text-red">

                <span class="label label-danger">
                    <i class="fa fa-rmb"></i>
                    {{ $item->wholesale_price or '' }}/{{ $item->wholesale_amout or '' }}起批
                </span>

            </strong>

{{--            <p class="text-muted">--}}
{{--                B.S. in Computer Science from the University of Tennessee at Knoxville--}}
{{--            </p>--}}

            <hr>

            <p class="text-muted">
                {{ $item->description or '' }}
            </p>


            <hr>

{{--            <strong><i class="fa fa-map-marker margin-r-5"></i> Location</strong>--}}

{{--            <p class="text-muted">Malibu, California</p>--}}

            {!! $item->content or '' !!}

            <hr>

            <strong><i class="fa fa-pencil margin-r-5"></i> Skills</strong>

            <p>
                <span class="label label-danger">UI Design</span>
                <span class="label label-success">Coding</span>
                <span class="label label-info">Javascript</span>
                <span class="label label-warning">PHP</span>
                <span class="label label-primary">Node.js</span>
            </p>

            <hr>

            <strong><i class="fa fa-file-text-o margin-r-5"></i> Notes</strong>

            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
        </div>
        <!-- /.box-body -->
    </div>



    @include(env('TEMPLATE_GH_WEB_DEF').'section.qr_code')


</div>
@endsection


@section('js')
<script>
    $(function() {
    });
</script>
@endsection
