@extends(env('TEMPLATE_RZK_WEB_ADMIN').'layout.layout')


@section('head_title')
    {{ $title_text or '模块编辑' }} - 管理员系统 - {{ config('rzk.info.info.short_name') }}
@endsection




@section('header','')
@section('description')管理员系统 - {{ config('rzk.info.info.short_name') }}@endsection
@section('breadcrumb')
    <li><a href="{{ url('/admin') }}"><i class="fa fa-home"></i>首页</a></li>
    <li><a href="{{ url($list_link) }}"><i class="fa fa-list"></i>{{ $list_text or '产品列表' }}</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN PORTLET-->
        <div class="box box-info form-container">

            <div class="box-header with-border" style="margin:4px 0;">
                <h3 class="box-title">{{ $title_text or '页面编辑' }}</h3>
                <div class="box-tools pull-right">
                </div>
            </div>

            <form action="" method="post" class="form-horizontal form-bordered" id="form-edit-item">
            <div class="box-body">

                {{ csrf_field() }}
                <input type="hidden" name="operate" value="{{ $operate or '' }}" readonly>
                <input type="hidden" name="operate_id" value="{{ $operate_id or 0 }}" readonly>
                <input type="hidden" name="operate_category" value="{{ $operate_category or 'ITEM' }}" readonly>
                <input type="hidden" name="operate_type" value="{{ $operate_type or 'order' }}" readonly>


                {{--页面--}}
                {{--模块选择--}}
                <div class="form-group">
                    <label class="control-label col-md-2">模块选择</label>
                    <div class="col-md-8 ">
                        <select class="form-control select-select2" name="item_sign" id="">
                            <option value="">选择模块</option>
                            @foreach(config('rzk.info.module') as $k => $v)
                                <option value="{{ $k }}" @if($operate == 'edit' && $k == $data->item_sign) selected="selected" @endif>
                                    {{ $v }}
                                </option>
                            @endforeach
                        </select>
                    </div>
                </div>

                {{--标题--}}
                <div class="form-group">
                    <label class="control-label col-md-2">标题</label>
                    <div class="col-md-8 ">
                        <input type="text" class="form-control" name="title" placeholder="标题" value="{{ $data->title or '' }}">
                    </div>
                </div>
                {{--描述--}}
                <div class="form-group">
                    <label class="control-label col-md-2">描述</label>
                    <div class="col-md-8 ">
                        {{--<input type="text" class="form-control" name="description" placeholder="描述" value="{{ $data->description or '' }}">--}}
                        <textarea class="form-control" name="description" rows="3" cols="100%">{!! $data->description or '' !!}</textarea>
                    </div>
                </div>


                {{--备注--}}
                <div class="form-group _none">
                    <label class="control-label col-md-2">备注</label>
                    <div class="col-md-8 ">
                        <textarea class="form-control" name="remark" rows="3" cols="100%">{{ $data->remark or '' }}</textarea>
                    </div>
                </div>

                {{--内容--}}
                <div class="form-group">
                    <label class="control-label col-md-2">内容详情</label>
                    <div class="col-md-8 ">
                        <div>
                        @include('UEditor::head')
                        <!-- 加载编辑器的容器 -->
                            <script id="container" name="content" type="text/plain">{!! $data->content or '' !!}</script>
                            <!-- 实例化编辑器 -->
                            <script type="text/javascript">
                                var ue = UE.getEditor('container');
                                ue.ready(function() {
                                    ue.execCommand('serverparam', '_token', '{{ csrf_token() }}');  // 此处为支持laravel5 csrf ,根据实际情况修改,目的就是设置 _token 值.
                                });
                            </script>
                        </div>
                    </div>
                </div>

                {{--多图展示--}}
                <div class="form-group _none">
                    <label class="control-label col-md-2">多图展示</label>
                    <div class="col-md-8 fileinput-group">
                        @if(!empty($data->custom2))
                            @foreach($data->custom2 as $img)
                                <div class="fileinput fileinput-new" data-provides="fileinput">
                                    <div class="fileinput-new thumbnail">
                                        <img src="{{ url(env('DOMAIN_CDN').'/'.$img->img) }}" alt="" />
                                    </div>
                                </div>
                            @endforeach
                        @else
                            <div class="fileinput-preview fileinput-exists thumbnail"></div>
                        @endif
                    </div>

                    <div class="col-md-8 col-md-offset-2 ">
                        <input id="multiple-images" type="file" class="file-" name="multiple_images[]" multiple >
                    </div>
                </div>

                {{--cover 封面图片--}}
                <div class="form-group">
                    <label class="control-label col-md-2">封面图片</label>
                    <div class="col-md-8 fileinput-group">

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                @if(!empty($data->cover_pic))
                                    <img src="{{ url(env('DOMAIN_CDN').'/'.$data->cover_pic) }}" alt="" />
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail">
                            </div>
                            <div class="btn-tool-group">
                                <span class="btn-file">
                                    <button class="btn btn-sm btn-primary fileinput-new">选择图片</button>
                                    <button class="btn btn-sm btn-warning fileinput-exists">更改</button>
                                    <input type="file" name="cover" />
                                </span>
                                <span class="">
                                    <button class="btn btn-sm btn-danger fileinput-exists" data-dismiss="fileinput">移除</button>
                                </span>
                            </div>
                        </div>
                        <div id="titleImageError" style="color: #a94442"></div>

                    </div>
                </div>




                {{--头像--}}
                <div class="form-group _none">
                    <label class="control-label col-md-2">头像</label>
                    <div class="col-md-8 fileinput-group">

                        <div class="fileinput fileinput-new" data-provides="fileinput">
                            <div class="fileinput-new thumbnail">
                                @if(!empty($data->portrait_img))
                                    <img src="{{ url(env('DOMAIN_CDN').'/'.$data->portrait_img) }}" alt="" />
                                @endif
                            </div>
                            <div class="fileinput-preview fileinput-exists thumbnail">
                            </div>
                            <div class="btn-tool-group">
                                <span class="btn-file">
                                    <button class="btn btn-sm btn-primary fileinput-new">选择图片</button>
                                    <button class="btn btn-sm btn-warning fileinput-exists">更改</button>
                                    <input type="file" name="portrait" />
                                </span>
                                <span class="">
                                    <button class="btn btn-sm btn-danger fileinput-exists" data-dismiss="fileinput">移除</button>
                                </span>
                            </div>
                        </div>
                        <div id="titleImageError" style="color: #a94442"></div>

                    </div>
                </div>

                {{--启用--}}
                @if($operate == 'create')
                    <div class="form-group form-type _none">
                        <label class="control-label col-md-2">启用</label>
                        <div class="col-md-8">
                            <div class="btn-group">

                                <button type="button" class="btn">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="active" value="0" checked="checked"> 暂不启用
                                        </label>
                                    </div>
                                </button>
                                <button type="button" class="btn">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" name="active" value="1"> 启用
                                        </label>
                                    </div>
                                </button>

                            </div>
                        </div>
                    </div>
                @endif

            </div>
            </form>

            <div class="box-footer">
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <button type="button" class="btn btn-success" id="edit-item-submit"><i class="fa fa-check"></i> 提交</button>
                        <button type="button" onclick="history.go(-1);" class="btn btn-default">返回</button>
                    </div>
                </div>
            </div>
        </div>
        <!-- END PORTLET-->
    </div>
