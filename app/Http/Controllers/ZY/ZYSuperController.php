<?php
namespace App\Http\Controllers\ZY;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\ZY\ZY_User;
use App\Models\ZY\ZY_Item;

use App\Repositories\ZY\ZYSuperRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;

class ZYSuperController extends Controller
{
    //
    private $repo;
    public function __construct()
    {
        $this->repo = new ZYSuperRepository;
    }


    // 登陆
    public function login()
    {
        if(request()->isMethod('get'))
        {
            $view_blade = env('TEMPLATE_ZY_SUPER').'entrance.login';
            return view($view_blade);
        }
        else if(request()->isMethod('post'))
        {
            $where['email'] = request()->get('email');
            $where['mobile'] = request()->get('mobile');
            $where['password'] = request()->get('password');

//            $email = request()->get('email');
//            $admin = SuperAdministrator::whereEmail($email)->first();

            $mobile = request()->get('mobile');
            $admin = ZY_User::whereMobile($mobile)->first();

            if($admin)
            {
                if($admin->active == 1)
                {
                    $password = request()->get('password');
                    if(password_check($password,$admin->password))
                    {
                        $remember = request()->get('remember');
                        if($remember) Auth::guard('zy_super')->login($admin,true);
                        else Auth::guard('zy_super')->login($admin,true);
                        return response_success();
                    }
                    else return response_error([],'账户or密码不正确 ');
                }
                else return response_error([],'账户尚未激活，请先去邮箱激活。');
            }
            else return response_error([],'账户不存在');
        }
    }

    // 退出
    public function logout()
    {
        Auth::guard('zy_super')->logout();
        return redirect('/login');
    }




    // 返回主页视图
    public function view_super_index()
    {
        return $this->repo->view_super_index();
    }


    /*
     * 用户基本信息
     */
    // 【基本信息】返回-视图
    public function view_my_profile_info_index()
    {
        return $this->repo->view_my_profile_info_index();
    }
    // 【基本信息】编辑
    public function operate_my_profile_info_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_my_profile_info_edit();
        else if (request()->isMethod('post')) return $this->repo->operate_my_profile_info_save(request()->all());
    }
    // 【基本信息】修改-密码
    public function operate_my_account_password_change()
    {
        if(request()->isMethod('get')) return $this->repo->view_my_account_password_change();
        else if (request()->isMethod('post')) return $this->repo->operate_my_account_password_change_save(request()->all());
    }




    /*
     * USER 用户
     */
    // 【用户】SELECT2 District
    public function operate_user_select2_district()
    {
        return $this->repo->operate_user_select2_district(request()->all());
    }

    // 【用户】添加
    public function operate_user_user_create()
    {
        if(request()->isMethod('get')) return $this->repo->view_user_user_create();
        else if (request()->isMethod('post')) return $this->repo->operate_user_user_save(request()->all());
    }
    // 【用户】编辑
    public function operate_user_user_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_user_user_edit();
        else if (request()->isMethod('post')) return $this->repo->operate_user_user_save(request()->all());
    }

    // 【用户】修改-密码
    public function operate_user_change_password()
    {
        return $this->repo->operate_user_change_password(request()->all());
    }


    // 【用户】登录
    public function operate_user_user_login()
    {
        $user_id = request()->get('user_id');
        $user = ZY_User::where('id',$user_id)->first();
        if($user)
        {
//            $type = request()->get('type','');
//            if($type == "admin")
//            {
//                $admin_id = request()->get('admin_id');
//                $admin = User::where('id',$admin_id)->first();
//
//                Auth::guard('gps')->login($user,true);
//
//                if(request()->isMethod('get')) return redirect(env('DOMAIN_GPS').'/admin');
//                else if(request()->isMethod('post')) return response_success();
//
//            }

            Auth::guard('zy_staff')->login($user,true);

            $return['user'] = $user;
            $return['url'] = env('DOMAIN_ZY_STAFF');

            if(request()->isMethod('get')) return redirect(env('DOMAIN_ZY_STAFF'));
            else if(request()->isMethod('post'))
            {
                return response_success($return);
            }
        }
        else return response_error([]);

    }




    // 【用户】【全部用户】返回-列表-视图
    public function view_user_list_for_all()
    {
        if(request()->isMethod('get')) return $this->repo->view_user_list_for_all(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_user_list_for_all_datatable(request()->all());
    }
    // 【用户】【个人用户】返回-列表-视图
    public function view_user_list_for_individual()
    {
        if(request()->isMethod('get')) return $this->repo->view_user_list_for_individual(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_user_list_for_individual_datatable(request()->all());
    }
    // 【用户】【轻博】返回-列表-视图
    public function view_user_list_for_doc()
    {
        if(request()->isMethod('get')) return $this->repo->view_user_list_for_doc(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_user_list_for_doc_datatable(request()->all());
    }
    // 【用户】【组织】返回-列表-视图
    public function view_user_list_for_org()
    {
        if(request()->isMethod('get')) return $this->repo->view_user_list_for_org(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_user_list_for_org_datatable(request()->all());
    }








    /*
     * ITEM 内容
     */
    // 【内容】【全部】返回-列表-视图
    public function view_item_list_for_all()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_list_for_all(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_item_list_for_all_datatable(request()->all());
    }
    // 【内容】【原子】返回-列表-视图
    public function view_item_list_for_atom()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_list_for_atom(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_item_list_for_atom_datatable(request()->all());
    }
    // 【内容】【轻博】返回-列表-视图
    public function view_item_list_for_doc()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_list_for_doc(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_item_list_for_doc_datatable(request()->all());
    }




    // 【任务】返回-列表-视图（全部任务）
    public function view_task_list_for_all()
    {
        if(request()->isMethod('get')) return $this->repo->view_task_list_for_all(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_task_list_for_all_datatable(request()->all());
    }








    /*
     * District 地域管理
     */
    // 【地域】添加
    public function operate_district_create()
    {
        if(request()->isMethod('get')) return $this->repo->view_district_create();
        else if (request()->isMethod('post')) return $this->repo->operate_district_save(request()->all());
    }
    // 【地域】编辑
    public function operate_district_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_district_edit();
        else if (request()->isMethod('post')) return $this->repo->operate_district_save(request()->all());
    }

    // 【地域】【全部】返回-列表-视图
    public function view_district_list_for_all()
    {
        if(request()->isMethod('get')) return $this->repo->view_district_list_for_all(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_district_list_for_all_datatable(request()->all());
    }

    // 【地域】SELECT2
    public function operate_district_select2_parent()
    {
        return $this->repo->operate_district_select2_parent(request()->all());
    }








    /*
     * Statistic 统计
     */
    // 【统计】概览
    public function view_statistic_index()
    {
        return $this->repo->view_statistic_index();
    }
    // 【统计】用户
    public function view_statistic_user()
    {
        return $this->repo->view_statistic_user(request()->all());
    }
    // 【统计】内容
    public function view_statistic_item()
    {
        return $this->repo->view_statistic_item(request()->all());
    }
    // 【K】【内容】返回-全部内容-列表-视图
    public function view_statistic_all_list()
    {
        if(request()->isMethod('get')) return $this->repo->view_statistic_all_list(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_statistic_all_datatable(request()->all());
    }







}
