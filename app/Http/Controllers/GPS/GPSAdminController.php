<?php

namespace App\Http\Controllers\GPS;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GPS\GPS_User;

use App\Repositories\GPS\GPSAdminRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;


class GPSAdminController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new GPSAdminRepository();
    }




    // 登陆
    public function login()
    {
        if(request()->isMethod('get'))
        {
            $view_blade = env('TEMPLATE_GPS_ADMIN').'entrance.login';
            return view($view_blade);
        }
        else if(request()->isMethod('post'))
        {
            $where['email'] = request()->get('email');
            $where['mobile'] = request()->get('mobile');
            $where['password'] = request()->get('password');

//            $email = request()->get('email');
//            $admin = SuperAdministrator::whereEmail($email)->first();

            $mobile = request()->get('mobile');
            $admin = GPS_User::whereMobile($mobile)->first();

            if($admin)
            {
                if($admin->user_status == 1)
                {
                    $password = request()->get('password');
                    if(password_check($password,$admin->password))
                    {
                        $remember = request()->get('remember');
                        if($remember) Auth::guard('gps_admin')->login($admin,true);
                        else Auth::guard('gps_admin')->login($admin);
                        return response_success();
                    }
                    else return response_error([],'账户or密码不正确！');
                }
                else return response_error([],'账户已禁用！');
            }
            else return response_error([],'账户不存在！');
        }
    }

    // 退出
    public function logout()
    {
        Auth::guard('gps_admin')->logout();
        return redirect('/admin/login');
    }




    // 返回主页视图
    public function view_admin_index()
    {
//        dd(1);
        return $this->repo->view_admin_index();
    }

    // 返回主页视图
    public function view_admin_404()
    {
        return $this->repo->view_admin_404();
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




    // 【待办事-内容】SELECT2 Menu 目录
    public function operate_admin_todo_select2_menu()
    {
        return $this->repo->operate_admin_todo_select2_menu(request()->all());
    }

    // 【待办事-内容】添加
    public function operate_admin_todo_item_create()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_item_create();
        else if (request()->isMethod('post')) return $this->repo->operate_admin_todo_item_save(request()->all());
    }
    // 【待办事-内容】编辑
    public function operate_admin_todo_item_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_item_edit();
        else if (request()->isMethod('post')) return $this->repo->operate_admin_todo_item_save(request()->all());
    }
    // 【待办事-内容】返回-列表-视图（全部任务）
    public function view_admin_todo_item_list()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_item_list(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_admin_todo_item_list_datatable(request()->all());
    }
    // 【待办事-内容-修改记录】返回-列表-视图（全部任务）
    public function view_admin_todo_item_modify_record()
    {
        if(request()->isMethod('get')) return $this->repo->view_admin_todo_item_modify_record(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_admin_todo_item_modify_record_datatable(request()->all());
    }






    // 【订单管理】获取-详情
    public function operate_admin_todo_get_data()
    {
        return $this->repo->operate_admin_todo_get(request()->all());
    }
    // 【订单管理】获取-附件
    public function operate_admin_todo_get_attachment()
    {
        return $this->repo->operate_admin_todo_get_attachment(request()->all());
    }


    // 【订单管理】删除
    public function operate_admin_todo_delete()
    {
        return $this->repo->operate_admin_todo_delete(request()->all());
    }
    // 【订单管理】发布
    public function operate_admin_todo_publish()
    {
        return $this->repo->operate_admin_todo_publish(request()->all());
    }
    // 【订单管理】完成
    public function operate_admin_todo_complete()
    {
        return $this->repo->operate_admin_todo_complete(request()->all());
    }
    // 【订单管理】完成
    public function operate_admin_todo_done()
    {
        return $this->repo->operate_admin_todo_done(request()->all());
    }
    // 【订单管理】完成
    public function operate_admin_todo_undone()
    {
        return $this->repo->operate_admin_todo_undone(request()->all());
    }
    // 【订单管理】弃用
    public function operate_admin_todo_abandon()
    {
        return $this->repo->operate_admin_todo_abandon(request()->all());
    }
    // 【订单管理】复用
    public function operate_admin_todo_reuse()
    {
        return $this->repo->operate_admin_todo_reuse(request()->all());
    }
    // 【内容】验证
    public function operate_admin_todo_verify()
    {
        return $this->repo->operate_admin_todo_verify(request()->all());
    }
    // 【内容】审核
    public function operate_admin_todo_inspect()
    {
        return $this->repo->operate_admin_todo_inspect(request()->all());
    }



    // 【订单管理】修改-文本-信息
    public function operate_admin_todo_info_text_set()
    {
        return $this->repo->operate_admin_todo_info_text_set(request()->all());
    }
    // 【订单管理】修改-时间-信息
    public function operate_admin_todo_info_time_set()
    {
        return $this->repo->operate_admin_todo_info_time_set(request()->all());
    }
    // 【订单管理】修改-option-信息
    public function operate_admin_todo_info_option_set()
    {
        return $this->repo->operate_admin_todo_info_option_set(request()->all());
    }
    // 【订单管理】修改-radio-信息
    public function operate_admin_todo_info_radio_set()
    {
        return $this->repo->operate_admin_todo_info_option_set(request()->all());
    }
    // 【订单管理】修改-select-信息
    public function operate_admin_todo_info_select_set()
    {
        return $this->repo->operate_admin_todo_info_option_set(request()->all());
    }
    // 【订单管理】添加-attachment-信息
    public function operate_admin_todo_info_attachment_set()
    {
        return $this->repo->operate_admin_todo_info_attachment_set(request()->all());
    }
    // 【订单管理】删除-attachment-信息
    public function operate_admin_todo_info_attachment_delete()
    {
        return $this->repo->operate_admin_todo_info_attachment_delete(request()->all());
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
