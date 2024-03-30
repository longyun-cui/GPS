<?php
namespace App\Repositories\LY;

use App\Models\DEF\Def_Module;
use App\Models\DEF\Def_Menu;
use App\Models\DEF\Def_Item;
use App\Models\DEF\Def_Message;

use App\Repositories\Common\CommonRepository;

use Response, Auth, Validator, DB, Exception, Cache;
use QrCode;

class LY_GPSUIRepository {

    private $model;
    private $repo;
    public function __construct()
    {
//        $this->model = new OrgOrganization;
    }


    // root
    public function view_ui_index()
    {
//        $info = json_decode(json_encode(config('mitong.company.info')));
//        $menus = RootMenu::where(['active'=>1])->orderby('order', 'asc')->get();

        $item = Def_Item::where(['item_category'=>1])->orderby('id', 'desc')->first();
//        $item->custom = json_decode($item->custom);
//        $item->custom2 = json_decode($item->custom2);

        $items = Def_Item::where(['item_category'=>1])->orderby('id', 'desc')->limit(8)->get();
        foreach($items as $item)
        {
            $item->custom = json_decode($item->custom);
        }

        $item = [];
        $items = [];

        $return['item'] = $item;
        $return['items'] = $items;
        $view_blade = env('TEMPLATE_LY_GPS__UI').'entrance.index';
        return view($view_blade)->with($return);

//        $html = view($view_blade)->with($return)->__toString();
//        return $html;
    }




    // item
    public function view_ui_item($id = 0)
    {
        if($id != 0) $mine = Def_Item::where(['id'=>$id])->orderby('id', 'desc')->first();
        else $mine = Def_Item::orderby('id', 'desc')->first();

        $mine->timestamps = false;
        $mine->increment('visit_num');

        $mine->custom = json_decode($mine->custom);
        $mine->custom2 = json_decode($mine->custom2);

        $rent_items = Def_Item::where(['category'=>11, 'active'=>1])->where('id', '<>', $id)->orderby('id', 'desc')->limit(6)->get();
        foreach($rent_items as $item)
        {
            $item->custom = json_decode($item->custom);
        }

        $html = view('frontend.entrance.item')->with(['rent_items'=>$rent_items, 'item'=>$mine])->__toString();
        return $html;
    }









}