@extends(env('TEMPLATE_LY_GPS__ADMIN').'layout.layout')


@section('head_title')
    @if(in_array(env('APP_ENV'),['local','dev'])){{ $local or 'L.' }}@endif
    {{ $title_text or '测试' }} - GPS
@endsection




@section('header','')
@section('description') {{ $title_text or '测试' }} - GPS系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">


</div>
@endsection




@section('custom-css')
@endsection
@section('custom-style')
@endsection



@section('custom-js')
@endsection
@section('custom-script')
<script>
    $(function() {
        console.log('testing');

    });
</script>
@endsection