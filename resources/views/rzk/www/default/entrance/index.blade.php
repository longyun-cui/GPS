@extends(env('TEMPLATE_RZK_WEB_DEF').'layout.layout')


@section('head_title')瑞足康-社区养生@endsection
@section('meta_title')瑞足康-社区养生@endsection
@section('meta_author')瑞足康-社区养生@endsection
@section('meta_description')瑞足康-社区养生@endsection
@section('meta_keywords')瑞足康-社区养生@endsection


@section('content')
{{--banner--}}
<!--banner start-->
<div class="banner banner1" id="banner" >

    <a href="index.html#" class="d1" style="background:url('/custom/rzk/images/banner2.jpg') center no-repeat;background-size:100% 100%;"></a>
    <a href="index.html#" class="d1" style="background:url('/custom/rzk/images/banner3.jpg') center no-repeat;background-size:100% 100%;"></a>
    <a href="index.html#" class="d1" style="background:url('/custom/rzk/images/banner.jpg') center no-repeat;background-size:100% 100%;"></a>

    <div class="d2" id="banner_id">
        <ul>
            <li></li>
            <li></li>
            <li></li>
        </ul>
    </div>
</div>

<script type="text/javascript">
    function banner(){
        var bn_id = 0;
        var bn_id2= 1;
        var speed33=7000;
        var qhjg = 1;
        var MyMar33;
        $("#banner .d1").hide();
        $("#banner .d1").eq(0).fadeIn("slow");
        if($("#banner .d1").length>1)
        {
            $("#banner_id li").eq(0).addClass("nuw");
            function Marquee33(){
                bn_id2 = bn_id+1;
                if(bn_id2>$("#banner .d1").length-1)
                {
                    bn_id2 = 0;
                }
                $("#banner .d1").eq(bn_id).css("z-index","2");
                $("#banner .d1").eq(bn_id2).css("z-index","1");
                $("#banner .d1").eq(bn_id2).show();
                $("#banner .d1").eq(bn_id).fadeOut("slow");
                $("#banner_id li").removeClass("nuw");
                $("#banner_id li").eq(bn_id2).addClass("nuw");
                bn_id=bn_id2;
            };

            MyMar33=setInterval(Marquee33,speed33);

            $("#banner_id li").click(function(){
                var bn_id3 = $("#banner_id li").index(this);
                if(bn_id3!=bn_id&&qhjg==1)
                {
                    qhjg = 0;
                    $("#banner .d1").eq(bn_id).css("z-index","2");
                    $("#banner .d1").eq(bn_id3).css("z-index","1");
                    $("#banner .d1").eq(bn_id3).show();
                    $("#banner .d1").eq(bn_id).fadeOut("slow",function(){qhjg = 1;});
                    $("#banner_id li").removeClass("nuw");
                    $("#banner_id li").eq(bn_id3).addClass("nuw");
                    bn_id=bn_id3;
                }
            })
            $("#banner_id").hover(
                function(){
                    clearInterval(MyMar33);
                }
                ,
                function(){
                    MyMar33=setInterval(Marquee33,speed33);
                }
            )
        }
        else
        {
            $("#banner_id").hide();
        }
    }
</script>
<script type="text/javascript">banner()</script>
<!--banner end-->


