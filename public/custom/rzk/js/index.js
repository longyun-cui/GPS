$('.com_rab').click(function (){
    timer = setInterval(function () {
        var scrollTop = document.documentElement.scrollTop || document.body.scrollTop;
        var ispeed = Math.floor(-scrollTop / 6);
        if (scrollTop == 0) {
            clearInterval(timer);
        }
        document.documentElement.scrollTop = document.body.scrollTop = scrollTop + ispeed;
    }, 30)
});

/*about.html页tap导航 */
$(function(){
    $(".left_nav>div").click(function(){
        $(".left_nav div").removeClass("left_navav");
        var index=$(this).index();
        $(".common_c_right>div").stop(true,true).hide().eq(index).show();
        $(this).addClass("left_navav");
    });
});

/* ly.html 表单效验 */
function chkform(){
    if(document.getElementById("mobile").value==""){
        alert("请输入您的电话!");
        return false;
    }
    return true;
}