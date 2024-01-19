<?php

namespace App\Http\Controllers\GPS\Def;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DEF\Def_Testing;

use App\Repositories\GPS\Def\GPSTestingRepository;

use Image;
use phpDocumentor\Reflection\Types\Object_;

class GPSTestingController extends Controller
{
    //
    private $service;
    private $repo;

    public function __construct()
    {
        $this->repo = new GPSTestingRepository();
    }


    //
    public function root()
    {
        return $this->repo->root();
    }


    //
    public function js()
    {
        return $this->repo->t_js();
    }


    //
    public function php()
    {
        return $this->repo->t_php();
    }


    //
    public function test_headers()
    {
        $headers = apache_request_headers();
        $headers = getallheaders();
        dd($headers);
        $header = request()->header();
        dd($header);
    }

    //
    public function test_plus_plus()
    {
        $x=15;
        echo "y=15 x++=".$x++;
        echo "<br>";
        $y=20;
        echo "y=20 ++y=".++$y;
//        return view('test');
    }

    //
    public function test_plus_numbers()
    {
        $object = new class{};
        if($object) echo 1;
        else echo 0;
        echo '<br>';

        $array = [];
        if($array) echo 1;
        else echo 0;
        echo '<br>';


        $num_arr[] = null;
        $num_arr[] = "";
        $num_arr[] = "1789";
        $num_arr[] = "1789 ";
        $num_arr[] = " 1789 ";
        $num_arr[] = "1.5";
        $num_arr[] = "1.5 ";
        $num_arr[] = " 1.5 ";
        $num_arr[] = "-1.1 元";
        $num_arr[] = " 1.1 元";
        $num_arr[] = " 1.23 元";
        $num_arr[] = " 1.225 元";
        $num_arr[] = " 1.5 元";
        $num_arr[] = " 1 元";
        $num_arr[] = "十五元";

        foreach($num_arr as $num)
        {
            echo '【'.$num.'】';
            echo '<br>';
            echo '[var_dump] => ';
            var_dump($num);
            echo '<br>';
            echo '[trim] => ';
            var_dump(trim($num));
            echo '<br>';
            echo '[is_numeric] => ';
            var_dump(is_numeric($num));
            echo '<br>';
            echo '[ctype_digit] => ';
            var_dump(ctype_digit($num));
            echo '<br>';

            $num_i = intval($num);
            $num_f = floatval($num);
            $num_2 = floor(floatval($num) * 100)/100;

            print_r('intval($num) => '.$num_i.'<br>');
            print_r('floatval($num) => '.$num_f.'<br>');
            print_r('取2位小数 => '.$num_2.'<br>');
            print_r('round取2位 => '.round(floatval($num), 2).'<br>');
            $temp_date = (!empty($num) && (floor($num_f*100)/100 == $num_f) && $num_f >= 0) ? $num_f : 0;
            print_r($temp_date);
            echo '<br>';
            echo '<br>';
        }
    }

    //
    public function test_php_url()
    {
        echo "url()->full() ---- ".url()->full()."<br>";
        echo "url()->current() ---- ".url()->current()."<br>";
        echo "url()->previous() ---- ".url()->previous()."<br><br>";

        echo "request()->url() ---- ".request()->url()."<br>";
        echo "request()->getRequestUri() ---- ".request()->getRequestUri()."<br><br>";

        echo '$_SERVER["PHP_SELF"] ---- '.$_SERVER['PHP_SELF']."<br>";
        echo '$_SERVER["HTTP_HOST"] ---- '.$_SERVER['HTTP_HOST']."<br>";
        echo '$_SERVER["SERVER_NAME"] ---- '.$_SERVER['SERVER_NAME']."<br>";
        echo '$_SERVER["SERVER_PORT"] ---- '.$_SERVER['SERVER_PORT']."<br>";
        echo '$_SERVER["REQUEST_URI"] ---- '.$_SERVER['REQUEST_URI']."<br>";
        echo '$_SERVER["QUERY_STRING"] ---- '.$_SERVER["QUERY_STRING"]."<br><br>";
        echo '$_SERVER["HTTP_REFERER"] ---- '.$_SERVER['HTTP_REFERER']."<br>";

        echo request()->route()->getName()."<br>";
        echo request()->route()->getActionName()."<br><br><br><br>";

        echo 'public_path(uploads) ---- '.public_path('uploads')."<br>";
        echo 'base_path(uploads) ---- '.base_path('uploads')."<br>";
        echo 'app_path(uploads) ---- '.app_path('uploads')."<br>";
        echo 'resource_path(uploads) ---- '.resource_path('uploads')."<br>";
        echo 'storage_path(uploads) ---- '.storage_path('uploads')."<br>";
    }


