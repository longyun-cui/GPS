<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">

    <link rel="shortcut icon" type="image/ico" href="{{ env('FAVICON_RZK') }}">
    <link rel="shortcut icon" type="image/png" href="{{ env('FAVICON_RZK') }}">
    <link rel="icon" sizes="16x16 32x32 64x64" href="{{ env('FAVICON_RZK') }}">
    <link rel="icon" type="image/png" sizes="196x196" href="{{ env('FAVICON_RZK') }}">

    <title>@yield('head_title')</title>
    <meta name="title" content="@yield('meta_title')" />
    <meta name="author" content="@yield('meta_author')" />
    <meta name="description" content="@yield('meta_description')" />
    <meta name="keywords" content="@yield('meta_keywords')" />
    <meta name="robots" content="all" />
    <meta name="_token" content="{{ csrf_token() }}"/>

    <link rel="stylesheet" type="text/css" href="/custom/rzk/css/style1.css">
    <link rel="stylesheet" type="text/css" href="/custom/rzk/css/index.css">

    <script type="text/javascript" src="/custom/rzk/js/jquery-1.8.3.min.js"></script>
    <script type="text/javascript" src="/custom/rzk/js/jquery.js"></script>
    <!--script type="text/javascript" src="/js/jquery.min.js"></script-->
    <script type="text/javascript" src="/custom/rzk/js/common.js"></script><!--jquery数字滚动-->
    <script type="text/javascript" src='https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js'></script>

    @yield('css')
    @yield('style')
    @yield('custom-css')
    @yield('custom-style')
</head>

<body>

<!--pc导航 start-->
<div class="zydhb" id="top">
    <div class="top"></div>
    <div class="w zydh">
        <a href="/"><img src="/custom/rzk/logo.jpg" style="float:left;height:100%;"></a>
        <div class="zydhu" id="menu">
            <ul id="nav">
                <li class="mainlevel {{ $menu_index_active or '' }}">
                    <a href="/">首页</a>
                </li>
                <li class="mainlevel {{ $menu_about_active or '' }}" >
                    <a href="/about">集团实力</a>
                </li>
                <li class="mainlevel {{ $menu_join_us_active or '' }}">
                    <a href="/join_us">诚邀合作</a>
                </li>
                <li class="mainlevel {{ $menu_support_active or '' }}">
                    <a href="/support">运营指导</a>
                </li>
                <li class="mainlevel {{ $menu_product_active or '' }}">
                    <a href="/product">产品服务</a>
                </li>
                <!--  <li class="mainlevel">
                   <a href="/Index/cases/index.html">成功案例</a>
                 </li> -->
                <li class="mainlevel {{ $menu_industry_active or '' }}">
                    <a href="/industry">产业基地</a>
                </li>
                <li class="mainlevel {{ $menu_news_active or '' }}" id="mainlevel_01"><a href="/news/index">新闻资讯</a>
                    <ul class="sub_nav_01">
                        <span class="Triangle_con"></span>
                        <li><a href="/news/index">公司新闻</a></li>
                        <li><a href="/news/industry">行业资讯</a></li>
                    </ul>
                </li>
                <li class="mainlevel {{ $menu_contact_active or '' }}">
                    <a href="/contact">联系我们</a>
                </li>
            </ul>

            <script type="text/javascript">
                $(document).ready(function(){
                    $('li.mainlevel').mousemove(function(){
                        $(this).find('ul').slideDown("1000");
                        //speed
                    });
                    $('li.mainlevel').mouseleave(function(){
                        $(this).find('ul').slideUp("fast");
                    });
                });
            </script>
        </div>
    </div>
</div>
<!--pc导航 end-->

<div class="clear"></div>

<!--手机导航 start-->
<header class="header" id="top">
    <a href="/" class="logo"><img src="/custom/rzk/logo.jpg" alt="瑞足康"></a>
    <div id="dl-menu" class="dl-menuwrapper">
        <button id="dl-menu-button">Open Menu</button>
        <ul class="dl-menu">
            <li><a href="index.html">首页</a></li>
            <li><a href="/about">集团实力</a></li>
            <li><a href="/joinus">诚邀合作</a></li>
            <li><a href="/support">运营指导</a></li>
            <li><a href="/product">产品/服务</a></li>
            <!-- <li><a href="/Index/cases/index.html">成功案例</a></li> -->
            <li><a href="/industry">产业基地</a></li>
            <li>
                <a href="Line.html">新闻资讯</a>
                <ul class="dl-submenu">
                    <li class="dl-back"><a href="/">返回上一级</a></li>
                    <li><a href="/news/index">公司新闻</a></li>
                    <li><a href="/news/hangye">行业资讯</a></li>s
                </ul>
            </li>
            <li><a href="/contact">联系我们</a></li>
        </ul>
    </div>
