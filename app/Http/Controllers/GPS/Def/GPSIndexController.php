<?php

namespace App\Http\Controllers\GPS\Def;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\GPS\Def\GPSIndexRepository;


class GPSIndexController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new GPSIndexRepository();
    }


    // 导航
    public function root()
    {
        return $this->repo->root();
    }
    // 导航
    public function view_404()
    {
        return $this->repo->view_404();
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
