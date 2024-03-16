<script>
    $(function() {

        // 【搜索】
        $(".item-main-body").on('click', ".filter-submit", function() {
            $('#datatable_ajax').DataTable().ajax.reload();
        });
        // 【重置】
        $(".item-main-body").on('click', ".filter-cancel", function() {
            $('textarea.form-filter, input.form-filter, select.form-filter').each(function () {
                $(this).val("");
            });

//            $('select.form-filter').selectpicker('refresh');
            $('select.form-filter option').attr("selected",false);
            $('select.form-filter').find('option:eq(0)').attr('selected', true);

            $('#datatable_ajax').DataTable().ajax.reload();
        });
        // 【查询】回车
        $(".item-main-body").on('keyup', ".item-search-keyup", function(event) {
            if(event.keyCode ==13)
            {
                $("#filter-submit").click();
            }
        });




        // 【下载二维码】
        $("#item-main-body").on('click', ".item-download-qr-code-submit", function() {
            var that = $(this);
            window.open("/download/qr-code?type=item&id="+that.attr('data-id'));
        });

        // 【数据分析】
        $("#item-main-body").on('click', ".item-statistic-submit", function() {
            var that = $(this);
            window.open("/statistic/statistic-item?id="+that.attr('data-id'));
//            window.location.href = "/admin/statistic/statistic-item?id="+that.attr('data-id');
        });

        // 【编辑】
        $("#item-main-body").on('click', ".item-edit-link", function() {
            var that = $(this);
            window.location.href = "/admin/item/article-edit?item-id="+that.attr('data-id');
        });




        /*
            // 批量操作
         */
        // 【批量操作】全选or反选
        $(".main-list-body").on('click', '#check-review-all', function () {
            $('input[name="bulk-id"]').prop('checked',this.checked);//checked为true时为默认显示的状态
        });

        // 【批量操作】
        $(".main-list-body").on('click', '#operate-bulk-submit', function() {
            var $checked = [];
            $('input[name="bulk-id"]:checked').each(function() {
                $checked.push($(this).val());
            });

            if($checked.length == 0)
            {
                layer.msg("请先选择操作对象！");
                return false;
            }

//            var $operate_set = new Array("启用","禁用","删除","彻底删除");
            var $operate_set = ["启用","禁用","删除","彻底删除"];
            var $operate_result = $('select[name="bulk-operate-status"]').val();
            if($.inArray($operate_result, $operate_set) == -1)
            {
                layer.msg("请选择操作类型！");
                return false;
            }

            layer.msg('确定"批量操作"么', {
                time: 0
                ,btn: ['确定', '取消']
                ,yes: function(index){

                    $.post(
                        "{{ url('/item/item-operate-bulk') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "operate-bulk",
                            bulk_item_id: $checked,
                            bulk_item_operate: $('select[name="bulk-operate-status"]').val()
                        },
                        function(data){
                            layer.close(index);
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                                $("#check-review-all").prop('checked',false);
                            }
                        },
                        'json'
                    );

                }
            });

        });

        // 【批量删除】
        $(".main-list-body").on('click', '#delete-bulk-submit', function() {
            var $checked = [];
            $('input[name="bulk-id"]:checked').each(function() {
                $checked.push($(this).val());
            });

            layer.msg('确定"批量删除"么', {
                time: 0
                ,btn: ['确定', '取消']
                ,yes: function(index){

                    $.post(
                        "{{ url('/item/item-delete-bulk') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "item-delete-bulk",
                            bulk_item_id: $checked
                        },
                        function(data){
                            layer.close(index);
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                            }
                        },
                        'json'
                    );

                }
            });

        });




        // 内容【获取详情】
        $("#item-main-body").on('click', ".item-detail-show", function() {
            var that = $(this);
            var $data = new Object();
            $.ajax({
                type:"post",
                dataType:'json',
                async:false,
                url: "{{ url('/admin/item/item-get') }}",
                data: {
                    _token: $('meta[name="_token"]').attr('content'),
                    operate:"item-get",
                    id:that.attr('data-id')
                },
                success:function(data){
                    if(!data.success) layer.msg(data.msg);
                    else
                    {
                        $data = data.data;
                    }
                }
            });
            $('input[name=id]').val(that.attr('data-id'));
            $('.item-user-id').html(that.attr('data-user-id'));
            $('.item-username').html(that.attr('data-username'));
            $('.item-title').html($data.title);
            $('.item-content').html($data.content);
            if($data.attachment_name)
            {
                var $attachment_html = $data.attachment_name+'&nbsp&nbsp&nbsp&nbsp'+'<a href="/all/download-item-attachment?item-id='+$data.id+'">下载</a>';
                $('.item-attachment').html($attachment_html);
            }
            $('#modal-body').modal('show');

        });

        // 内容【删除】
        $("#item-main-body").on('click', ".item-delete-submit", function() {
            var $that = $(this);
            layer.msg('确定要"删除"么？', {
                time: 0
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    $.post(
                        "{{ url('/admin/item/item-delete') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "item-delete",
                            item_id: $that.attr('data-id')
                        },
                        function(data){
                            layer.close(index);
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                            }
                        },
                        'json'
                    );
                }
            });
        });

        // 内容【恢复】
        $("#item-main-body").on('click', ".item-restore-submit", function() {
            var $that = $(this);
            layer.msg('确定要"恢复"么？', {
                time: 0
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    $.post(
                        "{{ url('/admin/item/item-restore') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "item-restore",
                            item_id: $that.attr('data-id')
                        },
                        function(data){
                            layer.close(index);
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                            }
                        },
                        'json'
                    );
                }
            });
        });

        // 内容【永久删除】
        $("#item-main-body").on('click', ".item-delete-permanently-submit", function() {
            var $that = $(this);
            layer.msg('确定要"永久删除"么？', {
                time: 0
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    $.post(
                        "{{ url('/admin/item/item-delete-permanently') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "item-delete-permanently",
                            item_id: $that.attr('data-id')
                        },
                        function(data){
                            layer.close(index);
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                            }
                        },
                        'json'
                    );
                }
            });
        });

        // 内容【推送】
        $("#item-main-body").on('click', ".item-publish-submit", function() {
            var that = $(this);
            layer.msg('确定要"发布"么？', {
                time: 0
                ,btn: ['确定', '取消']
                ,yes: function(index){
                    $.post(
                        "{{ url('/admin/item/article-publish') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "item-publish",
                            id:that.attr('data-id')
                        },
                        function(data){
                            layer.close(index);
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                            }
                        },
                        'json'
                    );
                }
            });
        });

        // 【启用】
        $("#item-main-body").on('click', ".item-enable-submit", function() {
            var $that = $(this);
            // layer.msg('确定"启用"？', {
            //     time: 0
            //     ,btn: ['确定', '取消']
            //     ,yes: function(index){
            //     }
            // });

            var $index = layer.load(1, {
                shade: [0.3, '#fff'],
                content: '<span class="loadtip">处理中</span>',
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
                        "{{ url('/admin/item/article-enable') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "item-enable",
                            item_id: $that.attr('data-id')
                        },
                        function(data){
                            // layer.close(index);
                            layer.closeAll('loading');
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                            }
                        },
                        'json'
                    );
        });
        // 【禁用】
        $("#item-main-body").on('click', ".item-disable-submit", function() {
            var $that = $(this);
            // layer.msg('确定"禁用"？', {
            //     time: 0
            //     ,btn: ['确定', '取消']
            //     ,yes: function(index){
            //     }
            // });

            var $index = layer.load(1, {
                shade: [0.3, '#fff'],
                content: '<span class="loadtip">处理中</span>',
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
                        "{{ url('/admin/item/article-disable') }}",
                        {
                            _token: $('meta[name="_token"]').attr('content'),
                            operate: "item-disable",
                            item_id: $that.attr('data-id')
                        },
                        function(data){
                            // layer.close(index);
                            layer.closeAll('loading');
                            if(!data.success) layer.msg(data.msg);
                            else
                            {
                                $('#datatable_ajax').DataTable().ajax.reload(null,false);
                            }
                        },
                        'json'
                    );
        });








    });
</script>