</header>

<script type="text/javascript">
    $(function(){
        $('#dl-menu').dlmenu();
    });
</script>
<!--手机导航 end-->

<div class="clear"></div>







{{--main-content--}}
@include(env('TEMPLATE_RZK_WEB_DEF').'layout.main-content')


{{--联系我们--}}
<div class="content content_ly">
    <div class="content_box">
        <div class="ly_title">如果您对该项目感兴趣，并希望得到详细资料，请填写留言获取资料！</div>
        <div class="ly_topshadow"></div>
        <div class="ly_box">
            <div class="ly_box_l">
                <div class="ly_box_lt">咨询该项目有机会获得</div>
                <a href="javascript:void(0);">
                    <div class="ly_box_lc"><img src="/custom/rzk/image/index/lya.png" alt=""/>

                        <div>考察项目<br/>食宿三星级酒店</div>
                    </div>
                </a>
                <a href="javascript:void(0);">
                    <div class="ly_box_lc"><img src="/custom/rzk/image/index/lyb.png" alt=""/>

                        <div>价值不菲<br/>创业大礼包</div>
                    </div>
                </a>
                <a href="javascript:void(0);">
                    <div class="ly_box_lc"><img src="/custom/rzk/image/index/lyc.png" alt=""/>

                        <div>创业全程<br/>专业1对1指导</div>
                        <!--<span>立即咨询</span>--></div>
                </a>

                <div class="ly_box_lb">
                    温馨提示：<br/>请填写真实信息，我们会把有价值的经营管理理念传递给您，让您早日实现创业梦想！创业有风险，投资需谨慎。
                </div>
            </div>
            <div class="ly_box_r">
                <div class="ly_box_rt">郑重承诺：瑞足康互联网+社区养生创新品牌，<br/>尊重您的隐私，并承诺为您保密</div>

                <form id="myform" method="post" action="/message-leave" onsubmit="return chkform();">
                    <table border="0" class="ly_table taleft" cellspacing="0" cellpadding="0">
                        <tr height="50">
                            <td width="60">姓名</td>
                            <td width="330">
                                <input type="text" value="" id="username" name="username" class="l_user" placeholder="请输入您的姓名"/>
                            </td>
                            <td width="60">手机</td>
                            <td width="330">
                                <input type="hidden" name="weburl" id="weburl" value="" />
                                <input type="text" value="" class="l_pwd" id="mobile" name="mobile" placeholder="请输入您的电话"/>
                            </td>
                        </tr>
                        <tr height="50">
                            <td>类型</td>
                            <td>
                                <select name="gw_class" id="lytype" name="lytype">
                                    <option value="">请选择类型</option>
                                    <option value="标准店合伙人">标准店合伙人</option>
                                    <option value="市级合伙人">市级合伙人</option>
                                    <option value="县级合伙人">县级合伙人</option>
                                </select>
                            </td>
                            <td>所在城市</td>
                            <td>
                                <input type="text" value="" class="l_pwd" id="usercity" name="usercity" placeholder="请输入您所在的城市"/>
                            </td>
                        </tr>
                        <tr height="50">
                            <td colspan="6">
                                <span style="display:inline-block;width: 60px;">留言</span>
                                <textarea id="lynr" name="lynr" cols="30" rows="5" placeholder="请输入您想了解的内容"></textarea>
                            </td>
                        </tr>

                        <tr height="60">
                            <td colspan="6"><span style="display:inline-block;width: 60px;"></span>
                                <input type="submit" id="submitLy" value="提交" class="ly_table__btn"/>
                            </td>
                        </tr>
                    </table>
                </form>

                <script>
                    function chkform(){
                        if(document.getElementById("mobile").value=="" || document.getElementById("mobile").value.length<11){
                            alert('请正确输入您的联系电话！');
                            return false;
                        }
                        return true;
                    }
                    var url;
                    url = window.location.href;
                    document.getElementById('weburl').value = url;
                    function addLy(){
                        document.getElementById("mobile").value = document.getElementById("txtPhone2").value;
                        document.getElementById("username").value = document.getElementById("txtName2").value;
                        document.getElementById("lynr").value = "索取资料点击";
                        document.getElementById("submitLy").click();

                    }
                </script>

            </div>
            <div class="clear"></div>
        </div>
        <div class="ly_btmshadow"></div>
    </div>
</div>


