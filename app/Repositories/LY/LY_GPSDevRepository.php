<?php
namespace App\Repositories\LY;

use App\Models\GPS\GPS_User;
use App\Models\GPS\GPS_Item;
use App\Models\GPS\GPS_Menu;

use App\Repositories\Common\CommonRepository;

use Response, Auth, Validator, DB, Exception, Cache, Blade, Carbon;
use QrCode, Excel;

class LY_GPSDevRepository {

    private $env;
    private $auth_check;
    private $me;
    private $me_admin;
    private $modelUser;
    private $modelItem;
    private $view_blade_403;
    private $view_blade_404;

    public function __construct()
    {
        $this->modelUser = new GPS_User;
        $this->modelItem = new GPS_Item;

        $this->view_blade_403 = env('TEMPLATE_LY_GPS__DEV__UI').'entrance.errors.403';
        $this->view_blade_404 = env('TEMPLATE_LY_GPS__DEV__UI').'entrance.errors.404';

        Blade::setEchoFormat('%s');
        Blade::setEchoFormat('e(%s)');
        Blade::setEchoFormat('nl2br(e(%s))');

        if(isMobileEquipment()) $is_mobile_equipment = 1;
        else $is_mobile_equipment = 0;
        view()->share('is_mobile_equipment',$is_mobile_equipment);
    }


    // 登录情况
    public function get_me()
    {
        if(Auth::guard("gps_admin")->check())
        {
            $this->auth_check = 1;
            $this->me = Auth::guard("gps_admin")->user();
            $me = $this->me;
            if($me->birth_day)
            {
                $diff = time_diff($me->birth_day);
                $this->me->diff = $diff;
            }
            view()->share('me',$this->me);
        }
        else $this->auth_check = 0;

        view()->share('auth_check',$this->auth_check);

        if(isMobileEquipment()) $is_mobile_equipment = 1;
        else $is_mobile_equipment = 0;
        view()->share('is_mobile_equipment',$is_mobile_equipment);
    }




    // 主页
    public function view_dev_index()
    {
//        dd('view_dev_index');

        $this->get_me();
        $me = $this->me;
//        dd($me->toArray());

        $view_blade = env('TEMPLATE_LY_GPS__DEV').'entrance.index';
        return view($view_blade);
    }


    // 返回（后台）主页视图
    public function view_dev_404()
    {
        $this->get_me();
        $view_blade = env('TEMPLATE_LY_GPS__DEV').'entrance.errors.404';
        return view($view_blade);
    }


    // 返回（后台）主页视图
    public function view_dev_ui()
    {
        $this->get_me();
        $view_blade = env('TEMPLATE_LY_GPS__DEV__UI').'entrance.index';
        return view($view_blade);
    }




    // 主页
    public function view_admin_style()
    {
        $this->get_me();
        $me = $this->me;
//        dd($me->toArray());

        $view_blade = env('TEMPLATE_LY_GPS__DEV__UI').'entrance.style';
        return view($view_blade);
    }








}