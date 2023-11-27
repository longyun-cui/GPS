<?php

namespace App\Http\Controllers\GPS\Def;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\GPS\DevelopingRepository;

class GPSDevelopingController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new DevelopingRepository;
    }


    //
    public function view_root()
    {
        return $this->repo->root();
    }




}