</div>
@endsection




@section('custom-css')
@endsection




@section('custom-script')
<script>
    $(function() {

        $("#multiple-images").fileinput({
            allowedFileExtensions : [ 'jpg', 'jpeg', 'png', 'gif' ],
            showUpload: false
        });


        $('input[name=assign_date]').datetimepicker({
            locale: moment.locale('zh-cn'),
            format: "YYYY-MM-DD",
            ignoreReadonly: true
        });

        $('input[name=should_departure]').datetimepicker({
            locale: moment.locale('zh-cn'),
            format:"YYYY-MM-DD HH:mm",
            ignoreReadonly: true
        });
        $('input[name=should_arrival]').datetimepicker({
            locale: moment.locale('zh-cn'),
            format: "YYYY-MM-DD HH:mm",
            ignoreReadonly: true
        });




        // 添加or编辑
        $("#edit-item-submit").on('click', function() {
            var options = {
                url: "{{ url('/admin/item/module-edit') }}",
                type: "post",
                dataType: "json",
                // target: "#div2",
                success: function (data) {
                    if(!data.success) layer.msg(data.msg);
                    else
                    {
                        layer.msg(data.msg);

                        location.href = "{{ url('/admin/item/module-list') }}";

                        {{--if($.getUrlParam('referrer')) location.href = decodeURIComponent($.getUrlParam('referrer'));--}}
                        {{--else if(document.referrer) location.shref = document.referrer;--}}
                        {{--else location.href = "{{ url('/item/order-list-for-all') }}";--}}

                        // history.go(-1);
                    }
                }
            };
            $("#form-edit-item").ajaxSubmit(options);
        });




    });
</script>
@endsection
