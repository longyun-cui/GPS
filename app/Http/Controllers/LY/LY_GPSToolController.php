<?php

namespace App\Http\Controllers\LY;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\LY\LY_GPSTestingRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;

class LY_GPSToolController extends Controller
{
    //
    private $service;
    private $repo;

    public function __construct()
    {
        $this->repo = new LY_GPSTestingRepository();
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

    //
    public function tool_password_encode()
    {
        $password = request("password");
        $password_encode = password_encode($password);
        return response_success(['password_encode'=>$password_encode]);
    }



}