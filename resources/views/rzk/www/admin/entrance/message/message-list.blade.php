@extends(env('TEMPLATE_RZK_WEB_ADMIN').'layout.layout')


@section('head_title')
    {{ $title_text or '全部内容' }} - 管理员后台系统 - {{ config('rzk.info.info.short_name') }}
@endsection




@section('header','')
@section('description')页面列表 - 管理员后台系统 - {{ config('rzk.info.info.short_name') }}@endsection
@section('breadcrumb')
    <li><a href="{{ url('/admin') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="row">
    <div class="col-md-12">
        <div class="box box-info main-list-body">

            <div class="box-header with-border" style="margin:16px 0;">

                <h3 class="box-title">内容列表</h3>

                <div class="caption pull-right">
                    <i class="icon-pin font-blue"></i>
                    <span class="caption-subject font-blue sbold uppercase"></span>
                    <a href="{{ url('/admin/item/page-create') }}">
                        <button type="button" onclick="" class="btn btn-success pull-right"><i class="fa fa-plus"></i> 添加页面</button>
                    </a>
                </div>

                <div class="pull-right _none">
                    <button type="button" class="btn btn-box-tool" data-widget="collapse" data-toggle="tooltip" title="" data-original-title="Collapse">
                        <i class="fa fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-box-tool" data-widget="remove" data-toggle="tooltip" title="" data-original-title="Remove">
                        <i class="fa fa-times"></i>
                    </button>
                </div>

            </div>


            <div class="box-body datatable-body item-main-body" id="item-main-body">

                <div class="row col-md-12 datatable-search-row">
                    <div class="input-group">

                        <input type="text" class="form-control form-filter item-search-keyup" name="mobile" placeholder="电话" />

{{--                        <select class="form-control form-filter" name="item_type" style="width:96px;">--}}
{{--                            <option value ="-1">全部</option>--}}
{{--                            <option value ="11">产品</option>--}}
{{--                            <option value ="41">培训</option>--}}
{{--                            --}}{{--<option value ="42">沟通技能</option>--}}
{{--                            <option value ="101">其他</option>--}}
{{--                        </select>--}}

                        <button type="button" class="form-control btn btn-flat btn-success filter-submit" id="filter-submit">
                            <i class="fa fa-search"></i> 搜索
                        </button>
                        <button type="button" class="form-control btn btn-flat btn-default filter-cancel">
                            <i class="fa fa-circle-o-notch"></i> 重置
                        </button>

                    </div>
                </div>

                <div class="tableArea">
                <table class='table table-striped table-bordered table-hover' id='datatable_ajax'>
                    <thead>
                        <tr role='row' class='heading'>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
                </div>

            </div>


            <div class="box-footer _none">
                <div class="row" style="margin:16px 0;">
                    <div class="col-md-offset-0 col-md-6 col-sm-9 col-xs-12">
                        {{--<button type="button" class="btn btn-primary"><i class="fa fa-check"></i> 提交</button>--}}
                        {{--<button type="button" onclick="history.go(-1);" class="btn btn-default">返回</button>--}}
                        <div class="input-group">
                            <span class="input-group-addon"><input type="checkbox" id="check-review-all"></span>
                            <select name="bulk-operate-status" class="form-control form-filter">
                                <option value ="-1">请选择操作类型</option>
                                <option value ="启用">启用</option>
                                <option value ="禁用">禁用</option>
                                <option value ="删除">删除</option>
                                <option value ="永久删除">永久删除</option>
                            </select>
                            <span class="input-group-addon btn btn-default" id="operate-bulk-submit"><i class="fa fa-check"></i> 批量操作</span>
                            <span class="input-group-addon btn btn-default" id="delete-bulk-submit"><i class="fa fa-trash-o"></i> 批量删除</span>
                        </div>
                    </div>
                </div>
            </div>


            <div class="box-footer">
                <div class="row" style="margin:16px 0;">
                    <div class="col-md-offset-0 col-md-9">
                        <button type="button" onclick="" class="btn btn-primary _none"><i class="fa fa-check"></i> 提交</button>
                        <button type="button" onclick="history.go(-1);" class="btn btn-default">返回</button>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>


