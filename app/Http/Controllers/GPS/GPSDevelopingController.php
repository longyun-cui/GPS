<?php

namespace App\Http\Controllers\GPS;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\GPS\GPSDevelopingRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;

class GPSDevelopingController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new GPSDevelopingRepository;
    }


    //
    public function view_root()
    {
        return $this->repo->root();
    }




}
