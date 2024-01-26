@foreach($item_list as $item)
<div class="box box-widget">
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
        <img src="{{ url(env('DOMAIN_CDN').'/'.$item->cover_pic) }}" alt="Product Image">

        {{--            <p>I took this photo this morning. What do you guys think?</p>--}}
        {{--            <span class="label label-warning pull-right">$1800</span>--}}
        {{--            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>--}}
        {{--            <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>--}}
        {{--            <span class="pull-right text-muted">127 likes - 3 comments</span>--}}
    </div>
    <div class="box-body">

        <a href="javascript:void(0)" class="product-title">
            {{ $item->title or 'TITLE' }}
        </a>

        <p>I took this photo this morning. What do you guys think?</p>
        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-share"></i> Share</button>
        <button type="button" class="btn btn-default btn-xs"><i class="fa fa-thumbs-o-up"></i> Like</button>
{{--        <span class="pull-right text-muted">127 likes - 3 comments</span>--}}
        <span class="label label-warning pull-right">
                {{ $item->wholesale_price or '' }}元 /{{ $item->wholesale_amount or '' }}件 起批
        </span>
    </div>
</div>
@endforeach