<div class="modal fade" id="modal-body">
    <div class="col-md-8 col-md-offset-2" id="edit-ctn" style="margin-top:64px;margin-bottom:64px;background:#fff;">

        <div class="row">
            <div class="col-md-12">
                <!-- BEGIN PORTLET-->
                <div class="box- box-info- form-container">

                    <div class="box-header with-border" style="margin:16px 0;">
                        <h3 class="box-title">内容详情</h3>
                        <div class="box-tools pull-right">
                        </div>
                    </div>

                    <form action="" method="post" class="form-horizontal form-bordered" id="form-edit-modal">
                        <div class="box-body">

                            {{csrf_field()}}
                            <input type="hidden" name="operate" value="work-order" readonly>
                            <input type="hidden" name="id" value="0" readonly>

                            {{--标题--}}
                            <div class="form-group">
                                <label class="control-label col-md-2">标题</label>
                                <div class="col-md-8 ">
                                    <div><b class="item-detail-title"></b></div>
                                </div>
                            </div>
                            {{--内容--}}
                            <div class="form-group">
                                <label class="control-label col-md-2">内容</label>
                                <div class="col-md-8 ">
                                    <div class="item-detail-content"></div>
                                </div>
                            </div>
                            {{--附件--}}
                            <div class="form-group">
                                <label class="control-label col-md-2">附件</label>
                                <div class="col-md-8 ">
                                    <div class="item-detail-attachment"></div>
                                </div>
                            </div>
                            {{--说明--}}
                            <div class="form-group _none">
                                <label class="control-label col-md-2">说明</label>
                                <div class="col-md-8 control-label" style="text-align:left;">
                                    <span class="">这是一段说明。</span>
                                </div>
                            </div>

                        </div>
                    </form>

                    <div class="box-footer">
                        <div class="row _none">
                            <div class="col-md-8 col-md-offset-2">
                                <button type="button" class="btn btn-success" id="item-site-submit"><i class="fa fa-check"></i> 提交</button>
                                <button type="button" class="btn btn-default modal-cancel" id="item-site-cancel">取消</button>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END PORTLET-->
            </div>
        </div>
    </div>
</div>
@endsection




@section('custom-css')
@endsection
@section('custom-style')
    <style>
        .tableArea table { width:100% !important; }
        .tableArea table tr th,
        .tableArea table tr td { white-space:nowrap; }
    </style>
@endsection




