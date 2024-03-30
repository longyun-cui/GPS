<?php

namespace App\Http\Controllers\GH;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\GPS\GPS_User;

use App\Repositories\GH\GH_WWWIndexRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;


class GH_WWWIndexController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new GH_WWWIndexRepository();
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
