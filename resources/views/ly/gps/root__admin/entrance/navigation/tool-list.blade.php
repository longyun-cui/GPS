@extends(env('TEMPLATE_LY_GPS__ADMIN').'layout.layout')


@section('head_title')
    @if(in_array(env('APP_ENV'),['local','dev'])){{ $local or 'L.' }}@endif
    {{ $title_text or 'GPS' }} - 导航系统
@endsection




@section('header','')
@section('description'){{ $title_text or 'GPS' }} - 导航系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">
    <div class="row">



        {{--testing--}}
        <div class="col-xs-12 col-sm-6 col-md-4">
            <div class="box box-info box-solid">
                <div class="box-header with-border">
                    <h3 class="box-title comprehensive-month-title">testing</h3>
                    <div class="box-tools pull-right">
                        <button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
                        </button>
                    </div>
                </div>
                <div class="box-body">
                    {{--密码--}}
                    <div class="form-group">
                        <div class="col-md-12">
                            <h4 class="box-title">密码加密 password_hash(md5($str),PASSWORD_BCRYPT);</h4>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <div><input type="text" class="form-control" placeholder="请输入待加密的密码" id="password"></div>
                        </div>
                        <div class="col-md-12">
                            <div><input type="text" class="form-control" placeholder="结果" id="password-encode-result"></div>
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-md-12">
                            <button type="button" class="btn btn-sm btn-primary" id="tool-password-encode-submit"><i class="fa fa-check"></i> 提交</button>
                            <button type="button" class="btn btn-sm btn-default" onclick="history.go(-1);">返回</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>



    </div>
</div>
@endsection


@section('js')
<script>
    $(function() {

        // 生成密码
        $("#tool-password-encode-submit").on('click', function() {
            var url = '/admin/tool/password_encode';
            $.post(
                url,
                {
                    _token:$('meta[name="_token"]').attr('content'),
                    type:"password_encode",
                    password:$("#password").val()
                },
                function(data){
                    if(data.success){
                        layer.msg(data.msg);
                        $("#password-encode-result").val(data.data.password_encode);
                    } else {
                        layer.msg(2);
                    }
            }, 'json');
        });

    });
</script>
@endsection