    //
    public function test_php_json()
    {
        $array = ["id"=>["xx"=>1,"yy"=>"abc"]];

        echo json_encode($array);
    }




    public function get_php_ip_location()
    {
        define('WEB_ROOT', dirname(__FILE__));
        echo $this->convertip('54.36.148.99','full');
    }






    public function convertip($ip,$integrity='simple'){

        $return='';
        $integrity=in_array($integrity,array('simple','full'))?$integrity:'simple';
        if(preg_match("/^\d{1,3}\.\d{1,3}\.\d{1,3}\.\d{1,3}$/",$ip)){
            $iparray=explode('.',$ip);
            if($iparray[0]==10||$iparray[0]==127||($iparray[0]==192&&$iparray[1]==168)||($iparray[0]==172&&($iparray[1]>=16&&$iparray[1]<=31))){
                $return='- LAN';
            }elseif($iparray[0]>255||$iparray[1]>255||$iparray[2]>255||$iparray[3]>255){
                $return='- Invalid IP Address';
            }else{
                $tinyipfile=WEB_ROOT.'./tinyipdata.dat';//IP==地址数据包精简版
                $fullipfile=WEB_ROOT.'./wry.dat';//IP==地址数据包完整版
                if($integrity=='simple'&&@file_exists($tinyipfile)){
                    $return=convertip_tiny($ip,$tinyipfile);
                }elseif(@file_exists($fullipfile)){
                    $return=convertip_full($ip,$fullipfile);
                }
            }
        }
        return $return;
    }
    public function convertip_tiny($ip,$ipdatafile){
        static $fp=NULL,$offset=array(),$index=NULL;
        $ipdot=explode('.',$ip);
        $ip=pack('N',ip2long($ip));
        $ipdot[0]=(int)$ipdot[0];
        $ipdot[1]=(int)$ipdot[1];
        if($fp===NULL&&$fp=@fopen($ipdatafile,'rb')){
            $offset=@unpack('Nlen',@fread($fp,4));
            $index=@fread($fp,$offset['len']-4);
        }elseif($fp==FALSE){
            return '- Invalid IP data file';
        }
        $length=$offset['len']-1028;
        $start =@unpack('Vlen',$index[$ipdot[0]*4].$index[$ipdot[0]*4+1].$index[$ipdot[0]*4+2].$index[$ipdot[0]*4+3]);
        for ($start=$start['len']*8+1024;$start<$length;$start+=8){
            if ($index{$start}.$index{$start+1}.$index{$start+2}.$index{$start+3}>=$ip){
                $index_offset=@unpack('Vlen',$index{$start+4}.$index{$start+5}.$index{$start+6}."\x0");
                $index_length=@unpack('Clen',$index{$start+7});
                break;
            }
        }
        @fseek($fp,$offset['len']+$index_offset['len']-1024);
        if($index_length['len']){
            return '- '.@fread($fp,$index_length['len']);
        }else{
            return '- Unknown';
        }
    }
    public function convertip_full($ip,$ipdatafile){
        if(!$fd=@fopen($ipdatafile,'rb')){
            return '- Invalid IP data file';
        }
        $ip=explode('.',$ip);
        $ipNum=$ip[0]*16777216+$ip[1]*65536+$ip[2]*256+$ip[3];
        if(!($DataBegin=fread($fd,4))||!($DataEnd=fread($fd,4))) return;
        @$ipbegin=implode('',unpack('L',$DataBegin));
        if($ipbegin<0) $ipbegin+=pow(2,32);
        @$ipend=implode('',unpack('L',$DataEnd));
        if($ipend<0) $ipend+=pow(2,32);
        $ipAllNum=($ipend-$ipbegin)/7+1;
        $BeginNum=$ip2num=$ip1num=0;
        $ipAddr1=$ipAddr2='';
        $EndNum=$ipAllNum;
        while($ip1num>$ipNum||$ip2num<$ipNum){
            $Middle= intval(($EndNum+$BeginNum)/2);
            fseek($fd,$ipbegin+7*$Middle);
            $ipData1=fread($fd,4);
            if(strlen($ipData1)<4){
                fclose($fd);
                return '- System Error';
            }
            $ip1num=implode('',unpack('L',$ipData1));
            if($ip1num<0) $ip1num+=pow(2,32);
            if($ip1num>$ipNum){
                $EndNum=$Middle;
                continue;
            }
            $DataSeek=fread($fd,3);
            if(strlen($DataSeek)<3){
                fclose($fd);
                return '- System Error';
            }
            $DataSeek=implode('',unpack('L',$DataSeek.chr(0)));
            fseek($fd,$DataSeek);
            $ipData2=fread($fd,4);
            if(strlen($ipData2)<4){
                fclose($fd);
                return '- System Error';
            }
            $ip2num=implode('',unpack('L',$ipData2));
            if($ip2num<0) $ip2num+=pow(2,32);
            if($ip2num<$ipNum){
                if($Middle==$BeginNum){
                    fclose($fd);
                    return '- Unknown';
                }
                $BeginNum=$Middle;
            }
        }
        $ipFlag=fread($fd,1);
        if($ipFlag==chr(1)){
            $ipSeek=fread($fd,3);
            if(strlen($ipSeek)<3){
                fclose($fd);
                return '- System Error';
            }
            $ipSeek=implode('',unpack('L',$ipSeek.chr(0)));
            fseek($fd,$ipSeek);
            $ipFlag=fread($fd,1);
        }
        if($ipFlag==chr(2)){
            $AddrSeek=fread($fd,3);
            if(strlen($AddrSeek)<3){
                fclose($fd);
                return '- System Error';
            }
            $ipFlag=fread($fd,1);
            if($ipFlag==chr(2)){
                $AddrSeek2=fread($fd,3);
                if(strlen($AddrSeek2)<3){
                    fclose($fd);
                    return '- System Error';
                }
                $AddrSeek2=implode('',unpack('L',$AddrSeek2.chr(0)));
                fseek($fd,$AddrSeek2);
            }else{
                fseek($fd,-1,SEEK_CUR);
            }
            while(($char=fread($fd,1)) != chr(0))
                $ipAddr2 .= $char;
            $AddrSeek=implode('',unpack('L',$AddrSeek.chr(0)));
            fseek($fd,$AddrSeek);
            while(($char=fread($fd,1)) != chr(0))
                $ipAddr1 .= $char;
        }else{
            fseek($fd,-1,SEEK_CUR);
            while(($char=fread($fd,1)) != chr(0))
                $ipAddr1 .= $char;
            $ipFlag=fread($fd,1);
            if($ipFlag==chr(2)){
                $AddrSeek2=fread($fd,3);
                if(strlen($AddrSeek2)<3){
                    fclose($fd);
                    return '- System Error';
                }
                $AddrSeek2=implode('',unpack('L',$AddrSeek2.chr(0)));
                fseek($fd,$AddrSeek2);
            }else{
                fseek($fd,-1,SEEK_CUR);
            }
            while(($char=fread($fd,1)) != chr(0))
                $ipAddr2 .= $char;
        }
        fclose($fd);
        if(preg_match('/http/i',$ipAddr2)){
            $ipAddr2='';
        }
        $ipaddr="$ipAddr1 $ipAddr2";
        $ipaddr=preg_replace('/CZ88\.NET/is','',$ipaddr);
        $ipaddr=preg_replace('/^\s*/is','',$ipaddr);
        $ipaddr=preg_replace('/\s*$/is','',$ipaddr);
        if(preg_match('/http/i',$ipaddr)||$ipaddr==''){
            $ipaddr='- Unknown';
        }
        return '- '.$ipaddr;
    }


