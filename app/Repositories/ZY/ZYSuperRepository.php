<?php
namespace App\Repositories\ZY;

use App\Models\ZY\ZY_Task;
use App\Models\ZY\ZY_User;
use App\Models\ZY\ZY_Item;
use App\Models\ZY\ZY_Pivot_Item_Relation;

use App\Repositories\Common\CommonRepository;

use Response, Auth, Validator, DB, Exception, Cache, Blade;
use QrCode, Excel;

class ZYSuperRepository {

    private $evn;
    private $auth_check;
    private $me;
    private $me_admin;
    private $model;
    private $modelUser;
    private $modelItem;
    private $repo;
    private $service;
    private $view_blade_404;

    public function __construct()
    {
        $this->modelUser = new ZY_User;
        $this->modelItem = new ZY_Item;

        $this->view_blade_404 = env('TEMPLATE_ZY_SUPER').'errors.404';

        Blade::setEchoFormat('%s');
        Blade::setEchoFormat('e(%s)');
        Blade::setEchoFormat('nl2br(e(%s))');
    }


    // 登录情况
    public function get_me()
    {
        if(Auth::guard("zy_super")->check())
        {
            $this->auth_check = 1;
            $this->me = Auth::guard("zy_super")->user();
            view()->share('me',$this->me);
        }
        else $this->auth_check = 0;

        view()->share('auth_check',$this->auth_check);
    }