{{----}}
<div class="indexd1bg">
    <div class="w indexd1">
        <div class="product-number-info" id="productNumber">
            <div class="product-number-inner">
                <ul class="q clearfix">
                    <li class="li-1">
                        <b>
                            <i id="productNumber_1" data-sum="300">10</i>
                            <sup>+</sup>
                        </b>
                        <p>覆盖城市</p>
                    </li>
                    <li class="li-2">
                        <b>
                            <i id="productNumber_2" data-sum="3000">100</i>
                            <sup>+</sup>
                        </b>
                        <p>品牌门店</p>
                    </li>
                    <li class="li-3">
                        <b>
                            <i id="productNumber_3" data-sum="10000">1000</i>
                            <sup>+</sup>
                        </b>
                        <p>就业人数</p>
                    </li>
                    <li class="li-4">
                        <b>
                            <i id="productNumber_4" data-sum="6500">1500</i>
                            <sup>万</sup>
                        </b>
                        <p>服务人次</p>
                    </li>
                    <!--li class="li-5">
                        <b>
                            <i id="productNumber_5" data-sum="1.2">0.1</i>
                            <em>亿</em>
                        </b>
                        <p>多功能厂区投资</p>
                    </li-->
                    <div style="clear:both;"></div>
                </ul>
            </div>
        </div>
        <div class="indexsp">
            <div class="indexspl">
                <video src="http://www.blz9.com/blz.mp4" poster="/custom/rzk/images/p30.jpg" controls="controls">your browser does not support the video tag</video>
            </div>
            <div class="indexspr">
                <div class="sprd">
                    <p class="spr1">健康中国，全民养生</p>
                    <p class="spr2">+</p>
                </div>

                <p class="spr3">瑞足康21年不忘初心   实力铸就辉煌-品牌成就未来</p><hr>
                <p class="spr4">上海瑞足康健康管理有限公司是是一家集健康产品研发和生产，养生技术研究，养
                    生连锁品牌经营，以及门店技术和管理人才培训为一体的综合性产业化企业，全国
                    运营总部位于上海，分别在江苏昆山和四川成都组建了两大品牌运营中心，旗下拥
                    有专属的足疗养生行业全能型人才培训商学院。</p>
                <br><br><br>
                <div class="spr5">了解更多<img src="/custom/rzk/images/ico1.png" /></div>
            </div>
        </div>
    </div>
</div>

{{--产业基地--}}
<div class="indexd2bg">
    <div class="w indexd2">
        <div class="d2t">产业联动-品牌实力保障</div>
        <div class="d2s"><div>瑞足康</div><div class="d2sz">4</div><div>大基地  + </div><div class="d2sz">3</div><div>大运营中心</div></div>
        <div class="d2p">
            <div class="d2p1">
                <img src="/custom/rzk/images/p1.png" />
                <img src="/custom/rzk/images/p2.png" />
                <img src="/custom/rzk/images/p3.png" />
                <img src="/custom/rzk/images/p4.png" />
            </div>
            <div class="d2p2">
                <div class="d2p21">
                    <img src="/custom/rzk/images/p5.png" />
                </div>
                <div class="d2p22">
                    <img src="/custom/rzk/images/p6.png" />
                    <img src="/custom/rzk/images/p7.png" />
                </div>
            </div>
        </div>
    </div>
</div>

{{--加盟创业--}}
<div class="indexd3bg">
    <div class="w indexd3">
        <div class="d2t" style="color: #fff;">多元项目-全面覆盖社区养生市场</div>
        <div class="d2s"><div>瑞足康</div><div class="d2sz">8</div><div>大主题养生服务</div></div>
        <div class="d3s">
            <div class="box">
                <img src="/custom/rzk/images/p8.png">
                <ul class="icon">
                    <li><a href="index.html#">足浴足疗</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">采用中国传统医术和刀法相结合<br>
            传承中药配方修护各种足部问题</span>
                </div>
            </div>
            <div class="box">
                <img src="/custom/rzk/images/p9.png">
                <ul class="icon">
                    <li><a href="index.html#">足部修复</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">采用中国传统医术和刀法相结合<br>
            传承中药配方修护各种足部问题</span>
                </div>
            </div>
            <div class="box">
                <img src="/custom/rzk/images/p10.png">
                <ul class="icon">
                    <li><a href="index.html#">中药熏蒸</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">蒸汽与皮肤接触，使毛孔扩张<br>
            排除毒素 促进血液循环</span>
                </div>
            </div>
            <div class="box">
                <img src="/custom/rzk/images/p11.png">
                <ul class="icon">
                    <li><a href="index.html#">经典艾灸</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">特艾条热刺激穴位及特定部位<br>
            经气活力，经脉通畅，理疗防病</span>
                </div>
            </div>
            <div class="box">
                <img src="/custom/rzk/images/p12.png">
                <ul class="icon">
                    <li><a href="index.html#">深度理疗</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">颈肩调理、肠胃调理、腰腿疼痛<br>
            三高调理、静脉曲张等深度理疗</span>
                </div>
            </div>
            <div class="box">
                <img src="/custom/rzk/images/p13.png">
                <ul class="icon">
                    <li><a href="index.html#">古法采耳</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">专业的工具，专业的采耳手法<br>
            带给人们独特的体验</span>
                </div>
            </div>
            <div class="box">
                <img src="/custom/rzk/images/p14.png">
                <ul class="icon">
                    <li><a href="index.html#">特色头疗</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">专业头疗手法促进人体阳气上升<br>
            从而疏经通络，活血养神</span>
                </div>
            </div>
            <div class="box">
                <img src="/custom/rzk/images/p15.png">
                <ul class="icon">
                    <li><a href="index.html#">科技养生</a></li>
                    <!--li><a href="#"><i class="fa fa-search"></i></a></li-->
                    <!--li><a href="#"><i class="fa fa-link"></i></a></li-->
                </ul>
                <div class="box-content">
                    <!--h3 class="title">Kristiana</h3-->
                    <span class="post">新养生科技融入传统养生门店<br>
            更精准高效的科学养生疗法</span>
                </div>
            </div>
        </div>
    </div>
