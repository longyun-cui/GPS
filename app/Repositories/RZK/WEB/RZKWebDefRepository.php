<?php
namespace App\Repositories\RZK\WEB;

use App\Models\RZK\RZK_Admin;
use App\Models\RZK\RZK_Item;
use App\Models\RZK\RZK_Message;

use App\Repositories\Common\CommonRepository;

use Response, Auth, Validator, DB, Exception, Cache, Blade, Carbon;
use QrCode, Excel;

class RZKWebDefRepository {

    private $env;
    private $auth_check;
    private $me;
    private $me_admin;
    private $modelAdmin;
    private $modelItem;
    private $view_blade_403;
    private $view_blade_404;

    public function __construct()
    {
        $this->modelAdmin = new RZK_Admin;
        $this->modelItem = new RZK_Item;

        $this->view_blade_403 = env('TEMPLATE_RZK_WEB_DEF').'entrance.errors.403';
        $this->view_blade_404 = env('TEMPLATE_RZK_WEB_DEF').'entrance.errors.404';

        Blade::setEchoFormat('%s');
        Blade::setEchoFormat('e(%s)');
        Blade::setEchoFormat('nl2br(e(%s))');

        if(isMobileEquipment()) $is_mobile_equipment = 1;
        else $is_mobile_equipment = 0;
        view()->share('is_mobile_equipment',$is_mobile_equipment);
    }


    // 登录情况
    public function get_me()
    {
        if(Auth::guard("gps_admin")->check())
        {
            $this->auth_check = 1;
            $this->me = Auth::guard("gps_admin")->user();
            $me = $this->me;
            if($me->birth_day)
            {
                $diff = time_diff($me->birth_day);
                $this->me->diff = $diff;
            }
            view()->share('me',$this->me);
        }
        else $this->auth_check = 0;

        view()->share('auth_check',$this->auth_check);

        if(isMobileEquipment()) $is_mobile_equipment = 1;
        else $is_mobile_equipment = 0;
        view()->share('is_mobile_equipment',$is_mobile_equipment);
    }




    // 返回（后台）主页视图
    public function view_404()
    {
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.errors.404';
        return view($view_blade);
    }


