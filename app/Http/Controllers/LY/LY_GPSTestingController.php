<?php

namespace App\Http\Controllers\LY;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\DEF\Def_Testing;

use App\Repositories\LY\LY_GPSTestingRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;

class LY_GPSTestingController extends Controller
{
    //
    private $service;
    private $repo;

    public function __construct()
    {
        $this->repo = new LY_GPSTestingRepository();
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
    public function test_php_headers()
    {
        $headers = apache_request_headers();
        $headers = getallheaders();
        dd($headers);
        $header = request()->header();
        dd($header);
    }

    //
    public function test_php_plus_plus()
    {
        $x=15;
        echo "y=15 x++=".$x++;
        echo "<br>";
        $y=20;
        echo "y=20 ++y=".++$y;
//        return view('test');
    }

    //
    public function test_php_numbers()
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
        echo "request()->path() ---- ".request()->path()."<br>";
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