</div>

{{--加盟创业--}}
<div class="indexd4bg">
    <div class="w indexd4">
        <div class="d2t">加盟创业 - 只选可信赖品牌</div>
        <div class="d4s"><div>瑞足康立足大健康行业</div><div class="d4sz">21</div><div>载，以专业铸就品牌</div></div>
        <div class="d4d">
            <ul>
                <li>
                    <!--div class="area-box">
                      <img src="images/p161.png" />
                      <span class="pulse delay-10"></span>
                      <span class="pulse delay-09"></span>
                      <span class="pulse delay-08"></span>
                    </div-->
                    <img src="/custom/rzk/images/p16.png" />
                    <div class="d4dd">
                        <p class="d4ddp1">正规品牌</p>
                        <p class="d4ddp2">商务部特许经营备案品牌<br>全国超两千家品牌门店<br>实力品牌更靠谱！</p>
                    </div>
                </li>
                <li>
                    <!--div class="area-box">
                      <img src="images/p171.png" />
                      <span class="pulse delay-10"></span>
                      <span class="pulse delay-09"></span>
                      <span class="pulse delay-08"></span>
                    </div-->
                    <img src="/custom/rzk/images/p17.png" />
                    <div class="d4dd">
                        <p class="d4ddp1">无忧创业</p>
                        <p class="d4ddp2">360°全方位全流程合作帮扶<br>帮您实现成功开店<br>无忧创业！</p>
                    </div>
                </li>
                <li>
                    <!--div class="area-box">
                      <img src="images/p181.png" />
                      <span class="pulse delay-10"></span>
                      <span class="pulse delay-09"></span>
                      <span class="pulse delay-08"></span>
                    </div-->
                    <img src="/custom/rzk/images/p18.png" />
                    <div class="d4dd">
                        <p class="d4ddp1">项目齐全</p>
                        <p class="d4ddp2">八大主题数十款健康养生项目<br>全面覆盖所有消费人群<br>门店生意更火爆！</p>
                    </div>
                </li>
                <li>
                    <!--div class="area-box">
                      <img src="images/p191.png" />
                      <span class="pulse delay-10"></span>
                      <span class="pulse delay-09"></span>
                      <span class="pulse delay-08"></span>
                    </div-->
                    <img src="/custom/rzk/images/p19.png" />
                    <div class="d4dd">
                        <p class="d4ddp1">免费培训</p>
                        <p class="d4ddp2">自有品牌商学院培训基地<br>提供免费全能型人才培训<br>助力门店可持续发展！</p>
                    </div>
                </li>
            </ul>
        </div>
    </div>
</div>