@section('custom-script')
<script>
    var TableDatatablesAjax = function () {
        var datatableAjax = function () {

            var dt = $('#datatable_ajax');
            var ajax_datatable = dt.DataTable({
//                "aLengthMenu": [[20, 50, 200, 500, -1], ["20", "50", "200", "500", "全部"]],
                "aLengthMenu": [[50, 100, 200], ["50", "100", "200"]],
                "processing": true,
                "serverSide": true,
                "searching": false,
                "ajax": {
                    'url': "{{ url('/admin/message/message-list') }}",
                    "type": 'POST',
                    "dataType" : 'json',
                    "data": function (d) {
                        d._token = $('meta[name="_token"]').attr('content');
                        d.keyword = $('input[name="keyword"]').val();
                        d.website = $('input[name="website"]').val();
                        d.item_type = $('select[name="item_type"]').val();
                    },
                },
                "pagingType": "simple_numbers",
                "order": [],
                "orderCellsTop": true,
                "columns": [
                    // {
                    //     "width": "32px",
                    //     "title": "选择",
                    //     "data": "id",
                    //     'orderable': false,
                    //     render: function(data, type, row, meta) {
                    //         return '<label><input type="checkbox" name="bulk-id" class="minimal" value="'+data+'"></label>';
                    //     }
                    // },
                    // {
                    //     "width": "32px",
                    //     "title": "序号",
                    //     "data": null,
                    //     "targets": 0,
                    //     'orderable': false
                    // },
                    {
                        "title": "ID",
                        "data": "id",
                        "className": "",
                        "width": "60px",
                        "orderable": true,
                        render: function(data, type, row, meta) {
                            return data;
                        }
                    },
                    {
                        "title": "类型",
                        "data": "item_type",
                        "className": "",
                        "width": "80px",
                        "orderable": false,
                        render: function(data, type, row, meta) {
                            return '<small class="btn-xs bg-purple">留言</small>';
                        }
                    },
                    {
                        "title": "电话",
                        "data": "mobile",
                        "className": "",
                        "width": "120px",
                        "orderable": false,
                        render: function(data, type, row, meta) {
//                            return data;
                            return '<a href="javascript:void(0);">'+data+'</a>';
                        }
                    },
                    {
                        "title": "姓名",
                        "data": "name",
                        "className": "",
                        "width": "120px",
                        "orderable": false,
                        render: function(data, type, row, meta) {
//                            return data;
                            return '<a href="javascript:void(0);">'+data+'</a>';
                        }
                    },
                    {
                        "title": "城市",
                        "data": "address",
                        "className": "",
                        "width": "120px",
                        "orderable": false,
                        render: function(data, type, row, meta) {
                           return data;
                        }
                    },
                    {
                        "title": "合伙人类型",
                        "data": "subtitle",
                        "className": "",
                        "width": "120px",
                        "orderable": false,
                        render: function(data, type, row, meta) {
                           return data;
                        }
                    },
                    {
                        "title": "留言",
                        "data": "content",
                        "className": "",
                        "width": "",
                        "orderable": false,
                        render: function(data, type, row, meta) {
                           return data;
                        }
                    },
                    {
                        "title": "IP",
                        "data": "ip",
                        "className": "",
                        "width": "120px",
                        "orderable": false,
                        render: function(data, type, row, meta) {
                            return data;
                        }
                    },
                    {
                        "title": "创建时间",
                        "data": 'created_at',
                        "className": "font-12px",
                        "width": "120px",
                        "orderable": false,
                        render: function(data, type, row, meta) {
//                            return data;
                            var $date = new Date(data*1000);
                            var $year = $date.getFullYear();
                            var $month = ('00'+($date.getMonth()+1)).slice(-2);
                            var $day = ('00'+($date.getDate())).slice(-2);
                            var $hour = ('00'+$date.getHours()).slice(-2);
                            var $minute = ('00'+$date.getMinutes()).slice(-2);
                            var $second = ('00'+$date.getSeconds()).slice(-2);

                            // return $year+'-'+$month+'-'+$day;
                            // return $year+'-'+$month+'-'+$day+'&nbsp;'+$hour+':'+$minute;
                            // return $year+'-'+$month+'-'+$day+'&nbsp;&nbsp;'+$hour+':'+$minute+':'+$second;

                            return $year+'-'+$month+'-'+$day+'&nbsp;'+$hour+':'+$minute;
                        }
                    },
                    {
                        "width": "80px",
                        "title": "操作",
                        "data": 'id',
                        "orderable": false,
                        render: function(data, type, row, meta) {

                            if(row.item_status == 1)
                            {
                                $html_able = '<a class="btn btn-xs btn-danger item-disable-submit" data-id="'+data+'">禁用</a>';
                            }
                            else
                            {
                                $html_able = '<a class="btn btn-xs btn-success item-enable-submit" data-id="'+data+'">启用</a>';
                            }

                            if(row.is_me == 1 && row.item_active == 0)
                            {
                                $html_publish = '<a class="btn btn-xs bg-olive item-publish-submit" data-id="'+data+'">发布</a>';
                            }
                            else
                            {
                                $html_publish = '<a class="btn btn-xs btn-default disabled" data-id="'+data+'">发布</a>';
                            }

                            var html =
                                    // $html_able+
//                                    '<a class="btn btn-xs" href="/item/edit?id='+data+'">编辑</a>'+
//                                     '<a class="btn btn-xs btn-primary item-edit-link" data-id="'+data+'">编辑</a>'+
//                                    $html_publish+
//                                     '<a class="btn btn-xs bg-navy item-delete-submit" data-id="'+data+'">删除</a>'+
//                                    '<a class="btn btn-xs bg-navy item-delete-permanently-submit" data-id="'+data+'">永久删除</a>'+
//                                    '<a class="btn btn-xs bg-primary item-detail-show" data-id="'+data+'">查看详情</a>'+
//                                    '<a class="btn btn-xs bg-olive item-download-qr-code-submit" data-id="'+data+'">下载二维码</a>'+
                                    '';
                            return html;

                        }
                    }
                ],
                "drawCallback": function (settings) {

                    // let startIndex = this.api().context[0]._iDisplayStart;//获取本页开始的条数
                    // this.api().column(1).nodes().each(function(cell, i) {
                    //     cell.innerHTML =  startIndex + i + 1;
                    // });

                },
                "language": { url: '/common/dataTableI18n' },
            });


            dt.on('click', '.filter-submit', function () {
                ajax_datatable.ajax.reload();
            });

            dt.on('click', '.filter-cancel', function () {
                $('textarea.form-filter, select.form-filter, input.form-filter', dt).each(function () {
                    $(this).val("");
                });

                $('select.form-filter').selectpicker('refresh');

                ajax_datatable.ajax.reload();
            });

        };
        return {
            init: datatableAjax
        }
    }();
    $(function () {
        TableDatatablesAjax.init();
    });
</script>
@include(env('TEMPLATE_RZK_WEB_ADMIN').'entrance.item.page-list-script')
@endsection
