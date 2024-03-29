<?php

namespace App\Http\Controllers\LY;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\LY\LY_WWWIndexRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;


class LY_WWWIndexController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new LY_WWWIndexRepository();
    }


    // 导航
    public function index()
    {
        return $this->repo->index();
    }
    // 导航
    public function view_404()
    {
        return $this->repo->view_404();
    }







}