{{--创新模式--}}
<div class="indexd5bg">
    <div class="w indexd5">
        <div class="d2t" style="color: #fff;">创新模式-引领养生服务新未来</div>
        <div class="d5s"><div>瑞足康创新互联网+社区养生模式</div></div>
        <div class="d5d">
            <ul>
                <li>
                    <p class="d5dp">新服务</p>
                    <p class="d5dp1">专业技师<br>科技设备</p>
                </li>
                <li>
                    <p class="d5dp">新营销</p>
                    <p class="d5dp1">线上线下<br>全网销售</p>
                </li>
                <li>
                    <p class="d5dp">互联网</p>
                    <p class="d5dp1">O2O模式<br>会员体系</p>
                </li>
            </ul>
            <div class="d5d1">传统门店只能做商圈内及周边的生意，瑞足康结合线上小程序平台<br>
                覆盖更多亚健康人群，线上线下多渠道体验瑞足康的健康养生服务</div>
            <div class="d5d2">轻量投资&emsp;&emsp;&emsp;灵活选址&emsp;&emsp;&emsp;无需经验&emsp;&emsp;&emsp;集团实力&emsp;&emsp;&emsp;全程帮扶 </div>
        </div>
    </div>
</div>
<div class="mindexd5bg">
    <img src="/custom/rzk/images/m1.png" alt="" />
</div>

{{--全程帮扶--}}
<div class="indexd6bg">
    <div class="w indexd6">
        <div class="d2t">全程帮扶-创业开店更轻松</div>
        <div class="d6s"><div>瑞足康</div><div class="d6sz">9</div><div>大帮扶政策</div></div>
        <div class="d6d">
            <div class="d6d1">全方位创业帮扶，全程指导开店管店，轻松营收</div>
            <div class="d6d2">
                <div class="d6d21">
                    <ul>
                        <li><img src="/custom/rzk/images/p20.png" /></li>
                        <li><img src="/custom/rzk/images/p21.png" /></li>
                        <li><img src="/custom/rzk/images/p22.png" /></li>
                        <li><img src="/custom/rzk/images/p23.png" /></li>
                    </ul>
                </div>
                <div class="d6d22">
                    <img src="/custom/rzk/images/p24.png" />
                </div>
                <div class="d6d23">
                    <ul>
                        <li><img src="/custom/rzk/images/p25.png" /></li>
                        <li><img src="/custom/rzk/images/p26.png" /></li>
                        <li><img src="/custom/rzk/images/p27.png" /></li>
                        <li><img src="/custom/rzk/images/p28.png" /></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>

{{--百城千店--}}
<div class="indexd7bg">
    <div class="w indexd7">
        <div class="d2t" style="color: #fff;">百城千店-成功模式，轻松复制</div>
        <div class="d7d1">瑞足康3000+门店遍布全国为中国大健康事业腾飞助力</div>
        <div class="d7d">
            <img src="/custom/rzk/images/p29.png" alt="瑞足康">
        </div>
        <div class="d7s"><div>我们帮助了众多人创富成功 ，他们成功了，你同样也可以</div></div>
    </div>
</div>
<div class="mindexd7bg">
    <img src="/custom/rzk/images/m2.png" alt="" />
</div>


