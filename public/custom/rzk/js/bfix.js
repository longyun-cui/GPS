document.writeln('<style type="text/css">');
document.writeln('.com_bottom{position:fixed;bottom:0;height:85px;width: 100%;z-index:9999;background: rgba(44, 91, 83, 0.93);}');
document.writeln('.com_main{width: 1200px;margin: 0 auto;}');
document.writeln('.com_l{width: 300px;float:left;}');
document.writeln('.com_l ul{width: 300px;padding:10px 0;}');
document.writeln('.com_l ul li{width: 729px;height:10px;float:left;margin:-8px -40px;}');
document.writeln('.com_l ul li img{width:160%;height:950%;}');
document.writeln('.com_c{width: 600px;float:left;padding:5px 40px;}');
document.writeln('.com_ctop{color: #0ba198;text-align: center;font-size: 14px;letter-spacing: 3px;}');
document.writeln('.user_infoa{margin:2px 0 0;}');
document.writeln('.user_infoa input{padding:0;border:1px solid #fff;}');
document.writeln('.user_infobt span{color:#fff;}');
document.writeln('.user_infobt input{background: none;color:#fff;}');
document.writeln('.user_info_btnb{margin-top:5px;width: 100%;padding-left: 0;color:#0ba198;}');
document.writeln('.user_info_btnb input{border-radius: 3px;border:none;outline:none;padding:0;}');
document.writeln('.user_info_btnb input[type=submit]{border-radius: 3px;border:none;outline:none;padding:0;margin-top:5px;width:80%;}');
document.writeln('.com_cbot{color:#fff;}');
document.writeln('.com_r{width: 300px;float:left;padding:35px 0;}');
document.writeln('.com_ra{width: 100%;padding-left: 10px;}');
document.writeln('.com_raa{width: 50%;}');
document.writeln('.com_rab{margin-left: 830px;vertical-align: top;width:10%;}');
document.writeln('.com_rb img{width:38%;}');
document.writeln('.buy_link { /*width:226px; height:50px;*/opacity:0.01; display:inline-block; text-decoration:none; /*margin-right:48px;*/}');

document.writeln('</style>');

document.writeln('<div class="com_bottom">');
document.writeln('<div class="com_main">');
document.writeln('<div class="com_l">');
document.writeln('<ul>');

document.writeln('<li><img src="/custom/rzk/images/zx.gif" alt=""/></li>');
/*document.writeln('<li><a href="https://tb.53kf.com/code/client/2a488203ed30386607efbce1a3f976a0/1"><img src="image/index/mfdh.png" alt=""/></a></li>');
document.writeln('<li><a href="https://tb.53kf.com/code/client/2a488203ed30386607efbce1a3f976a0/1"><img src="image/index/qqzx.png" alt=""/></a></li>');
document.writeln('<li><a href="https://tb.53kf.com/code/client/2a488203ed30386607efbce1a3f976a0/1"><img src="image/index/wxzx.png" alt=""/></a></li>');*/

document.writeln('<div class="clear"></div>');
document.writeln('</ul>');

document.writeln('</div>');

document.writeln('<div class="com_c">');
document.writeln('<div class="com_ctop">');
/*document.writeln('你离成功仅差一个电话，立即咨询');*/

document.writeln('</div>');


document.writeln('<div class="com_r">');
document.writeln('<div style="padding: -1px 10px 4px 7px; text-align:center;">');
document.writeln('<a style="margin-right: 39px;" class="buy_link" href="javascript:void(0);">瑞足康在线咨询点击</a>');
document.writeln('<a class="buy_link" href="https://tb.53kf.com/code/client/2a488203ed30386607efbce1a3f976a0/1">瑞足康免费电话图片</a>');
document.writeln('</div>');
document.writeln('<div class="com_ra">');
document.writeln('<img class="com_rab" id="com_rab" src="/templets/default/image/index/top.png" alt=""/>');
document.writeln('</div>');


document.writeln('</div>');
document.writeln('</div>');
document.writeln('</div>');



function chkforma(){
    if(document.getElementById("mobilea").value==""){
        alert("请输入您的电话!");
        return false;
    }
    return true;
}