    // 主页
    public function view_index()
    {
        $item_list = RZK_Item::select('*')
            ->where(['item_status'=>1])
            ->where('item_sign','<>','')
            ->whereNotNull('item_sign')
            ->orderBy('id','asc')
            ->get();
        $item_list = $item_list->groupBy('item_sign');
//        dd($item_list->toArray());
//        $return_data['item_list'] = $item_list;

        $return_data['index_industry_intro'] = $item_list['index_industry_intro'];
        $return_data['index_service'] = $item_list['index_service'];
        $return_data['index_join_us'] = $item_list['index_join_us'];
        $return_data['index_support'] = $item_list['index_support'];

        $return_data['menu_index_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.index';
        return view($view_blade)->with($return_data);
    }

    // 关于我们
    public function view_about()
    {
        $item_list = RZK_Item::select('*')
            ->where(['item_status'=>1])
            ->where('item_sign','<>','')
            ->whereNotNull('item_sign')
            ->orderBy('id','asc')
            ->get();

        $item_list = $item_list->groupBy('item_sign');
//        dd($item_list);

        $return_data['intro'] = $item_list['intro'][0];
        $return_data['team_list'] = $item_list['about_team'];

        $return_data['menu_about_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.about';
        return view($view_blade)->with($return_data);
    }

    // 加入我们
    public function view_join_us()
    {
        $item_list = RZK_Item::select('*')->where(['item_status'=>1])->orderBy('id','desc')->get();
        $return_data['item_list'] = $item_list;

        $return_data['menu_join_us_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.join_us';
        return view($view_blade)->with($return_data);
    }

    // 运营支持
    public function view_support()
    {
        $item_list = RZK_Item::select('*')
            ->where(['item_status'=>1])
            ->where('item_sign','<>','')
            ->whereNotNull('item_sign')
            ->orderBy('id','asc')
            ->get();
        $item_list = $item_list->groupBy('item_sign');
//        dd($item_list->toArray());
//        $return_data['item_list'] = $item_list;

//        $return_data['support_system'] = $item_list['support_system'][0];
        $return_data['support_industry_chain'] = $item_list['support_industry_chain'];
        $return_data['support_operation_flow'] = $item_list['support_operation_flow'];
        $return_data['support_operation_flow_before'] = $item_list['support_operation_flow_before'];
        $return_data['support_operation_flow_ing'] = $item_list['support_operation_flow_ing'];
        $return_data['support_operation_flow_after'] = $item_list['support_operation_flow_after'];

        $return_data['menu_support_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.support';
        return view($view_blade)->with($return_data);
    }

    // 产品服务
    public function view_product()
    {
        $item_list = RZK_Item::select('*')
            ->where(['item_status'=>1])
            ->where('item_sign','<>','')
            ->whereNotNull('item_sign')
            ->orderBy('id','asc')
            ->get();
        $item_list = $item_list->groupBy('item_sign');
//        dd($item_list->toArray());
//        $return_data['item_list'] = $item_list;

        $return_data['product_service'] = $item_list['product_service'];

        $return_data['menu_product_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.product';
        return view($view_blade)->with($return_data);
    }

    // 产业基地
    public function view_industry()
    {
        $item_list = RZK_Item::select('*')
            ->where(['item_status'=>1])
            ->where('item_sign','<>','')
            ->whereNotNull('item_sign')
            ->orderBy('id','asc')
            ->get();
        $item_list = $item_list->groupBy('item_sign');
//        dd($item_list->toArray());
//        $return_data['item_list'] = $item_list;

        $return_data['industrial_base'] = $item_list['industrial_base'][0];

        $return_data['menu_industry_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.industry';
        return view($view_blade)->with($return_data);
    }

    // 新闻动态
    public function view_news_index()
    {
        $item_list = RZK_Item::select('*')->where(['item_status'=>1])->orderBy('id','desc')->get();
        $return_data['item_list'] = $item_list;

        $return_data['menu_news_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.news';
        return view($view_blade)->with($return_data);
    }

    // 新闻（行业）动态
    public function view_news_industry()
    {
        $item_list = RZK_Item::select('*')->where(['item_status'=>1])->orderBy('id','desc')->get();
        $return_data['item_list'] = $item_list;

        $return_data['menu_news_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.news';
        return view($view_blade)->with($return_data);
    }

    // 新闻（行业）动态
    public function view_news_detail()
    {
        $item_list = RZK_Item::select('*')->where(['item_status'=>1])->orderBy('id','desc')->get();
        $return_data['item_list'] = $item_list;

        $return_data['menu_news_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.news-detail';
        return view($view_blade)->with($return_data);
    }

    // 联系我们
    public function view_contact()
    {
        $item_list = RZK_Item::select('*')->where(['item_status'=>1])->orderBy('id','desc')->get();
        $return_data['item_list'] = $item_list;

        $return_data['menu_contact_active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.contact';
        return view($view_blade)->with($return_data);
    }

    // 产品详情
    public function view_product_detail($post_data)
    {
        $product_id = $post_data['id'];
        $item = RZK_Item::find($product_id);

        $return_data['item'] = $item;

        $return_data['menu__active'] = 'active';
        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.product-detail';
        return view($view_blade)->with($return_data);
    }




    /*
     * 用户基本信息
     */
    // 【基本信息】返回视图
    public function view_my_profile_info_index()
    {
        $this->get_me();
        $me = $this->me;

        $return['data'] = $me;

        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.my-account.my-profile-info-index';
        return view($view_blade)->with($return);
    }
    // 【基本信息】返回-编辑-视图
    public function view_my_profile_info_edit()
    {
        $this->get_me();
        $me = $this->me;

        $return['data'] = $me;

        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.my-account.my-profile-info-edit';
        return view($view_blade)->with($return);
    }
    // 【基本信息】保存数据
    public function operate_my_profile_info_save($post_data)
    {
        $this->get_me();
        $me = $this->me;

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            if(!empty($post_data['custom']))
            {
                $post_data['custom'] = json_encode($post_data['custom']);
            }

            $mine_data = $post_data;
            unset($mine_data['operate']);
            unset($mine_data['operate_id']);
            $bool = $me->fill($mine_data)->save();
            if($bool)
            {
                // 头像
                if(!empty($post_data["portrait_img"]))
                {
                    // 删除原文件
                    $mine_original_file = $me->portrait_img;
                    if(!empty($mine_original_file) && file_exists(storage_path("resource/" . $mine_original_file)))
                    {
                        unlink(storage_path("resource/" . $mine_original_file));
                    }

                    $result = upload_file_storage($post_data["attachment"]);
                    if($result["result"])
                    {
                        $me->portrait_img = $result["local"];
                        $me->save();
                    }
                    else throw new Exception("upload--portrait-img--file--fail");
                }

            }
            else throw new Exception("insert--item--fail");

            DB::commit();
            return response_success(['id'=>$me->id]);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '操作失败，请重试！';
            $msg = $e->getMessage();
//            exit($e->getMessage());
            return response_fail([],$msg);
        }
    }

    // 【密码】返回修改视图
    public function view_my_account_password_change()
    {
        $this->get_me();
        $me = $this->me;

        $return['data'] = $me;

        $view_blade = env('TEMPLATE_RZK_WEB_DEF').'entrance.my-account.my-account-password-change';
        return view($view_blade)->with($return);
    }
    // 【密码】保存数据
    public function operate_my_account_password_change_save($post_data)
    {
        $messages = [
            'password_pre.required' => '请输入旧密码',
            'password_new.required' => '请输入新密码',
            'password_confirm.required' => '请输入确认密码',
        ];
        $v = Validator::make($post_data, [
            'password_pre' => 'required',
            'password_new' => 'required',
            'password_confirm' => 'required'
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        $password_pre = request()->get('password_pre');
        $password_new = request()->get('password_new');
        $password_confirm = request()->get('password_confirm');

        if($password_new == $password_confirm)
        {
            $this->get_me();
            $me = $this->me;
            if(password_check($password_pre,$me->password))
            {
                $me->password = password_encode($password_new);
                $bool = $me->save();
                if($bool) return response_success([], '密码修改成功！');
                else return response_fail([], '密码修改失败！');
            }
            else
            {
                return response_fail([], '原密码有误！');
            }
        }
        else return response_error([],'两次密码输入不一致！');
    }




    // contact
    public function contact()
    {
        $houses = Def_Item::where(['category'=>11, 'active'=>1])->orderby('id', 'desc')->get();
        foreach($houses as $item)
        {
            $item->custom = json_decode($item->custom);
            $item->custom2 = json_decode($item->custom2);
        }

        $html = view('frontend.entrance.contact')->with(['houses'=>$houses])->__toString();
        return $html;
    }




    // item
    public function view_item($id = 0)
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




    // 留言
    public function operate_message_leave($post_data)
    {
        $messages = [
            'name.required' => '请输入姓名',
            'mobile.required' => '请输入电话',
        ];
        $v = Validator::make($post_data, [
            'name' => 'required',
            'mobile' => 'required'
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $post_data['category'] = 1;
            $post_data["ip"] = Get_IP();
            $mine = new RZK_Message;
            $bool = $mine->fill($post_data)->save();
            if(!$bool) throw new Exception("insert--message--fail");

            DB::commit();
            $msg = '提交成功！';
            return response_success([],$msg);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '提交失败，请重试！';
//            $msg = $e->getMessage();
//            exit($e->getMessage());
            return response_fail([],$msg);
        }



    }


    // ITEM 留言
    public function message_grab_item($post_data)
    {
        $messages = [
            'name.required' => '请输入姓名',
            'mobile.required' => '请输入电话',
        ];
        $v = Validator::make($post_data, [
            'name' => 'required',
            'mobile' => 'required'
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $post_data['category'] = 11;
            $mine = new RZK_Message;
            $bool = $mine->fill($post_data)->save();
            if(!$bool) throw new Exception("insert--message--fail");

            DB::commit();
            $msg = '提交成功！';
            return response_success([],$msg);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '提交失败，请重试！';
//            $msg = $e->getMessage();
//            exit($e->getMessage());
            return response_fail([],$msg);
        }



    }







}