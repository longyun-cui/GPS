<?php
namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Repositories\Front\IndexRepository;

class IndexController extends Controller
{

    //
    private $service;
    private $repo;
    public function __construct()
    {
        $this->repo = new IndexRepository;
    }




    // 返回【主页】视图
    public function view_root()
    {
        return $this->repo->root();
    }

    // 返回【联系我们】视图
    public function view_contact()
    {
        return $this->repo->contact();
    }

    // 返回【详情】视图
    public function view_item($id=0)
    {
        return $this->repo->view_item($id);
    }


    // 返回【钢琴出租】【列表】视图
    public function view_rent_out_list()
    {
        return $this->repo->view_rent_out_list();
    }
    // 返回【二手批发】【列表】视图
    public function view_second_wholesale_list()
    {
        return $this->repo->view_second_wholesale_list();
    }

    // 返回【钢琴回收】【单页】视图
    public function view_recycle_page()
    {
        return $this->repo->view_recycle_page();
    }


    // 返回【最新动态】【列表】视图
    public function view_coverage_list()
    {
        return $this->repo->view_coverage_list();
    }



    // 【留言】
    public function message_contact()
    {
        return $this->repo->message_contact(request()->all());
    }
    // 【询价】
    public function message_grab_item()
    {
        return $this->repo->message_grab_item(request()->all());
    }


}