    // 返回（后台）主页视图
    public function view_super_index()
    {
        $this->get_me();
        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.index';
        return view($view_blade);
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

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.my-account.my-profile-info-index';
        return view($view_blade)->with($return);
    }
    // 【基本信息】返回-编辑-视图
    public function view_my_profile_info_edit()
    {
        $this->get_me();
        $me = $this->me;

        $return['data'] = $me;

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.my-account.my-profile-info-edit';
        return view($view_blade)->with($return);
    }
    // 【基本信息】保存数据
    public function operate_info_save($post_data)
    {
        $me = Auth::guard('admin')->user();

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
    public function view_info_password_reset()
    {
        $me = Auth::guard('admin')->user();
        return view(env('TEMPLATE_ZY_SUPER').'entrance.info.password-reset')->with(['data'=>$me]);
    }
    // 【密码】保存数据
    public function operate_info_password_reset_save($post_data)
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
            $me = Auth::guard('admin')->user();
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




    /*
     * 用户系统
     */
    // 【代理商&用户】【修改密码】
    public function operate_user_change_password($post_data)
    {
        $messages = [
            'operate.required' => '参数有误',
            'id.required' => '请输入用户ID',
            'user-password.required' => '请输入密码',
            'user-password-confirm.required' => '请输入确认密码',
        ];
        $v = Validator::make($post_data, [
            'operate' => 'required',
            'id' => 'required',
            'user-password' => 'required',
            'user-password-confirm' => 'required',
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        $operate = $post_data["operate"];
        if($operate != 'change-password') return response_error([],"参数有误！");
        $id = $post_data["id"];
        if(intval($id) !== 0 && !$id) return response_error([],"参数ID有误！");

        $me = Auth::guard('admin')->user();
        if($me->user_type != 0) return response_error([],"你没有操作权限");

        $password = $post_data["user-password"];
        $confirm = $post_data["user-password-confirm"];
        if($password != $confirm) return response_error([],"两次密码不一致！");

//        if(!password_is_legal($password)) ;
        $pattern = '/^[a-zA-Z0-9]{1}[a-zA-Z0-9]{5,19}$/i';
        if(!preg_match($pattern,$password)) return response_error([],"密码格式不正确！");


        $user = User::find($id);
        if(!$user) return response_error([],"该用户不存在，刷新页面重试");


        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $user->password = password_encode($password);
            $user->save();

            $bool = $user->save();
            if(!$bool) throw new Exception("update--user--fail");

            DB::commit();
            return response_success(['id'=>$user->id]);
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


    // 【select2】
    public function operate_business_select2_user($post_data)
    {
        $me = Auth::guard('admin')->user();
        if(empty($post_data['keyword']))
        {
            $list =User::select(['id','username as text'])
                ->where(['userstatus'=>'正常','status'=>1])
                ->whereIn('usergroup',['Agent','Agent2'])
                ->orderBy('id','desc')
                ->get()
                ->toArray();
        }
        else
        {
            $keyword = "%{$post_data['keyword']}%";
            $list =User::select(['id','username as text'])
                ->where(['userstatus'=>'正常','status'=>1])
                ->whereIn('usergroup',['Agent','Agent2'])
                ->where('sitename','like',"%$keyword%")
                ->orderBy('id','desc')
                ->get()
                ->toArray();
        }
        array_unshift($list, ['id'=>0,'text'=>'【全部代理】']);
        return $list;
    }








    /*
     * USER 用户管理
     */
    //
    public function operate_user_select2_district($post_data)
    {
//        $type = $post_data['type'];
//        if($type == 0) $district_type = 0;
//        else if($type == 1) $district_type = 0;
//        else if($type == 2) $district_type = 1;
//        else if($type == 3) $district_type = 2;
//        else if($type == 4) $district_type = 3;
//        else if($type == 21) $district_type = 4;
//        else if($type == 31) $district_type = 21;
//        else if($type == 41) $district_type = 31;
//        else $district_type = 0;
//        if(!is_numeric($type)) return view(env('TEMPLATE_ZY_SUPER').'errors.404');
//        if(!in_array($type,[1,2,3,10,11,88])) return view(env('TEMPLATE_ZY_SUPER').'errors.404');

        if(empty($post_data['keyword']))
        {
            $list =Def_District::select(['id','name as text'])->get()->toArray();
        }
        else
        {
            $keyword = "%{$post_data['keyword']}%";
            $list =Def_District::select(['id','name as text'])->where('name','like',"%$keyword%")->get()->toArray();
        }
        return $list;
    }

    // 【用户】返回-添加-视图
    public function view_user_user_create()
    {
        $item_type = 'item';
        $item_type_text = '用户';
        $title_text = '添加'.$item_type_text;
        $list_text = $item_type_text.'列表';
        $list_link = '/admin/user/user-list-for-all';

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.user.user-edit';
        return view($view_blade)->with([
            'operate'=>'create',
            'operate_id'=>0,
            'category'=>'item',
            'type'=>$item_type,
            'item_type_text'=>$item_type_text,
            'title_text'=>$title_text,
            'list_text'=>$list_text,
            'list_link'=>$list_link,
        ]);
    }
    // 【用户】返回-编辑-视图
    public function view_user_user_edit()
    {
        $id = request("id",0);
        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.user.user-edit';

        $item_type = 'item';
        $item_type_text = '用户';
        $title_text = '编辑'.$item_type_text;
        $list_text = $item_type_text.'列表';
        $list_link = '/admin/user/user-list-for-all';

        if($id == 0)
        {
            return view($view_blade)->with([
                'operate'=>'create',
                'operate_id'=>0,
                'category'=>'item',
                'type'=>$item_type,
                'item_type_text'=>$item_type_text,
                'title_text'=>$title_text,
                'list_text'=>$list_text,
                'list_link'=>$list_link,
            ]);
        }
        else
        {
            $mine = User::with(['parent'])->find($id);
            if($mine)
            {
                if(!in_array($mine->user_category,[1,9,11,88])) return view(env('TEMPLATE_ZY_SUPER').'errors.404');
                $mine->custom = json_decode($mine->custom);
                $mine->custom2 = json_decode($mine->custom2);
                $mine->custom3 = json_decode($mine->custom3);

                return view($view_blade)->with([
                    'operate'=>'edit',
                    'operate_id'=>$id,
                    'data'=>$mine,
                    'category'=>'item',
                    'type'=>$item_type,
                    'item_type_text'=>$item_type_text,
                    'title_text'=>$title_text,
                    'list_text'=>$list_text,
                    'list_link'=>$list_link,
                ]);
            }
            else return view(env('TEMPLATE_ZY_SUPER').'errors.404');
        }
    }
    // 【用户】【组织】保存数据
    public function operate_user_user_save($post_data)
    {
//        dd($post_data);
        $messages = [
            'operate.required' => '参数有误',
            'username.required' => '请输入用户名',
            'mobile.required' => '请输入电话',
        ];
        $v = Validator::make($post_data, [
            'operate' => 'required',
            'username' => 'required',
            'mobile' => 'required'
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }


        $me = Auth::guard('super')->user();
        if(!in_array($me->user_category,[0])) return response_error([],"你没有操作权限！");


        $operate = $post_data["operate"];
        $operate_id = $post_data["operate_id"];

        if($operate == 'create') // 添加 ( $id==0，添加一个新用户 )
        {
            $mine = new User;
            $post_data["user_category"] = 11;
            $post_data["active"] = 1;
            $post_data["password"] = password_encode("12345678");
        }
        else if($operate == 'edit') // 编辑
        {
            $mine = User::find($operate_id);
            if(!$mine) return response_error([],"该用户不存在，刷新页面重试！");
        }
        else return response_error([],"参数有误！");

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            if(!empty($post_data['custom']))
            {
                $post_data['custom'] = json_encode($post_data['custom']);
            }

            $mine_data = $post_data;
            $mine_data['district_id'] = !empty($post_data['select2_district_id']) ? $post_data['select2_district_id'] : 0;

            unset($mine_data['operate']);
            unset($mine_data['operate_id']);
            unset($mine_data['category']);
            unset($mine_data['type']);

            $bool = $mine->fill($mine_data)->save();
            if($bool)
            {
                // 头像
                if(!empty($post_data["portrait"]))
                {
                    // 删除原图片
                    $mine_portrait_img = $mine->portrait_img;
                    if(!empty($mine_portrait_img) && file_exists(storage_path("resource/" . $mine_portrait_img)))
                    {
                        unlink(storage_path("resource/" . $mine_portrait_img));
                    }

                    $result = upload_storage($post_data["portrait"]);
                    if($result["result"])
                    {
                        $mine->portrait_img = $result["local"];
                        $mine->save();
                    }
                    else throw new Exception("upload--portrait--fail");
                }

                // 微信二维码
                if(!empty($post_data["wechat_qr_code"]))
                {
                    // 删除原图片
                    $mine_wechat_qr_code_img = $mine->wechat_qr_code_img;
                    if(!empty($mine_wechat_qr_code_img) && file_exists(storage_path("resource/" . $mine_wechat_qr_code_img)))
                    {
                        unlink(storage_path("resource/" . $mine_wechat_qr_code_img));
                    }

                    $result = upload_storage($post_data["wechat_qr_code"]);
                    if($result["result"])
                    {
                        $mine->wechat_qr_code_img = $result["local"];
                        $mine->save();
                    }
                    else throw new Exception("upload--wechat_qr_code--fail");
                }

                // 联系人微信二维码
                if(!empty($post_data["linkman_wechat_qr_code"]))
                {
                    // 删除原图片
                    $mine_linkman_wechat_qr_code_img = $mine->linkman_wechat_qr_code_img;
                    if(!empty($mine_linkman_wechat_qr_code_img) && file_exists(storage_path("resource/" . $mine_linkman_wechat_qr_code_img)))
                    {
                        unlink(storage_path("resource/" . $mine_linkman_wechat_qr_code_img));
                    }

                    $result = upload_storage($post_data["linkman_wechat_qr_code"]);
                    if($result["result"])
                    {
                        $mine->linkman_wechat_qr_code_img = $result["local"];
                        $mine->save();
                    }
                    else throw new Exception("upload--linkman_wechat_qr_code--fail");
                }

            }
            else throw new Exception("insert--user--fail");

            DB::commit();
            return response_success(['id'=>$mine->id]);
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


    // 【用户】删除
    public function operate_user_user_delete($post_data)
    {
        $mine = Auth::guard('admin')->user();
        if($mine->usergroup != "Manage") return response_error([],"你没有操作权限");

        $id = $post_data["id"];
        if(intval($id) !== 0 && !$id) return response_error([],"参数ID有误！");

        $agent = K_User::find($id);
        if(!in_array($agent->usergroup,['Agent','Agent2'])) return response_error([],"该用户不是代理商");
        if($agent->fund_balance > 0) return response_error([],"该用户还有余额");

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            $content = $agent->content;
            $cover_pic = $agent->cover_pic;

            // 删除名下客户
            $clients = K_User::where(['pid'=>$id,'usergroup'=>'Service'])->get();
            foreach ($clients as $c)
            {
                $client_id =  $c->id;
                $client  = K_User::find($client_id);

                // 删除【站点】
//                $deletedRows_1 = SEOSite::where('owner_id', $client_id)->delete();
                $deletedRows_1 = SEOSite::where('createuserid', $client_id)->delete();

                // 删除【关键词】
//                $deletedRows_2 = SEOKeyword::where('owner_id', $client_id)->delete();
                $deletedRows_2 = SEOKeyword::where('createuserid', $client_id)->delete();

                // 删除【待选关键词】
//                $deletedRows_3 = SEOCart::where('owner_id', $client_id)->delete();
                $deletedRows_3 = SEOCart::where('createuserid', $client_id)->delete();

                // 删除【关键词检测记录】
//                $deletedRows_4 = SEOKeywordDetectRecord::where('owner_id', $client_id)->delete();
                $deletedRows_4 = SEOKeywordDetectRecord::where('ownuserid', $client_id)->delete();

                // 删除【扣费记录】
//                $deletedRows_5 = ExpenseRecord::where('owner_id', $client_id)->delete();
                $deletedRows_5 = ExpenseRecord::where('ownuserid', $client_id)->delete();

                // 删除【用户】
//                $client->pivot_menus()->detach(); // 删除相关目录
                $bool = $client->delete();
                if(!$bool) throw new Exception("delete--user-client--fail");
            }

            // 删除名下子代理
            $sub_agents = K_User::where(['pid'=>$id,'usergroup'=>'Agent2'])->get();
            foreach ($sub_agents as $sub_a)
            {
                $sub_agent_id = $sub_a->id;
                $sub_agent_clients = K_User::where(['pid'=>$sub_agent_id,'usergroup'=>'Service'])->get();

                foreach ($sub_agent_clients as $sub_agent_c)
                {
                    $sub_agent_client_id =  $sub_agent_c->id;
                    $sub_agent_client = K_User::find($sub_agent_client_id);

                    // 删除【站点】
//                    $deletedRows_1 = SEOSite::where('owner_id', $sub_agent_client_id)->delete();
                    $deletedRows_1 = SEOSite::where('createuserid', $sub_agent_client_id)->delete();

                    // 删除【关键词】
//                    $deletedRows_2 = SEOKeyword::where('owner_id', $sub_agent_client_id)->delete();
                    $deletedRows_2 = SEOKeyword::where('createuserid', $sub_agent_client_id)->delete();

                    // 删除【待选关键词】
//                    $deletedRows_3 = SEOCart::where('owner_id', $sub_agent_client_id)->delete();
                    $deletedRows_3 = SEOCart::where('createuserid', $sub_agent_client_id)->delete();

                    // 删除【关键词检测记录】
//                    $deletedRows_4 = SEOKeywordDetectRecord::where('owner_id', $sub_agent_client_id)->delete();
                    $deletedRows_4 = SEOKeywordDetectRecord::where('ownuserid', $sub_agent_client_id)->delete();

                    // 删除【扣费记录】
//                    $deletedRows_5 = ExpenseRecord::where('owner_id', $sub_agent_client_id)->delete();
                    $deletedRows_5 = ExpenseRecord::where('ownuserid', $sub_agent_client_id)->delete();

                    // 删除【用户】
//                    $sub_agent_c->pivot_menus()->detach(); // 删除相关目录
                    $bool = $sub_agent_c->delete();
                    if(!$bool) throw new Exception("delete--user-sub-client--fail");
                }

                // 删除【用户】
//                $sub_a->pivot_menus()->detach(); // 删除相关目录
                $bool = $sub_a->delete();
                if(!$bool) throw new Exception("delete--user-sub--fail");
            }

            // 删除【用户】
//            $agent->pivot_menus()->detach(); // 删除相关目录
            $bool = $agent->delete();
            if(!$bool) throw new Exception("delete--user-agent--fail");

            DB::commit();

            return response_success([]);
        }
        catch (Exception $e)
        {
            DB::rollback();
            $msg = '删除失败，请重试';
            $msg = $e->getMessage();
//            exit($e->getMessage());
            return response_fail([],$msg);
        }
    }





    // 【用户】登录
    public function operate_user_user_login()
    {
        $user_id = request()->get('user_id');
        $user = ZY_User::where('id',$user_id)->first();
        if($user)
        {

            $type = request()->get('type','');
            if($type == "gps")
            {
                $admin_id = request()->get('admin_id');
                $admin = User::where('id',$admin_id)->first();

                Auth::guard('gps')->login($user,true);
                Auth::guard('gps_admin')->login($admin,true);

                if(request()->isMethod('get')) return redirect(env('DOMAIN_GPS').'/admin');
                else if(request()->isMethod('post')) return response_success();

            }
            else if($type == "admin")
            {
                $admin_id = request()->get('admin_id');
                $admin = ZY_User::where('id',$admin_id)->first();

                Auth::guard('zy_admin')->login($admin,true);

                if(request()->isMethod('get')) return redirect(env('DOMAIN_ATOM').'/admin');
                else if(request()->isMethod('post')) return response_success();
            }
            else if($type == "staff")
            {
                $admin_id = request()->get('admin_id');
                $admin = User::where('id',$admin_id)->first();

                Auth::guard('doc')->login($user,true);
                Auth::guard('doc_admin')->login($admin,true);

                if(request()->isMethod('get')) return redirect(env('DOMAIN_DOC').'/home');
                else if(request()->isMethod('post')) return response_success();
            }
            else
            {
                $return['user'] = $user;
                $return['env'] = '';

                if($this->env == 'test')
                {
                    $return['env'] = 'test';
                    Auth::guard('test')->login($user,true);
                    if(request()->isMethod('get')) return redirect(env('DOMAIN_TEST_DEFAULT'));
                    else if(request()->isMethod('post')) return response_success($return);
                }
                else
                {
                    Auth::login($user,true);
                    if(request()->isMethod('get')) return redirect(env('DOMAIN_DEFAULT'));
                    else if(request()->isMethod('post')) return response_success($return);
                }

//                if(request()->isMethod('get')) return redirect(env('DOMAIN_DEFAULT'));
//                else if(request()->isMethod('post')) return response_success($return);
            }
        }
        else return response_error([]);

    }




    // 【K】【用户】【全部机构】返回-列表-视图
    public function view_user_list_for_all($post_data)
    {
        $this->get_me();

        $return['sidebar_user_list_for_all_active'] = 'active menu-open';
        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.user.user-list-for-all';
        return view($view_blade)->with($return);
    }
    // 【K】【用户】【全部机构】返回-列表-数据
    public function get_user_list_for_all_datatable($post_data)
    {
        $this->get_me();
        $me = $this->me;

        $query = ZY_User::select('*')
//            ->with(['district'])
            ->whereIn('user_category',[11])
            ->whereIn('user_type',[0,1,9,11,19,21,22,41,61,88]);
//            ->whereHas('fund', function ($query1) { $query1->where('totalfunds', '>=', 1000); } )
//            ->with('ep','parent','fund')
//            ->withCount([
//                'members'=>function ($query) { $query->where('usergroup','Agent2'); },
//                'fans'=>function ($query) { $query->where('usergroup','Service'); }
//            ]);
//            ->where(['userstatus'=>'正常','status'=>1])
//            ->whereIn('usergroup',['Agent','Agent2']);

        if(!empty($post_data['username'])) $query->where('username', 'like', "%{$post_data['username']}%");

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 40;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->withTrashed()->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->encode_id = encode($v->id);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }


    // 【K】【用户】【个人用户】返回-列表-视图
    public function view_user_list_for_individual($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.user.user-list-for-individual')
            ->with(['sidebar_user_list_for_individual_active'=>'active menu-open']);
    }
    // 【K】【用户】【个人用户】返回-列表-数据
    public function get_user_list_for_individual_datatable($post_data)
    {
        $me = Auth::guard("staff_admin")->user();
        $query = User::select('*')
            ->with(['district'])
            ->where(['active'=>1,'user_category'=>1,'user_type'=>1]);

        if(!empty($post_data['username'])) $query->where('username', 'like', "%{$post_data['username']}%");

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 40;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->encode_id = encode($v->id);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }


    // 【K】【用户】【组织】返回-列表-视图
    public function view_user_list_for_doc($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.user.user-list-for-doc')
            ->with(['sidebar_user_list_for_doc_active'=>'active menu-open']);
    }
    // 【K】【用户】【组织】返回-列表-数据
    public function get_user_list_for_doc_datatable($post_data)
    {
        $me = Auth::guard("staff_admin")->user();
        $query = User::select('*')
            ->with(['district'])
            ->where(['active'=>1,'user_category'=>9]);

        if(!empty($post_data['username'])) $query->where('username', 'like', "%{$post_data['username']}%");

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 40;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->withTrashed()->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->encode_id = encode($v->id);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }


    // 【K】【用户】【组织】返回-列表-视图
    public function view_user_list_for_org($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.user.user-list-for-org')
            ->with(['sidebar_user_list_for_org_active'=>'active menu-open']);
    }
    // 【K】【用户】【组织】返回-列表-数据
    public function get_user_list_for_org_datatable($post_data)
    {
        $me = Auth::guard("staff_admin")->user();
        $query = User::select('*')
            ->with(['district'])
            ->where(['active'=>1,'user_category'=>11]);

        if(!empty($post_data['username'])) $query->where('username', 'like', "%{$post_data['username']}%");

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 40;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->withTrashed()->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->encode_id = encode($v->id);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }


    // 【K】【用户】【赞助商】返回-列表-视图
    public function view_user_list_for_sponsor($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.user.user-list-for-sponsor')
            ->with(['sidebar_user_list_for_sponsor_active'=>'active menu-open']);
    }
    // 【K】【用户】【赞助商】返回-列表-数据
    public function get_user_list_for_sponsor_datatable($post_data)
    {
        $me = Auth::guard("staff_admin")->user();
        $query = User::select('*')
            ->with(['district'])
            ->where(['active'=>1,'user_category'=>88]);

        if(!empty($post_data['username'])) $query->where('username', 'like', "%{$post_data['username']}%");

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 40;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->withTrashed()->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->encode_id = encode($v->id);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }








    /*
     * ITEM 内容管理
     */

    // 【内容】【全部】返回-列表-视图
    public function view_item_list_for_all($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.item.item-list-for-all')
            ->with([
                'sidebar_item_list_active'=>'active',
                'sidebar_item_list_for_all_active'=>'active'
            ]);
    }
    // 【内容】【全部】返回-列表-数据
    public function get_item_list_for_all_datatable($post_data)
    {
        $me = Auth::guard('staff_admin')->user();
        $query = YF_Item::select('*')->withTrashed()
            ->with('owner','creator')
            ->where('item_category',11)
            ->where('item_type', '!=',0);

        if(!empty($post_data['name'])) $query->where('name', 'like', "%{$post_data['name']}%");
        if(!empty($post_data['title'])) $query->where('title', 'like', "%{$post_data['title']}%");
        if(!empty($post_data['tag'])) $query->where('tag', 'like', "%{$post_data['tag']}%");

        $item_type = isset($post_data['item_type']) ? $post_data['item_type'] : '';
        if($item_type == "article") $query->where('item_type', 1);
        else if($item_type == "menu_type") $query->where('item_type', 11);
        else if($item_type == "time_line") $query->where('item_type', 18);
        else if($item_type == "debase") $query->where('item_type', 22);
        else if($item_type == "vote") $query->where('item_type', 29);
        else if($item_type == "ask") $query->where('item_type', 31);

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 20;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->custom = json_decode($v->custom,true);
//            $list[$k]->description = replace_blank($v->description);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }

    // 【内容】【全部】返回-列表-视图
    public function view_item_list_for_atom($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.item.item-list-for-atom')
            ->with([
                'sidebar_item_list_active'=>'active',
                'sidebar_item_list_for_atom_active'=>'active'
            ]);
    }
    // 【内容】【全部】返回-列表-数据
    public function get_item_list_for_atom_datatable($post_data)
    {
        $me = Auth::guard('super')->user();
        $query = Doc_Item::select('*')->withTrashed()
            ->with('owner','creator')
            ->where(['owner_id'=>100,'item_category'=>100])
            ->where('item_type', '!=',0);

        if(!empty($post_data['name'])) $query->where('name', 'like', "%{$post_data['name']}%");
        if(!empty($post_data['title'])) $query->where('title', 'like', "%{$post_data['title']}%");
        if(!empty($post_data['tag'])) $query->where('tag', 'like', "%{$post_data['tag']}%");

        $item_type = isset($post_data['item_type']) ? $post_data['item_type'] : '';
        if($item_type == "item") $query->where('item_type', 0);
        else if($item_type == "object") $query->where('item_type', 1);
        else if($item_type == "people") $query->where('item_type', 11);
        else if($item_type == "product") $query->where('item_type', 22);
        else if($item_type == "event") $query->where('item_type', 33);
        else if($item_type == "conception") $query->where('item_type', 91);


        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 20;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
//            $list[$k]->description = replace_blank($v->description);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }

    // 【内容】【全部】返回-列表-视图
    public function view_item_list_for_doc($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.item.item-list-for-doc')
            ->with([
                'sidebar_item_list_active'=>'active',
                'sidebar_item_list_for_doc_active'=>'active'
            ]);
    }
    // 【内容】【全部】返回-列表-数据
    public function get_item_list_for_doc_datatable($post_data)
    {
        $me = Auth::guard('super')->user();
        $query = Doc_Item::select('*')->withTrashed()
            ->with('owner','creator')
            ->where(['item_category'=>1])
            ->where('item_type', '!=',0);

        if(!empty($post_data['name'])) $query->where('name', 'like', "%{$post_data['name']}%");
        if(!empty($post_data['title'])) $query->where('title', 'like', "%{$post_data['title']}%");
        if(!empty($post_data['tag'])) $query->where('tag', 'like', "%{$post_data['tag']}%");

        $item_type = isset($post_data['item_type']) ? $post_data['item_type'] : '';
        if($item_type == "article") $query->where('item_type', 1);
        else if($item_type == "menu_type") $query->where('item_type', 11);
        else if($item_type == "time_line") $query->where('item_type', 18);
        else if($item_type == "debase") $query->where('item_type', 22);
        else if($item_type == "vote") $query->where('item_type', 29);
        else if($item_type == "ask") $query->where('item_type', 31);

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 20;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
//            $list[$k]->description = replace_blank($v->description);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }








    // 【内容】【全部】返回-列表-视图
    public function view_task_list_for_all($post_data)
    {
        $this->get_me();
        $me = $this->me;

        $sales = ZY_User::select('id','true_name')->where('user_category',11)->whereIn('user_type',[41,61,88])->get();

        $return['sales'] = $sales;
        $return['menu_active_of_task_list'] = 'active';
        $return['menu_active_of_task_list_for_all'] = 'active';

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.item.task-list-for-all';
        return view($view_blade)->with($return);
    }
    // 【内容】【全部】返回-列表-数据
    public function get_task_list_for_all_datatable($post_data)
    {
        $this->get_me();
        $me = $this->me;

        $query = ZY_Task::select('*')
//            ->withTrashed()
            ->with('owner','creator');
//            ->where('item_category',11)
//            ->where('item_type', '!=',0);

        if(!empty($post_data['name'])) $query->where('name', 'like', "%{$post_data['name']}%");
        if(!empty($post_data['title'])) $query->where('title', 'like', "%{$post_data['title']}%");
        if(!empty($post_data['tag'])) $query->where('tag', 'like', "%{$post_data['tag']}%");

        $item_type = isset($post_data['item_type']) ? $post_data['item_type'] : '';
        if($item_type == "article") $query->where('item_type', 1);
        else if($item_type == "menu_type") $query->where('item_type', 11);
        else if($item_type == "time_line") $query->where('item_type', 18);
        else if($item_type == "debase") $query->where('item_type', 22);
        else if($item_type == "vote") $query->where('item_type', 29);
        else if($item_type == "ask") $query->where('item_type', 31);


        $item_result = isset($post_data['item_result']) ? $post_data['item_result'] : '';
        if($item_result == "加微信")
        {
            $query->where('is_completed',1);
            $query->where('item_result',19);
            $query->orderByDesc('completed_at');
        }
        else if($item_result == "有备注")
        {
            $query->where('is_completed',1);
            $query->whereNotNull('remark');
            $query->orderByDesc('completed_at');
        }




        $owner_id = isset($post_data['finished']) ? $post_data['owner'] : '';
        if(!in_array($owner_id,[-1,0])) $query->where('owner_id', $owner_id);

        $is_completed = isset($post_data['finished']) ? $post_data['finished'] : '';
        if($is_completed == 0) $query->where('is_completed', 0);
        else if($is_completed == 1) $query->where('is_completed', 1);

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 20;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->custom = json_decode($v->custom,true);
//            $list[$k]->description = replace_blank($v->description);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }









    /*
     * District 地域管理
     */

    // 【地域】返回-添加-视图
    public function view_district_create()
    {
        $item_type = 'item';
        $item_type_text = '地域';
        $title_text = '添加'.$item_type_text;
        $list_text = $item_type_text.'列表';
        $list_link = '/admin/district/district-list-for-all';

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.district.district-edit';
        return view($view_blade)->with([
            'operate'=>'create',
            'operate_id'=>0,
            'category'=>'item',
            'type'=>$item_type,
            'item_type_text'=>$item_type_text,
            'title_text'=>$title_text,
            'list_text'=>$list_text,
            'list_link'=>$list_link,
        ]);
    }
    // 【地域】返回-编辑-视图
    public function view_district_edit()
    {
        $id = request("id",0);
        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.district.district-edit';

        if($id == 0)
        {
            return view($view_blade)->with(['operate'=>'create', 'operate_id'=>$id]);
        }
        else
        {
            $mine = Def_District::with(['parent'])->find($id);
            if($mine)
            {
//                if(!is_numeric($type)) return view(env('TEMPLATE_ZY_SUPER').'errors.404');
                if(!in_array($mine->district_type,[1,2,3,4,11,21,31,41])) return view(env('TEMPLATE_ZY_SUPER').'errors.404');
                $mine->custom = json_decode($mine->custom);
                $mine->custom2 = json_decode($mine->custom2);
                $mine->custom3 = json_decode($mine->custom3);

                $item_type = 'item';
                $item_type_text = '地域';
                $title_text = '编辑'.$item_type_text;
                $list_text = $item_type_text.'列表';
                $list_link = '/admin/district/district-list-for-all';

                return view($view_blade)->with([
                    'operate'=>'edit',
                    'operate_id'=>$id,
                    'data'=>$mine,
                    'category'=>'item',
                    'type'=>$item_type,
                    'item_type_text'=>$item_type_text,
                    'title_text'=>$title_text,
                    'list_text'=>$list_text,
                    'list_link'=>$list_link,
                ]);
            }
            else return view(env('TEMPLATE_ZY_SUPER').'errors.404');
        }
    }
    // 【地域】【组织】保存数据
    public function operate_district_save($post_data)
    {
//        dd($post_data);
        $messages = [
            'operate.required' => '参数有误',
            'name.required' => 'name.required',
        ];
        $v = Validator::make($post_data, [
            'operate' => 'required',
            'name' => 'required',
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }


        $me = Auth::guard('super')->user();
        if(!in_array($me->user_category,[0])) return response_error([],"你没有操作权限！");


        $operate = $post_data["operate"];
        $operate_id = $post_data["operate_id"];

        if($operate == 'create') // 添加 ( $id==0，添加一个新用户 )
        {
            $mine = new Def_District;
            $post_data["district_category"] = 1;
        }
        else if($operate == 'edit') // 编辑
        {
            $mine = Def_District::find($operate_id);
            if(!$mine) return response_error([],"该地域不存在，刷新页面重试！");
        }
        else return response_error([],"参数有误！");

        // 启动数据库事务
        DB::beginTransaction();
        try
        {
            if(!empty($post_data['custom']))
            {
                $post_data['custom'] = json_encode($post_data['custom']);
            }

            $mine_data = $post_data;
            $mine_data['district_number'] = !empty($post_data['district_number']) ? $post_data['district_number'] : 0;
            $mine_data['parent_id'] = !empty($post_data['select2_parent_id']) ? $post_data['select2_parent_id'] : 0;
            unset($mine_data['operate']);
            unset($mine_data['operate_id']);
            $bool = $mine->fill($mine_data)->save();
            if($bool)
            {
                // 封面图片
                if(!empty($post_data["cover"]))
                {
                    // 删除原封面图片
                    $mine_cover_pic = $mine->cover_pic;
                    if(!empty($mine_cover_pic) && file_exists(storage_path("resource/" . $mine_cover_pic)))
                    {
                        unlink(storage_path("resource/" . $mine_cover_pic));
                    }

                    $result = upload_storage($post_data["cover"],'','doc/common');
                    if($result["result"])
                    {
                        $mine->cover_pic = $result["local"];
                        $mine->save();
                    }
                    else throw new Exception("upload--cover_pic--fail");
                }


            }
            else throw new Exception("insert--user--fail");

            DB::commit();
            return response_success(['id'=>$mine->id]);
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

    // 【地域】【全部】返回-列表-视图
    public function view_district_list_for_all($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.district.district-list-for-all')
            ->with([
                'sidebar_district_list_active'=>'active',
                'sidebar_district_list_for_all_active'=>'active'
            ]);
    }
    // 【地域】【全部】返回-列表-数据
    public function get_district_list_for_all_datatable($post_data)
    {
        $me = Auth::guard('super')->user();
        $query = Def_District::select('*')->withTrashed()
            ->with(['parent']);

        if(!empty($post_data['name'])) $query->where('name', 'like', "%{$post_data['name']}%");
        if(!empty($post_data['title'])) $query->where('title', 'like', "%{$post_data['title']}%");
        if(!empty($post_data['tag'])) $query->where('tag', 'like', "%{$post_data['tag']}%");

        $item_type = isset($post_data['item_type']) ? $post_data['item_type'] : '';
        if($item_type == "article") $query->where('item_type', 1);
        else if($item_type == "menu_type") $query->where('item_type', 11);
        else if($item_type == "time_line") $query->where('item_type', 18);
        else if($item_type == "debase") $query->where('item_type', 22);
        else if($item_type == "vote") $query->where('item_type', 29);
        else if($item_type == "ask") $query->where('item_type', 31);

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 20;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
//            $list[$k]->description = replace_blank($v->description);
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }


    //
    public function operate_district_select2_parent($post_data)
    {
        $type = $post_data['type'];
        if($type == 0)$district_type = 0;
        else if($type == 1)$district_type = 0;
        else if($type == 2)$district_type = 1;
        else if($type == 3)$district_type = 2;
        else if($type == 4)$district_type = 3;
        else if($type == 21)$district_type = 4;
        else if($type == 31)$district_type = 21;
        else if($type == 41)$district_type = 31;
        else $district_type = 0;
        if(!is_numeric($type)) return view(env('TEMPLATE_ZY_SUPER').'errors.404');
//        if(!in_array($type,[1,2,3,10,11,88])) return view(env('TEMPLATE_ZY_SUPER').'errors.404');

        if(empty($post_data['keyword']))
        {
            $list =Def_District::select(['id','name as text'])->where('district_type', $district_type)->get()->toArray();
        }
        else
        {
            $keyword = "%{$post_data['keyword']}%";
            $list =Def_District::select(['id','name as text'])->where('district_type', $district_type)->where('name','like',"%$keyword%")->get()->toArray();
        }
        return $list;
    }






    /*
     * Statistic 流量统计
     */

    // 【】流量统计
    public function view_statistic_index()
    {
        $me = Auth::guard('super')->user();
        $me_id = $me->id;

        $this_month = date('Y-m');
        $this_month_year = date('Y');
        $this_month_month = date('m');
        $last_month = date('Y-m',strtotime('last month'));
        $last_month_year = date('Y',strtotime('last month'));
        $last_month_month = date('m',strtotime('last month'));


        // 总访问量【统计】
        $all = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>1])
            ->get();
        $all = $all->keyBy('day');

        // 首页访问量【统计】
        $rooted = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>1,'page_type'=>1,'page_module'=>1])
            ->get();
        $rooted = $rooted->keyBy('day');

        // 介绍页访问量【统计】
        $introduction = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>1,'page_type'=>1,'page_module'=>2])
            ->get();
        $introduction = $introduction->keyBy('day');




        // 打开设备类型【占比】
        $open_device_type = Def_Record::select('open_device_type',DB::raw('count(*) as count'))
            ->groupBy('open_device_type')
            ->where(['record_category'=>1,'record_type'=>1])
            ->get();
        foreach($open_device_type as $k => $v)
        {
            if($v->open_device_type == 0) $open_device_type[$k]->name = "默认";
            else if($v->open_device_type == 1) $open_device_type[$k]->name = "移动端";
            else if($v->open_device_type == 2)  $open_device_type[$k]->name = "PC端";
        }

        // 打开系统类型【占比】
        $open_system = Def_Record::select('open_system',DB::raw('count(*) as count'))
            ->groupBy('open_system')
            ->where(['record_category'=>1,'record_type'=>1])
            ->get();

        // 打开APP类型【占比】
        $open_app = Def_Record::select('open_app',DB::raw('count(*) as count'))
            ->groupBy('open_app')
            ->where(['record_category'=>1,'record_type'=>1])
            ->get();



        // 总分享【统计】
        $shared_all = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>2])
            ->get();
        $shared_all = $shared_all->keyBy('day');

        // 首页分享【统计】
        $shared_root = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>2])
            ->where(['page_type'=>1,'page_module'=>1])
            ->get();
        $shared_root = $shared_root->keyBy('day');




        // 总分享【占比】
        $shared_all_scale = Def_Record::select('record_module',DB::raw('count(*) as count'))
//            ->groupBy('shared_location')
            ->groupBy('record_module')
            ->where(['record_category'=>1,'record_type'=>2])
            ->get();
        foreach($shared_all_scale as $k => $v)
        {
//            if($v->shared_location == 1) $shared_all_scale[$k]->name = "微信好友";
//            else if($v->shared_location == 2) $shared_all_scale[$k]->name = "微信朋友圈";
//            else if($v->shared_location == 3) $shared_all_scale[$k]->name = "QQ好友";
//            else if($v->shared_location == 4) $shared_all_scale[$k]->name = "QQ空间";
//            else if($v->shared_location == 5) $shared_all_scale[$k]->name = "腾讯微博";
//            else $shared_all_scale[$k]->name = "其他";

            if($v->record_module == 1) $shared_all_scale[$k]->name = "微信好友|QQ好友";
            else if($v->record_module == 2) $shared_all_scale[$k]->name = "朋友圈|QQ空间";
            else $shared_all_scale[$k]->name = "其他";
        }

        // 首页分享【占比】
        $shared_root_scale = Def_Record::select('record_module',DB::raw('count(*) as count'))
//            ->groupBy('shared_location')
            ->groupBy('record_module')
            ->where(['record_category'=>1,'record_type'=>2])
            ->where(['page_type'=>1,'page_module'=>1])
            ->get();
        foreach($shared_root_scale as $k => $v)
        {
//            if($v->shared_location == 1) $shared_root_scale[$k]->name = "微信好友";
//            else if($v->shared_location == 2) $shared_root_scale[$k]->name = "微信朋友圈";
//            else if($v->shared_location == 3) $shared_root_scale[$k]->name = "QQ好友";
//            else if($v->shared_location == 4) $shared_root_scale[$k]->name = "QQ空间";
//            else if($v->shared_location == 5) $shared_root_scale[$k]->name = "腾讯微博";
//            else $shared_root_scale[$k]->name = "其他";

            if($v->record_module == 1) $shared_root_scale[$k]->name = "微信好友|QQ好友";
            else if($v->record_module == 2) $shared_root_scale[$k]->name = "朋友圈|QQ空间";
            else $shared_root_scale[$k]->name = "其他";
        }


        $view_data["all"] = $all;
        $view_data["rooted"] = $rooted;
        $view_data["introduction"] = $introduction;
        $view_data["open_device_type"] = $open_device_type;
        $view_data["open_app"] = $open_app;
        $view_data["open_system"] = $open_system;
        $view_data["shared_all"] = $shared_all;
        $view_data["shared_all_scale"] = $shared_all_scale;
        $view_data["shared_root"] = $shared_root;
        $view_data["shared_root_scale"] = $shared_root_scale;
        $view_data["sidebar_statistic_active"] = 'active';

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.statistic.statistic-index';
        return view($view_blade)->with($view_data);
    }
    // 【】流量统计
    public function view_statistic_user($post_data)
    {
        $messages = [
            'id.required' => 'id required',
        ];
        $v = Validator::make($post_data, [
            'id' => 'required',
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        $user_id = $post_data["id"];
        $user = User::find($user_id);

        $this_month = date('Y-m');
        $this_month_year = date('Y');
        $this_month_month = date('m');
        $last_month = date('Y-m',strtotime('last month'));
        $last_month_year = date('Y',strtotime('last month'));
        $last_month_month = date('m',strtotime('last month'));


        // 总访问量【统计】
        $all = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('object_id',$user_id)
            ->get();
        $all = $all->keyBy('day');

        // 首页访问量【统计】
        $rooted = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>1,'page_type'=>2,'page_module'=>1])
            ->where('object_id',$user_id)
            ->get();
        $rooted = $rooted->keyBy('day');

        // 介绍页访问量【统计】
        $introduction = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>1,'page_type'=>2,'page_module'=>2])
            ->where('object_id',$user_id)
            ->get();
        $introduction = $introduction->keyBy('day');




        // 打开设备类型【占比】
        $open_device_type = Def_Record::select('open_device_type',DB::raw('count(*) as count'))
            ->groupBy('open_device_type')
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('object_id',$user_id)
            ->get();
        foreach($open_device_type as $k => $v)
        {
            if($v->open_device_type == 0) $open_device_type[$k]->name = "默认";
            else if($v->open_device_type == 1) $open_device_type[$k]->name = "移动端";
            else if($v->open_device_type == 2)  $open_device_type[$k]->name = "PC端";
        }

        // 打开系统类型【占比】
        $open_system = Def_Record::select('open_system',DB::raw('count(*) as count'))
            ->groupBy('open_system')
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('object_id',$user_id)
            ->get();

        // 打开APP类型【占比】
        $open_app = Def_Record::select('open_app',DB::raw('count(*) as count'))
            ->groupBy('open_app')
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('object_id',$user_id)
            ->get();




        // 总分享【统计】
        $shared_all = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>2])
            ->where('object_id',$user_id)
            ->get();
        $shared_all = $shared_all->keyBy('day');

        // 首页分享【统计】
        $shared_root = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>2,'page_type'=>2,'page_module'=>1])
            ->where('object_id',$user_id)
            ->get();
        $shared_root = $shared_root->keyBy('day');




        // 总分享【占比】
        $shared_all_scale = Def_Record::select('record_module',DB::raw('count(*) as count'))
            ->groupBy('record_module')
            ->where(['record_category'=>1,'record_type'=>2])
            ->where('object_id',$user_id)
            ->get();
        foreach($shared_all_scale as $k => $v)
        {
            if($v->record_module == 1) $shared_all_scale[$k]->name = "微信好友|QQ好友";
            else if($v->record_module == 2) $shared_all_scale[$k]->name = "朋友圈|QQ空间";
            else $shared_all_scale[$k]->name = "其他";
        }

        // 首页分享【占比】
        $shared_root_scale = Def_Record::select('record_module',DB::raw('count(*) as count'))
            ->groupBy('record_module')
            ->where(['record_category'=>1,'record_type'=>2])
            ->where(['page_type'=>1,'page_module'=>1])
            ->where('object_id',$user_id)
            ->get();
        foreach($shared_root_scale as $k => $v)
        {
            if($v->record_module == 1) $shared_all_scale[$k]->name = "微信好友|QQ好友";
            else if($v->record_module == 2) $shared_all_scale[$k]->name = "朋友圈|QQ空间";
            else $shared_all_scale[$k]->name = "其他";
        }


        $view_data["user"] = $user;
        $view_data["all"] = $all;
        $view_data["rooted"] = $rooted;
        $view_data["introduction"] = $introduction;
        $view_data["open_device_type"] = $open_device_type;
        $view_data["open_app"] = $open_app;
        $view_data["open_system"] = $open_system;
        $view_data["shared_all"] = $shared_all;
        $view_data["shared_root"] = $shared_root;
        $view_data["shared_all_scale"] = $shared_all_scale;
        $view_data["shared_root_scale"] = $shared_root_scale;

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.statistic.statistic-user';
        return view($view_blade)->with($view_data);
    }
    // 【】流量统计
    public function view_statistic_item($post_data)
    {
        $messages = [
            'id.required' => 'id required',
        ];
        $v = Validator::make($post_data, [
            'id' => 'required',
        ], $messages);
        if ($v->fails())
        {
            $messages = $v->errors();
            return response_error([],$messages->first());
        }

        $item_id = $post_data["id"];
        $item = Def_Item::find($item_id);

        $this_month = date('Y-m');
        $this_month_year = date('Y');
        $this_month_month = date('m');
        $last_month = date('Y-m',strtotime('last month'));
        $last_month_year = date('Y',strtotime('last month'));
        $last_month_month = date('m',strtotime('last month'));


        // 访问量【统计】
        $data = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('item_id',$item_id)
            ->get();
        $data = $data->keyBy('day');




        // 打开设备类型【占比】
        $open_device_type = Def_Record::select('open_device_type',DB::raw('count(*) as count'))
            ->groupBy('open_device_type')
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('item_id',$item_id)
            ->get();
        foreach($open_device_type as $k => $v)
        {
            if($v->open_device_type == 0) $open_device_type[$k]->name = "默认";
            else if($v->open_device_type == 1) $open_device_type[$k]->name = "移动端";
            else if($v->open_device_type == 2)  $open_device_type[$k]->name = "PC端";
        }

        // 打开系统类型【占比】
        $open_system = Def_Record::select('open_system',DB::raw('count(*) as count'))
            ->groupBy('open_system')
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('item_id',$item_id)
            ->get();

        // 打开APP类型【占比】
        $open_app = Def_Record::select('open_app',DB::raw('count(*) as count'))
            ->groupBy('open_app')
            ->where(['record_category'=>1,'record_type'=>1])
            ->where('item_id',$item_id)
            ->get();




        // 分享【统计】
        $shared_data = Def_Record::select(
            DB::raw("DATE(FROM_UNIXTIME(created_at)) as date"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%Y-%m') as month"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%c') as month_0"),
            DB::raw("DATE_FORMAT(FROM_UNIXTIME(created_at),'%e') as day"),
            DB::raw('count(*) as count')
        )
            ->groupBy(DB::raw("DATE(FROM_UNIXTIME(created_at))"))
            ->whereYear(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_year)
            ->whereMonth(DB::raw("DATE(FROM_UNIXTIME(created_at))"),$this_month_month)
            ->where(['record_category'=>1,'record_type'=>2])
            ->where('item_id',$item_id)
            ->get();
        $shared_data = $shared_data->keyBy('day');


        // 分享【占比】
        $shared_data_scale = Def_Record::select('record_module',DB::raw('count(*) as count'))
            ->groupBy('record_module')
            ->where(['record_category'=>1,'record_type'=>2])
            ->where('item_id',$item_id)
            ->get();
        foreach($shared_data_scale as $k => $v)
        {
            if($v->record_module == 1) $shared_data_scale[$k]->name = "微信好友|QQ好友";
            else if($v->record_module == 2) $shared_data_scale[$k]->name = "朋友圈|QQ空间";
            else $shared_data_scale[$k]->name = "其他";
        }


        $view_data["item"] = $item;
        $view_data["data"] = $data;
        $view_data["open_device_type"] = $open_device_type;
        $view_data["open_app"] = $open_app;
        $view_data["open_system"] = $open_system;
        $view_data["shared_data"] = $shared_data;
        $view_data["shared_data_scale"] = $shared_data_scale;

        $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.statistic.statistic-item';
        return view($view_blade)->with($view_data);
    }


    // 【K】【内容】【全部】返回-列表-视图
    public function view_statistic_all_list($post_data)
    {
        return view(env('TEMPLATE_ZY_SUPER').'entrance.statistic.statistic-all-list')
            ->with([
                'sidebar_statistic_all_list_active'=>'active'
            ]);
    }
    // 【K】【内容】【全部】返回-列表-数据
    public function get_statistic_all_datatable($post_data)
    {
        $me = Auth::guard("staff_admin")->user();
        $query = Def_Record::select('*')
            ->with(['creator','object','item']);

        if(!empty($post_data['title'])) $query->where('title', 'like', "%{$post_data['title']}%");

        if(!empty($post_data['open_device_type']))
        {
            if($post_data['open_device_type'] == "0")
            {
            }
            else if(in_array($post_data['open_system'],[1,2]))
            {
                $query->where('open_device_type',$post_data['open_device_type']);
            }
            else if($post_data['open_device_type'] == "Unknown")
            {
                $query->where('open_device_type',"Unknown");
            }
            else if($post_data['open_device_type'] == "Others")
            {
                $query->whereNotIn('open_device_type',[1,2]);
            }
            else
            {
                $query->where('open_device_type',$post_data['open_device_type']);
            }
        }
        else
        {
//            $query->whereIn('open_system',['Android','iPhone','iPad','Mac','Windows']);
        }

        if(!empty($post_data['open_system']))
        {
            if($post_data['open_system'] == "0")
            {
            }
            else if($post_data['open_system'] == "1")
            {
                $query->whereIn('open_system',['Android','iPhone','iPad','Mac','Windows']);
            }
            else if(in_array($post_data['open_system'],['Android','iPhone','iPad','Mac','Windows']))
            {
                $query->where('open_system',$post_data['open_system']);
            }
            else if($post_data['open_system'] == "Unknown")
            {
                $query->where('open_system',"Unknown");
            }
            else if($post_data['open_system'] == "Others")
            {
                $query->whereNotIn('open_system',['Android','iPhone','iPad','Mac','Windows']);
            }
            else
            {
                $query->where('open_system',$post_data['open_system']);
            }
        }
        else
        {
//            $query->whereIn('open_system',['Android','iPhone','iPad','Mac','Windows']);
        }

        if(!empty($post_data['open_browser']))
        {
            if($post_data['open_browser'] == "0")
            {
            }
            else if($post_data['open_browser'] == "1")
            {
                $query->whereIn('open_browser',['Chrome','Firefox','Safari']);
            }
            else if(in_array($post_data['open_browser'],['Chrome','Firefox','Safari']))
            {
                $query->where('open_browser',$post_data['open_browser']);
            }
            else if($post_data['open_browser'] == "Unknown")
            {
                $query->where('open_browser',"Unknown");
            }
            else if($post_data['open_browser'] == "Others")
            {
                $query->whereNotIn('open_browser',['Chrome','Firefox','Safari']);
            }
            else
            {
                $query->where('open_browser',$post_data['open_browser']);
            }
        }
        else
        {
//            $query->whereIn('open_browser',['Chrome','Firefox','Safari']);
        }

        if(!empty($post_data['open_app']))
        {
            if($post_data['open_app'] == "0")
            {
            }
            else if($post_data['open_app'] == "1")
            {
                $query->whereIn('open_app',['WeChat','QQ','Alipay']);
            }
            else if(in_array($post_data['open_app'],['WeChat','QQ','Alipay']))
            {
                $query->where('open_app',$post_data['open_app']);
            }
            else if($post_data['open_app'] == "Unknown")
            {
                $query->where('open_app',"Unknown");
            }
            else if($post_data['open_app'] == "Others")
            {
                $query->whereNotIn('open_app',['WeChat','QQ','Alipay']);
            }
            else
            {
                $query->where('open_app',$post_data['open_app']);
            }
        }
        else
        {
//            $query->whereIn('open_app',['WeChat','QQ']);
        }

        $total = $query->count();

        $draw  = isset($post_data['draw'])  ? $post_data['draw']  : 1;
        $skip  = isset($post_data['start'])  ? $post_data['start']  : 0;
        $limit = isset($post_data['length']) ? $post_data['length'] : 20;

        if(isset($post_data['order']))
        {
            $columns = $post_data['columns'];
            $order = $post_data['order'][0];
            $order_column = $order['column'];
            $order_dir = $order['dir'];

            $field = $columns[$order_column]["data"];
            $query->orderBy($field, $order_dir);
        }
        else $query->orderBy("id", "desc");

        if($limit == -1) $list = $query->get();
        else $list = $query->skip($skip)->take($limit)->get();

        foreach ($list as $k => $v)
        {
            $list[$k]->encode_id = encode($v->id);
            $list[$k]->description = replace_blank($v->description);

            if($v->owner_id == $me->id) $list[$k]->is_me = 1;
            else $list[$k]->is_me = 0;
        }
//        dd($list->toArray());
        return datatable_response($list, $draw, $total);
    }





}