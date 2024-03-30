<?php

namespace App\Http\Controllers\LY;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GPS\GPS_User;

use App\Repositories\LY\LY_GPSDevRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;


class LY_GPSDevController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new LY_GPSDevRepository();
    }








    // 返回主页视图
    public function view_dev_index()
    {
//        dd(1);
        return $this->repo->view_dev_index();
    }

    // 返回主页视图
    public function view_dev_404()
    {
        return $this->repo->view_dev_404();
    }

    // 返回主页视图
    public function view_dev_ui()
    {
        return $this->repo->view_dev_ui();
    }

    // 返回主页视图
    public function view_admin_style()
    {
//        dd(1);
        return $this->repo->view_admin_style();
    }




    /*
     * 用户基本信息
     */
    // 【基本信息】返回-视图
    public function view_my_profile_info_index()
    {
        return $this->repo->view_my_profile_info_index();
    }
    // 【基本信息】编辑
    public function operate_my_profile_info_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_my_profile_info_edit();
        else if (request()->isMethod('post')) return $this->repo->operate_my_profile_info_save(request()->all());
    }
    // 【基本信息】修改-密码
    public function operate_my_account_password_change()
    {
        if(request()->isMethod('get')) return $this->repo->view_my_account_password_change();
        else if (request()->isMethod('post')) return $this->repo->operate_my_account_password_change_save(request()->all());
    }








    /*
     * 待办事
     */
    // 【待办事-目录】添加
    public function operate_admin_todo_menu_create()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_menu_create();
        else if (request()->isMethod('post')) return $this->repo->operate_admin_todo_menu_save(request()->all());
    }
    // 【待办事-目录】编辑
    public function operate_admin_todo_menu_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_menu_edit();
        else if (request()->isMethod('post')) return $this->repo->operate_admin_todo_menu_save(request()->all());
    }
    // 【待办事-目录】返回-列表-视图（全部任务）
    public function view_admin_todo_menu_list()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_menu_list(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_admin_todo_menu_list_datatable(request()->all());
    }
    // 【待办事-目录-修改记录】返回-列表-视图（全部任务）
    public function view_admin_todo_menu_modify_record()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_menu_modify_record(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_admin_todo_menu_modify_record_datatable(request()->all());
    }













    // 导航
    public function root()
    {
        return $this->repo->root();
    }

    // 导航
    public function navigation()
    {
        return view('GPS.default.entrance.navigation');
    }

    // 测试
    public function test_list()
    {
        return view('GPS.default.entrance.test-list');
    }

    // 工具
    public function tool_list()
    {
        return view('GPS.default.entrance.tool-list');
    }

    // 模板
    public function template_list()
    {
        return view('GPS.default.entrance.template-list');
    }




    //
    public function tool()
    {
        $type = request()->get("type");
        if($type == "type")
        {
            return response_success([],"type");
        }
        // 生成密码
        else if($type == "password_encode")
        {
            $password = request("password");
            $password_encode = password_encode($password);
            return response_success(['password_encode'=>$password_encode]);
        }
        else if($type == "xx")
        {
            return response_success([]);
        }
    }



}
