<?php

$controller = "IndexController";


Route::get('/', function () {
    dd('testing');
});






Route::get('/ip1', function () {

    header('content-type:text/html;charset=utf-8');

    $ip = '54.36.148.99';
    $response = file_get_contents('http://ip.taobao.com/service/getIpInfo.php?ip='.$ip);
    $result   = json_decode($response);
    print_r($result);

//    $str = file_get_contents("http://www.yodao.com/smartresult-xml/search.s?type=ip&q=".$IP);
//    dd($str);

//    $url = 'https://ip.qq.com/cgi-bin/searchip?searchip1='.$IP;
//
//    $ch = curl_init($url);
//
//    curl_setopt($ch,CURLOPT_ENCODING ,'gb2312');
//
//    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
//
//    $result = curl_exec($ch);
//
//    $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码
//    dd($result);
//
//    curl_close($ch);
//
//    preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray);
//
//    $loc = $ipArray[1];
//
//    return $loc;


    $url = 'http://ip.qq.com/cgi-bin/searchip?searchip1='.$ip; // 腾讯
//    $url = 'http://int.dpool.sina.com.cn/iplookup/iplookup.php?format=json&ip='.$ip; // 新浪

//    $ch = curl_init($url);
//    curl_setopt($ch,CURLOPT_ENCODING ,'gb2312');
//    curl_setopt($ch, CURLOPT_TIMEOUT, 10);
//    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true) ; // 获取数据返回
//    $result = curl_exec($ch);
//    $result = mb_convert_encoding($result, "utf-8", "gb2312"); // 编码转换，否则乱码
//    curl_close($ch);
//
//    dd($result);
//    preg_match("@<span>(.*)</span></p>@iU",$result,$ipArray); //匹配标签，抓取查询到的ip地址(以数组的形式返回)
//    $location = $ipArray[0];
//    return $location;


//    $url="http://ip.taobao.com/service/getIpInfo.php?ip=".$IP;
//    print_r(file_get_contents($url));
//    $ipinfo=json_decode(file_get_contents($url));
//    dd($ipinfo);
//    if($ipinfo->code=='1'){
//        return false;
//    }
//    $city = $ipinfo->data->region.$ipinfo->data->city;
//    return $city;




});






Route::match(['get','post'], '/seo/youbangyun', "{$controller}@seo_youbangyun");
Route::match(['get','post'], '/seo/youbangyun/get', "{$controller}@seo_youbangyun_get");





Route::match(['get','post'], '/preg_match_all', function () {


    $post_data = request()->all();
    $content = $post_data["content"];

    $strPreg = '/(\s+src\s?\=)\s?[\'|"]([^\'|"]*)/is';
//    $strPreg = '/<\s*img\s+[^>]*?src\s*=\s*(\'|\")(.*?)\\1[^>]*?\/?\s*>/i';
    preg_match_all($strPreg, $content, $matches);

    $base_image_list = $matches[2];

    foreach ($base_image_list as $v)
    {

        $image_all_arr = explode(';', $v);
//        dd($type);
        $img_type_all = explode('/', $image_all_arr[0]);
//        dd($img_type_all);
        $postfix = $img_type_all[1];
//        dd($postfix);

        $img_content = explode(',',$image_all_arr[1]);
//        dd($img_content);

        //生成唯一图片名
        $image_name = time() . '_' . uniqid() . '.' . $postfix;
//        dd($image_name);

        //解码base64
//        dd($img_content[1]);
        $encodedData = $img_content[1];

        $encodedData = str_replace(' ','+', $encodedData);
        $decode_image = base64_decode($encodedData);


        // 如果字符串过长，还需要先替换再分段解码：
        $decode_image_1 = "";
        for ($i=0; $i < ceil(strlen($encodedData)/256); $i++)
        {
            $decode_image_1 = $decode_image_1 . base64_decode(substr($encodedData,$i*256,256));
        }



        $path = "./".date("Ymd",time());

        if (!is_dir($path)){ //判断目录是否存在 不存在就创建
            mkdir($path,0777,true);
        }

        $imageSrc= $path."/". $image_name; //图片名字

        $r = file_put_contents($imageSrc, $decode_image);//返回的是字节数
        if (!$r) {
            $tmparr1=array('data'=>null,"code"=>1,"msg"=>"{$imageSrc}图片生成失败");
            echo json_encode($tmparr1);
            echo "<br>";
        }else{
            $tmparr2=array('data'=>1,"code"=>0,"msg"=>"{$imageSrc}图片生成成功");
            echo json_encode($tmparr2);
            echo "<br>";
        }

        $r_1 = file_put_contents($imageSrc, $decode_image_1);//返回的是字节数
        if (!$r_1) {
            $tmparr1=array('data'=>null,"code"=>1,"msg"=>"{$imageSrc}图片生成失败");
            echo json_encode($tmparr1);
            echo "<br>";
        }else{
            $tmparr2=array('data'=>1,"code"=>0,"msg"=>"{$imageSrc}图片生成成功");
            echo json_encode($tmparr2);
            echo "<br>";
        }
    }

});


Route::match(['get','post'], '/preg_replace_large', function () {

    // 获取所有帖子内容中的图片
    preg_match_all('/(\s+src\s?\=)\s?[\'|"]([^\'|"]*)/is', $content, $topic_imgs);

    $base_image_list = $topic_imgs[2];
    foreach ($base_image_list as $k => $v){
        if(!strstr($v,'large')){
            $imgs = explode('.',$v);
            $base_image_list[$k] = str_replace($imgs[count($imgs)-2],$imgs[count($imgs)-2].'_large',$v);
        }
    }
    return $content;


});
Route::match(['get','post'], '/preg_replace_blank', function () {

    $text = '<div class="textContent"><p>测试空格   我前面有三个空格，我后面有也有3个空格，   后面是一张图片，</p><p></p><div class="media-wrap image-wrap"><img id="**" title="**" alt="**" loop="" controls="" src="https://pet.sonystyle.com.cn/content_pipeline/image/display/84855CBBB7C54BFAA074C1459DD6096B_large.jpg?t=1565074806"></div><p></p></div>';

//    $patterns = array();
////    $patterns[0] = "/\\n/";
//    $patterns[1] = "/ /";
//    $replacements = array();
////    $replacements[0] = "<br>";
//    $replacements[1] = "&nbsp";
//    $content = preg_replace($patterns, $replacements, $text);

/*    $pattern = '<p[^>]*?>[\w\W]*?<\/p>';*/


    $pattern = array (
        "/> *([^ ]*) *</", //去掉注释标记
    );
    $replace = array (
        ">\\1<",
    );

    $text = preg_replace($pattern, $replace, $text);

    return $text;

});







// Route::get('/send/email', $controller.'@send_email');

// Route::get('/send_sms', "{$controller}@send_sms");

Route::get('/image', "{$controller}@image");

Route::get('/eloquent', "{$controller}@eloquent");

Route::get('/eloquent', "{$controller}@eloquent");