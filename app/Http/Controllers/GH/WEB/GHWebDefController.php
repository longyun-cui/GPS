<?php

namespace App\Http\Controllers\GH\WEB;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GPS\GPS_User;

use App\Repositories\GH\WEB\GHWebDefRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;


class GHWebDefController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new GHWebDefRepository();
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
                        else Auth::guard('gps_admin')->login($admin,true);
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
        return redirect('/login');
    }




    // 返回主页视图
    public function view_index()
    {
        return $this->repo->view_index();
    }

    // 返回主页视图
    public function view_404()
    {
//        return $this->repo->view_admin_404();
    }
    // 返回主页视图
    public function view_product_detail()
    {
        return $this->repo->view_product_detail(request()->all());
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






}
