@extends(env('TEMPLATE_RZK_WEB_DEF').'layout.layout')


@section('head_title')瑞足康-社区养生@endsection
@section('meta_title')瑞足康-社区养生@endsection
@section('meta_author')瑞足康-社区养生@endsection
@section('meta_description')瑞足康-社区养生@endsection
@section('meta_keywords')瑞足康-社区养生@endsection


@section('content')
<div class="item active">
    <img src="/custom/rzk/image/index/contact.jpg" alt="">
</div>

{{--<!-- content start-->--}}
<div class="common_main">
    <div class="common_container">
        <div class="common_top">
            当前位置：<a href="../index/index.html">主页</a> > <a href="index.html">联系我们</a> >
        </div>
        <div class="common_c_left">
            <a href="javascript:void(0);">
                <div class="left_t_nav "><img src="/custom/rzk/image/index/zx_jm.png" alt=""/>招商合作</div>
            </a>
            <a href="javascript:void(0);">
                <div class="left_t_nav lspzero"><img src="/custom/rzk/image/index/zx_rx.png" alt=""/>400-001-5889</div>
            </a>
            <a href="javascript:void(0);">
                <div class="left_t_nav"><img src="/custom/rzk/image/index/zx_zx.png" alt=""/>在线咨询</div>
            </a>
            <a href="javascript:void(0);">
                <div class="left_t_nav"><img src="/custom/rzk/image/index/zx_zl.png" alt=""/>索取材料</div>
            </a>
            <a href="javascript:void(0);">
                <div class="left_t_nav lspzero"><img src="/custom/rzk/image/index/zx_yh.png" alt=""/>优惠活动咨询</div>
            </a>
        </div>

        <div class="common_c_right contanct_box " >
            <div class="">
                <ul>
                    <li>上海瑞足康健康管理有限公司</li>
                    <li>财富热线：400-001-5889</li>
                    <li>地址：上海青浦区汇龙路695号C栋8楼(叶迪大厦)</li>
                </ul>
            </div>

            <div class="map_box" style="">
                <div id="dituContent"></div>
            </div>
        </div>
        <div class="clear"></div>
    </div>

    <div class="common_shadow"><img src="/custom/rzk/image/index/shadow.png" alt=""></div>
</div>
{{--<!--content  end-->--}}
@endsection


@section('custom-js')
    <script type="text/javascript" src="/custom/rzk/js/kefu.js"></script>
    <script type="text/javascript" src="/custom/rzk/js/bfix.js"></script>
    <script type="text/javascript" src="/custom/rzk/js/index.js"></script>
    <script type="text/javascript" src="http://api.map.baidu.com/api?key=&v=1.0&services=true"></script>
@endsection


@section('custom-script')
    <script type="text/javascript">
        //创建和初始化地图函数：
        function initMap(){
            createMap();//创建地图
            setMapEvent();//设置地图事件
            addMapControl();//向地图添加控件
            addMarker();//向地图中添加marker
        }

        //创建地图函数：
        function createMap(){
            var map = new BMap.Map("dituContent");//在百度地图容器中创建一个地图
            var point = new BMap.Point(121.273256,31.208746);//定义一个中心点坐标
            map.centerAndZoom(point,18);//设定地图的中心点和坐标并将地图显示在地图容器中
            window.map = map;//将map变量存储在全局
        }

        //地图事件设置函数：
        function setMapEvent(){
            map.enableDragging();//启用地图拖拽事件，默认启用(可不写)
            map.enableScrollWheelZoom();//启用地图滚轮放大缩小
            map.enableDoubleClickZoom();//启用鼠标双击放大，默认启用(可不写)
            map.enableKeyboard();//启用键盘上下左右键移动地图
        }

        //地图控件添加函数：
        function addMapControl(){
            //向地图中添加缩放控件
            var ctrl_nav = new BMap.NavigationControl({anchor:BMAP_ANCHOR_TOP_LEFT,type:BMAP_NAVIGATION_CONTROL_LARGE});
            map.addControl(ctrl_nav);
            //向地图中添加缩略图控件
            var ctrl_ove = new BMap.OverviewMapControl({anchor:BMAP_ANCHOR_BOTTOM_RIGHT,isOpen:1});
            map.addControl(ctrl_ove);
            //向地图中添加比例尺控件
            var ctrl_sca = new BMap.ScaleControl({anchor:BMAP_ANCHOR_BOTTOM_LEFT});
            map.addControl(ctrl_sca);
        }

        //标注点数组
        var markerArr = [{title:"瑞足康",content:"电话：400-001-5889<br/>地址：上海青浦区汇龙路695号C栋8楼(叶迪大厦)",point:"121.273256|31.208746",isOpen:1,icon:{w:23,h:25,l:46,t:21,x:9,lb:12}}
        ];

        //创建marker
        function addMarker(){
            for(var i=0;i<markerArr.length;i++){
                var json = markerArr[i];
                var p0 = json.point.split("|")[0];
                var p1 = json.point.split("|")[1];
                var point = new BMap.Point(p0,p1);
                var iconImg = createIcon(json.icon);
                var marker = new BMap.Marker(point,{icon:iconImg});
                var iw = createInfoWindow(i);
                var label = new BMap.Label(json.title,{"offset":new BMap.Size(json.icon.lb-json.icon.x+10,-20)});
                marker.setLabel(label);
                map.addOverlay(marker);
                label.setStyle({
                    borderColor:"#808080",
                    color:"#333",
                    cursor:"pointer"
                });

                (function(){
                    var index = i;
                    var _iw = createInfoWindow(i);
                    var _marker = marker;
                    _marker.addEventListener("click",function(){
                        this.openInfoWindow(_iw);
                    });
                    _iw.addEventListener("open",function(){
                        _marker.getLabel().hide();
                    })
                    _iw.addEventListener("close",function(){
                        _marker.getLabel().show();
                    })
                    label.addEventListener("click",function(){
                        _marker.openInfoWindow(_iw);
                    })
                    if(!!json.isOpen){
                        label.hide();
                        _marker.openInfoWindow(_iw);
                    }
                })()
            }
        }
        //创建InfoWindow
        function createInfoWindow(i){
            var json = markerArr[i];
            var iw = new BMap.InfoWindow("<b class='iw_poi_title' title='" + json.title + "'>" + json.title + "</b><div class='iw_poi_content'>"+json.content+"</div>");
            return iw;
        }

        //创建一个Icon
        function createIcon(json){
            var icon = new BMap.Icon("/image/index/map.png", new BMap.Size(json.w,json.h),{imageOffset: new BMap.Size(-json.l,-json.t),infoWindowOffset:new BMap.Size(json.lb+5,1),offset:new BMap.Size(json.x,json.h)})
            return icon;
        }

        initMap();//创建和初始化地图
    </script>
@endsection