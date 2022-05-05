<?php

namespace App\Http\Controllers\UI;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\UI\UIIndexRepository;

class UIIndexController extends Controller
{
    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new UIIndexRepository;
    }


    //
    public function view_root()
    {
        return $this->repo->root();
    }




}
