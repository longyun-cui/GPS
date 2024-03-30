@extends(env('TEMPLATE_LY_GPS__ADMIN').'layout.layout')


@section('head_title')
    {{ $title_text or '待办事列表' }} - GPS系统 - {{ config('gps.info.info.name') }}
@endsection


@section('header','')
@section('description'){{ $title_text or '待办事列表' }} - GPS系统 - {{ config('gps.info.info.name') }}@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">

    {{--待办事--}}
    <div class="row">

        {{--待办事--}}
        @foreach($menu_list as $menu)
        <section class="col-lg-6 connectedSortable ui-sortable">

            <!-- TO DO List -->
            <div class="box box-primary">
                <div class="box-header">
                    <i class="ion ion-clipboard"></i>

                    <h3 class="box-title">{{ $menu->menu_name or 'Menu' }}</h3>

                    <div class="box-tools pull-right">
                        <ul class="pagination pagination-sm inline">
                            <li><a href="#">&laquo;</a></li>
                            <li><a href="#">1</a></li>
                            <li><a href="#">2</a></li>
                            <li><a href="#">3</a></li>
                            <li><a href="#">&raquo;</a></li>
                        </ul>
                    </div>
                </div>
                <!-- /.box-header -->
                <div class="box-body">
                    <ul class="todo-list">
                        @foreach($menu->todo_list as $todo)
                        <li @if($todo->is_completed == 1) class="done" @endif data-id="{{ $todo->id or 0 }}">
                            <!-- drag handle -->
                            <span class="handle">
                                <i class="fa fa-ellipsis-v"></i>
                                <i class="fa fa-ellipsis-v"></i>
                              </span>
                            <!-- checkbox -->

                            <input type="checkbox" value="" class="minimal-red" @if($todo->is_completed == 1) checked @endif>
                            <!-- todo text -->
                            <span class="text">{{ $todo->title or 'Title' }}</span>
                            <!-- Emphasis label -->
                            <small class="label label-danger"><i class="fa fa-clock-o"></i> 2 mins</small>
                            <!-- General tools such as edit or delete-->
                            <div class="tools">
                                <i class="fa fa-edit item-edit-link"></i>
                                <i class="fa fa-trash-o item-delete-submit"></i>
                            </div>
                        </li>
                        @endforeach
                    </ul>
                </div>
                <!-- /.box-body -->
                <div class="box-footer clearfix no-border">
                    <button type="button" class="btn btn-default pull-right"><i class="fa fa-plus"></i> Add item</button>
                </div>
            </div>
        </section>
        @endforeach

    </div>

</div>
@endsection




@section('custom-css')
@endsection




@section('custom-script')
@include(env('TEMPLATE_LY_GPS__ADMIN').'entrance.item.todo-item-list-script')
<script>
    $(function() {

        //iCheck for checkbox and radio inputs
        $('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
            checkboxClass: 'icheckbox_minimal-blue',
            radioClass: 'iradio_minimal-blue'
        });
        //Red color scheme for iCheck
        $('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
            checkboxClass: 'icheckbox_minimal-red',
            radioClass: 'iradio_minimal-red'
        });
        //Flat red color scheme for iCheck
        $('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
            checkboxClass: 'icheckbox_flat-green',
            radioClass: 'iradio_flat-green'
        });

        /* The todo list plugin */
        $(".todo-list").todolist({
            onCheck: function (ele) {

                var $that = $(this);
                var $item_id = $that[0].attributes['data-id'].value;

                var $index = layer.load(1, {
                    shade: [0.3, '#fff'],
                    content: '<span class="loadtip">正在...</span>',
                    success: function (layer) {
                        layer.find('.layui-layer-content').css({
                            'padding-top': '40px',
                            'width': '100px',
                        });
                        layer.find('.loadtip').css({
                            'font-size':'20px',
                            'margin-left':'-18px'
                        });
                    }
                });

                $.post(
                    "{{ url('/admin/item/todo-done') }}",
                    {
                        _token: $('meta[name="_token"]').attr('content'),
                        operate: "todo-done",
                        item_id: $item_id
                    },
                    function(data){
                        // layer.close(index);
                        layer.closeAll('loading');
                        if(!data.success)
                        {
                            layer.msg(data.msg);
                        }
                    },
                    'json'
                );

                window.console.log("The element has been checked");
                return ele;
            },
            onUncheck: function (ele) {

                var $that = $(this);
                var $item_id = $that[0].attributes['data-id'].value;

                var $index = layer.load(1, {
                    shade: [0.3, '#fff'],
                    content: '<span class="loadtip">正在...</span>',
                    success: function (layer) {
                        layer.find('.layui-layer-content').css({
                            'padding-top': '40px',
                            'width': '100px',
                        });
                        layer.find('.loadtip').css({
                            'font-size':'20px',
                            'margin-left':'-18px'
                        });
                    }
                });

                $.post(
                    "{{ url('/admin/item/todo-undone') }}",
                    {
                        _token: $('meta[name="_token"]').attr('content'),
                        operate: "todo-undone",
                        item_id: $that.attr('data-id')
                    },
                    function(data){
                        // layer.close(index);
                        layer.closeAll('loading');
                        if(!data.success)
                        {
                            layer.msg(data.msg);
                        }
                    },
                    'json'
                );

                window.console.log("The element has been unchecked");
                return ele;
            }
        });

        //Make the dashboard widgets sortable Using jquery UI
        $(".connectedSortable").sortable({
            placeholder: "sort-highlight",
            connectWith: ".connectedSortable",
            handle: ".box-header, .nav-tabs",
            forcePlaceholderSize: true,
            zIndex: 999999
        });
        $(".connectedSortable .box-header, .connectedSortable .nav-tabs-custom").css("cursor", "move");

        //jQuery UI sortable for the todo list
        $(".todo-list").sortable({
            placeholder: "sort-highlight",
            handle: ".handle",
            forcePlaceholderSize: true,
            zIndex: 999999
        });

    });
</script>
@endsection