{{--新闻动态--}}
<div class="indexd8bg">
    <div class="w indexd8">
        <div class="d2t">新闻动态</div>
        <div class="d8d">
            <div class="zyxwd2">
                <div class="zyxwd31">
                    <b>公司新闻</b> | COMPANY&nbsp;NEWS<br>
                    创新服务 - 全力为客户创造更大价值
                    <div class="zyxwd22"><a href="/news/index">MORE&nbsp;&gt;</a></div>
                </div>

                <ul>
                    <li>
                        <a href="/custom/rzk/newsdetail/100.html">
                            <img src="/custom/rzk/uploads/20221126/7c5a5ee1ad74e4a04b964ce00f4ebfee.png" alt='上海沐浴行业协会足道专业委员会二届三次秘书处会议圆满召开，瑞足康品牌于世才先生受聘为专委会执行秘书长' ></img>
                        </a>
                        <div class="zyxwd212">
                            <a href="/custom/rzk/newsdetail/100.html">
                                <b>上海沐浴行业协会足道专业委员会二届三次秘</b>
                            </a><hr>
                            <p class="zyxwp1"><a href="/custom/rzk/newsdetail/100.html">2022年11月25日下午16:00，上海沐浴行业协会足道专业委员会二届三次秘书处会议在上海足霸天下...</a></p>
                            <p class="zyxwp">2022-11-26</p>
                        </div>
                    </li>
                    <li>
                        <a href="/custom/rzk/newsdetail/99.html">
                            <img src="/custom/rzk/uploads/20221124/3d90293b92f8dd0eaa7e4c667c4d0863.png" alt='上海沐浴行业协会足道专业委员会二届二次理事会成功召开' ></img>
                        </a>
                        <div class="zyxwd212">
                            <a href="/custom/rzk/newsdetail/99.html">
                                <b>上海沐浴行业协会足道专业委员会二届二次理</b>
                            </a><hr>
                            <p class="zyxwp1"><a href="/custom/rzk/newsdetail/99.html">2022年11月23日，上海沐浴行业协会足道专业委员会二届二次理事会在瑞足康华东品牌运营中心顺利召开...</a></p>
                            <p class="zyxwp">2022-11-24</p>
                        </div>
                    </li>
                    <li>
                        <a href="/custom/rzk/newsdetail/98.html">
                            <img src="/custom/rzk/uploads/20211120/51e790717fbc8aa865e6d1b2c72bc097.jpg" alt='上海沐浴行业协会足道专业委员会二届一次副主任会议隆重召开' ></img>
                        </a>
                        <div class="zyxwd212">
                            <a href="/custom/rzk/newsdetail/98.html">
                                <b>上海沐浴行业协会足道专业委员会二届一次副</b>
                            </a><hr>
                            <p class="zyxwp1"><a href="/custom/rzk/newsdetail/98.html">2021年11月18日，上海沐浴行业协会足道专业委员会二届一次副主任会议在上海大桶大总部召开，参会人...</a></p>
                            <p class="zyxwp">2021-11-20</p>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="zyxwd3">
                <div class="zyxwd31">
                    <b>行业动态</b> | INDUSTRY&nbsp;DYNAMICS<br>
                    不断思考、不断分享、不断进步
                    <div class="zyxwd22"><a href="/news/hangye">MORE&nbsp;&gt;</a></div>
                </div>

                <ul>
                    <li>
                        <a href="/custom/rzk/newsdetail/95.html">
                            <img src="/custom/rzk/images/p30.jpg" alt='秋天是足疗养生的黄金时期！'></img>
                        </a>
                        <div class="zyxwd212">
                            <a href="/custom/rzk/newsdetail/95.html">
                                <b>秋天是足疗养生的黄金时期！</b>
                            </a><hr>
                            <p class="zyxwp1"><a href="/custom/rzk/newsdetail/95.html">秋天是足疗养生的黄金时期！秋天是养生的好时机，但养生不一定要通过吃东西来完成。它可以通过足疗。足疗有...</a></p>
                            <p class="zyxwp">2021-05-29</p>
                        </div>
                    </li>
                    <li>
                        <a href="/custom/rzk/newsdetail/91.html">
                            <img src="/custom/rzk/uploads/20211107/001180467496f0fe84fabbba2aa5406b.png" alt='瑞足康足疗让你爱上它' ></img>
                        </a>
                        <div class="zyxwd212">
                            <a href="/custom/rzk/newsdetail/91.html">
                                <b>瑞足康足疗让你爱上它</b>
                            </a><hr>
                            <p class="zyxwp1"><a href="/custom/rzk/newsdetail/91.html">瑞足康足疗让你爱上它，足疗体验是好是坏。商家说的不算数。消费者的体验很重要。一位刚刚接受过几次足部护...</a></p>
                            <p class="zyxwp">2021-11-07</p>
                        </div>
                    </li>
                    <li>
                        <a href="/custom/rzk/newsdetail/86.html">
                            <img src="/custom/rzk/uploads/20211107/af0fe903e840038b151d3f6a4d1becfc.png" alt='加盟上海瑞足康不只是客人满满' ></img>
                        </a>
                        <div class="zyxwd212">
                            <a href="/custom/rzk/newsdetail/86.html">
                                <b>加盟上海瑞足康不只是客人满满</b>
                            </a><hr>
                            <p class="zyxwp1"><a href="/custom/rzk/newsdetail/86.html">上海瑞足康修脚店在当今的社会上那是相当的受欢迎，而且也是众多的足疗店当中不可或缺的组成部分，而且在年...</a></p>
                            <p class="zyxwp">2021-11-07</p>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>

<div class="clear"></div>


<!--div class="backtop">
  <a href="#top">
    <img src="/images/ico20.png" />
  </a>
</div-->


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

@endsection