@extends(env('TEMPLATE_ZY_ADMIN').'layout.layout')


@section('head_title','管理员系统-兆益信息')




@section('header','Admin')
@section('description','管理员系统 - 兆益信息')
@section('breadcrumb')
    <li><a href="{{ url('/admin') }}"><i class="fa fa-dashboard"></i>首页</a></li>
    <li><a href="#"><i class="fa "></i>Here</a></li>
@endsection
@section('content')
    admin.index
@endsection




@section('custom-script')
<script>
    $(function() {
    });
</script>
@endsection