@extends(env('TEMPLATE_ZY_SUPER').'layout.layout')


@section('head_title','【S】兆益信息-超级管理员系统')




@section('header','Super')
@section('description','超级管理员系统 - 兆益信息')
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
