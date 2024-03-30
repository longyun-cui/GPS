@extends(env('TEMPLATE_LY_GPS__ADMIN').'layout.layout')


@section('head_title')
    @if(in_array(env('APP_ENV'),['local','dev'])){{ $local or 'L.' }}@endif
    {{ $title_text or '测试 - JS' }} - GPS系统
@endsection




@section('header','')
@section('description') {{ $title_text or '测试 - JS' }} - GPS系统@endsection
@section('breadcrumb')
    <li><a href="{{ url('/') }}"><i class="fa fa-home"></i>首页</a></li>
@endsection
@section('content')
<div class="full-container">


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


        console.log('"" = ' + typeof(''));
        if('') console.log('"" is true');
        else console.log('"" is false');

        console.log('"0" = ' + typeof('0'));
        if('0') console.log('"0" is true');
        else console.log('"0" is false');

        console.log('0 = ' + typeof(0));
        if(0) console.log('0 is true');
        else console.log('0 is false');

        console.log('0.00 = ' + typeof(0.00));
        if(0.00) console.log('0.00 is true');
        else console.log('0.00 is false');

        console.log('null = ' + typeof(null));
        if(null) console.log('null is true');
        else console.log('null is false');

        console.log('undefined = ' + typeof(undefined));
        if(undefined) console.log('undefined is true');
        else console.log('undefined is false');

        console.log('[] = ' + typeof([]));
        if([]) console.log('[] is true');
        else console.log('[] is false');

        console.log('{} = ' + typeof({}));
        if({}) console.log('{} is true');
        else console.log('{} is false');

        var $object = {'a':'x','b':'y'};
        $object.c = 'z';
        console.log($object);

        var $object1 = new Object();
        $object1.o = 'a';
        $object1.p = 'b';
        $object1.q = 'c';
        console.log($object1);

        var $array = ['x','y'];
        console.log($array);
        console.log($array.length);

        var $regex = new RegExp("abc", "ig");
        console.log($regex.constructor);



    });
</script>
@endsection