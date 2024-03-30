@extends(env('TEMPLATE_LY_GPS__ADMIN').'layout.layout')


@section('head_title')
    @if(in_array(env('APP_ENV'),['local','dev'])){{ $local or 'L.' }}@endif
    {{ $title_text or '测试 - PHP' }} - GPS系统
@endsection




@section('header','')
@section('description') {{ $title_text or '测试 - PHP' }} - GPS系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">
@php

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

@endphp
</div>
@endsection




@section('custom-css')
@endsection
@section('custom-style')
@endsection



@section('custom-js')
@endsection
@section('custom-script')
<script>
    $(function() {
    });
</script>
@endsection