{{--footer--}}
<div class="foot">
    <div class="footd1">
        <p class="footd1p">推动健康产业发展  助力全民健康生活</p>
        <p class="footd1p1">加入我们，打造 [ 千城万店 · 健康万民 ]</p>
        <p class="footd1p2">Promote the development of the health industry</p>
    </div>
    <div class="footd2">
        <div class="w1 footd2d">
            <div class="footd2d1">
                <div class="footd2d1d">
                    <div class="footd2d1d2">全国客户服务热线：</div>
                    <div class="footd2d1d1">{{ config('rzk.info.info.company_400') }}</div>
                </div>
                <p>
                    四川总部：{{ config('rzk.info.info.company_address') }}<br>
{{--                    华东运营中心：江苏省昆山市花桥镇绿地大道231弄2号楼<br>--}}
{{--                    西南运营中心：成都市高新区环球中心E1-1212--}}
                </p>
            </div>
            <div class="footd2d2">
                <div class="footd2d2l">立即咨询：</div>
                <div class="footd2d2r">
                    <form action="http://sem.blz9.com/Index/userly/addly" id="myform" method="post" onsubmit="return chkform1();">
                        <input class="inp1" type="text" name="username" placeholder="您的姓名" />
                        <input class="inp2" type="text" id="mobile1" name="mobile" placeholder="联系方式" />
                        <input type="hidden" name="weburl" id="weburl1" value="" />
                        <input type="hidden" name="lynr" value="" />
                        <button>提交信息</button>
                    </form>
                </div>
            </div>
            <div class="footd2d3">
                <div class="footd2d3l">
                    <p class="dbrp">欢迎关注瑞足康官方微信或拨打400客服电话详询！</p>
                    <p class="dbrp1">Welcome to Bailingzu official or
                        call customer service phone for detailed inquiries</p><hr>
                    <div class="dbrd">
                        <img src="/custom/rzk/images/ico2.png">商务合作
                    </div>
                    <div class="dbrd">
                        <img src="/custom/rzk/images/ico3.png">在线咨询
                    </div>
                </div>
                <div class="footd2d3r">
                    <img src="/custom/rzk/images/ewm.png" align="" />
                </div>
            </div>
        </div>
        <div class="footd3">
            ©2000 www.rzk888.cn {{ config('rzk.info.info.company_name') }}
            <a href="https://beian.miit.gov.cn/" target="_self">沪ICP备18035853号-3</a>
{{--            站长统计 投资有风险，加盟需谨慎！--}}
        </div>
    </div>
</div>


<!--div class="backtop">
  <a href="#top">
    <img src="/images/ico20.png" />
  </a>
</div-->

<script>
    function chkform1(){
        if(document.getElementById("mobile1").value=="" || document.getElementById("mobile1").value.length<11){
            alert('请正确输入您的联系电话！');
            return false;
        }
        return true;
    }

    var url = window.location.href;
    document.getElementById('weburl1').value = url;

</script>

<!--  屏幕滚动效果  -->
<script>
    var number = 0
    var gd = 0
    //  向下滚动还是向下滚动
    var scrollFunc = function (e) {
        gd = e.wheelDelta;
    }
    if (document.addEventListener) {
        document.addEventListener('DOMMouseScroll', scrollFunc, false);
    }//W3C

    // window.onmousewheel = document.onmousewheel = scrollFunc; //IE/Opera/Chrome/Safari

    // scrop距离
    var isScrolling = false //是否在滚动
    listenAndScroll()

    // 无限滚动
    function listenAndScroll() {
        $(document).scroll(function () {
            var b = $(window).scrollTop();
            if (isScrolling) {
                return
            }//如果isScrolling为true就跳出去
            isScrolling = true
            var scrollGap = 790
            if (b > 0 && gd < 0) {
                let isBlock = b % scrollGap === 0 //%取余 余为零
                console.log(isBlock, b % scrollGap, b)
                if (isBlock) {
                    return isScrolling = false//如果isBlock为true就跳出并isScrolling = false
                    //跳出之后终止语句
                }
                let pos = (Math.floor(b / scrollGap) + 1) * scrollGap
                console.log(pos)
                $("html").animate({
                    scrollTop: pos
                }, "slowly", function () {
                    isScrolling = false;
                });

            }
            else if (b > 0 && gd > 0) {
                let isBlock2 = b % scrollGap === 0
                // console.log(b,isBlock2,scrollGap)
                if (isBlock2) return isScrolling = false
                let pos2 = (Math.ceil(b / scrollGap) - 1) * scrollGap
                console.log(pos2)
                $("html").animate({
                    scrollTop: pos2
                }, "slowly", function () {
                    isScrolling = false
                });
            }
            else {
                isScrolling = false
            }
        })
    }
</script>

<script type="text/javascript" src="/custom/rzk/js/modernizr.custom.js"></script>
<script type="text/javascript" src="/custom/rzk/js/jquery.dlmenu.js"></script>


@yield('js')
@yield('script')
@yield('custom-js')
@yield('custom-script')
</body>
</html>