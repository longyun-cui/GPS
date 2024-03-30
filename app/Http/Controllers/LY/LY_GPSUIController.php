<?php

namespace App\Http\Controllers\LY;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\LY\LY_GPSUIRepository;

class LY_GPSUIController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new LY_GPSUIRepository;
    }


    //
    public function view_ui_index()
    {
        return $this->repo->view_ui_index();
    }

    //
    public function view_ui_item()
    {
        return $this->repo->view_ui_item();
    }



}
