<?php

namespace App\Http\Controllers\RZK\WEB;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GPS\GPS_User;

use App\Repositories\RZK\WEB\RZKWebDefRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;


class RZKWebDefController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new RZKWebDefRepository();
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




    // 404
    public function view_404()
    {
        return $this->repo->view_404();
    }

    // 主页
    public function view_index()
    {
        return $this->repo->view_index();
    }

    // 关于我们
    public function view_about()
    {
        return $this->repo->view_about();
    }

    // 加入我们
    public function view_join_us()
    {
        return $this->repo->view_join_us();
    }

    // 运营支持
    public function view_support()
    {
        return $this->repo->view_support();
    }

    // 产品服务
    public function view_product()
    {
        return $this->repo->view_product();
    }

    // 产业基地
    public function view_industry()
    {
        return $this->repo->view_industry();
    }

    // 新闻动态
    public function view_news_index()
    {
        return $this->repo->view_news_index();
    }

    // 新闻（行业）动态
    public function view_news_industry()
    {
        return $this->repo->view_news_industry();
    }

    // 新闻详情
    public function view_news_detail()
    {
        return $this->repo->view_news_detail(request()->all());
    }

    // 联系我们
    public function view_contact()
    {
        return $this->repo->view_contact();
    }

    // 产品详情
    public function view_product_detail()
    {
        return $this->repo->view_product_detail(request()->all());
    }




    // 联系我们
    public function operate_message_leave()
    {
        return $this->repo->operate_message_leave(request()->all());
    }







}