    public function seo_youbangyun()
    {
        $post_data['content'] = json_encode(request()->all());
//        dd($post_data);

        $mine = new RootTesting;
        $bool = $mine->fill($post_data)->save();
        if($bool) echo 1;
        else echo 2;
    }


    public function seo_youbangyun_get()
    {

        $data = RootTesting::select("*")->get();

        $dataX = array();
        foreach ($data as $k => $v) {
            $dataX[$k] = json_decode($v->content,true);
        }

        dd($dataX);
    }

    public function image()
    {
        $string = 'The quick brown fox 你好 over the lazy dog.';
        $encode = mb_detect_encoding($string, array("ASCII","UTF-8","GB2312","GBK","BIG5"));
//        dd($encode);

        $string = utf8_encode('The quick brown fox 你好 <br> over the lazy dog.');
//        dd($string);

//        $de = file_exists(public_path().'/fonts/Apple Braille Pinpoint 8 Dot.ttf');
//        dd($de);

//        $img->text('The quick brown \r\n fox jumps over the lazy dog.');

        $font_file = public_path().'/fonts/huawenkaiti.ttf';
        $font_2 = public_path().'/fonts/huawenkaiti.ttf';

        $img = Image::canvas(400, 500, '#fafafa');

//        $string1 = "上海如哉网络科技有限公司技术支持";
//        $img->text($string1, 100, 100, function($font) {
//            $font->file(public_path().'/fonts/huawenkaiti.ttf');
//            $font->size(16);
//            $font->color('#111');
//            $font->align('center');
//            $font->valign('top');
//            $font->angle(45);
//        });


        $type = '活动';
        $img->text($type, 200, 50, function($font) use ($font_file) {
            $font->file($font_file);
            $font->size(16);
            $font->color('#111');
            $font->align('center');
            $font->valign('bottom');
        });

        $points1 = array(
            30,  60,  // Point 1 (x, y)
            370,  60, // Point 2 (x, y)
            30,  60,  // Point 3 (x, y)
        );
        $img->polygon($points1, function ($draw) {
            $draw->background('#0000ff');
            $draw->border(1, '#000');
        });


        $title = "2017天津How I Treat和淋巴瘤转化医学国际研讨会";
        $title = $this->autowrap(16, 0, $font_file, $title, 280); // 自动换行处理
        $img->text($title, 200, 100, function($font) use ($font_file) {
            $font->file($font_file);
            $font->size(24);
            $font->color('#111');
            $font->align('center');
            $font->valign('top');
        });

        $qrcode = Image::make(storage_path('/resource/org/1/unique/articles/qrcode_article_1c0305df.png'));
        $img->insert($qrcode, 'bottom-right',120, 80);

        $logo = Image::make(storage_path('/resource/org/1/common/logo/bad6e5419672af95690d4664fb849961.png'));
        $logo->resize(40, 40);

        // define polygon points
        $points = array(
            1,  1,  // Point 1 (x, y)
            39,  1, // Point 2 (x, y)
            39,  39,  // Point 3 (x, y)
            1, 39,  // Point 4 (x, y)
        );
        $logo->polygon($points, function ($draw) {
//            $draw->background('#0000ff');
            $draw->border(1, '#ffffff');
        });
        $img->insert($logo, 'bottom-right',180, 140);

        $org_name = "上海如哉网络科技有限公司";
        $img->text($org_name, 200, 450, function($font) use ($font_file) {
            $font->file($font_file);
            $font->size(16);
            $font->color('#111');
            $font->align('center');
            $font->valign('top');
        });

        return $img->response('png');

//        $text="2017天津How I Treat和淋巴瘤转化医学国际研讨会";//显示的文字
//        $size=12;//字体大小
//        $font=public_path().'/fonts/huawenkaiti.ttf';//字体类型，这里为黑体，具体请在windows/fonts文件夹中，找相应的font文件
//        $img=imagecreate(200,44);//创建一个长为500高为16的空白图片
//        imagecolorallocate($img,0xff,0xff,0xff);//设置图片背景颜色，这里背景颜色为#ffffff，也就是白色
//        $black=imagecolorallocate($img,0x00,0x00,0x00);//设置字体颜色，这里为#000000，也就是黑色
//        imagettftext($img,$size,0,0,16,$black,$font,$text);//将ttf文字写到图片中
//        header('Content-Type: image/png');//发送头信息
//        imagepng($img);//输出图片，输出png使用imagepng方法，输出gif使用imagegif方法


//        header ("Content-type: image/png");
//        mb_internal_encoding("UTF-8"); // 设置编码
//
//        $bg = imagecreatetruecolor(300, 300); // 创建画布
//        $black = imagecolorallocate($bg, 0, 0, 0); // 创建白色
//        $white = imagecolorallocate($bg, 255, 255, 255); // 创建白色
//        $text = "前段时间练习使用 PHP 的 GD 库时，为了文本的";
//
//        $text = $this->autowrap(16, 0, $font_face, $text, 280); // 自动换行处理
//// 若文件编码为 GB2312 请将下行的注释去掉
//// $text = iconv("GB2312", "UTF-8", $text);
//        imagettftext($bg, 16, 0, 10, 30, $white, $font_face, $text);
//        imagepng($bg);
//        imagedestroy($bg);

    }

    public function autowrap($font_size, $angle, $font_face, $string, $width)
    {
//        这几个变量分别是 字体大小, 角度, 字体名称, 字符串, 预设宽度
        $content = "";

        // 将字符串拆分成一个个单字 保存到数组 letter 中
        for ($i=0;$i<mb_strlen($string);$i++)
        {
            $letter[] = mb_substr($string, $i, 1);
        }

        foreach ($letter as $l)
        {
            $test_str = $content." ".$l;
            $test_box = imagettfbbox($font_size, $angle, $font_face, $test_str);

            // 判断拼接后的字符串是否超过预设的宽度
            if (($test_box[2] > $width) && ($content !== ""))
            {
                $content .= "\n";
            }
            $content .= $l;
        }
        return $content;
    }



}
