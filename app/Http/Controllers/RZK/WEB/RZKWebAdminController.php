<?php
namespace App\Http\Controllers\RZK\WEB;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Models\RZK\RZK_Admin;

use App\Repositories\RZK\WEB\RZKWebAdminRepository;

use Response, Auth, Validator, DB, Exception;
use QrCode, Excel;

class RZKWebAdminController extends Controller
{
    //
    private $repo;
    public function __construct()
    {
        $this->repo = new RZKWebAdminRepository;
    }





    // 账号唯一登录
    public function check_is_only_me()
    {
        $result['message'] = 'failed';
        $result['result'] = 'denied';

        if(Auth::guard('rzk_web_admin')->check())
        {
            $token = request('_token');
            if(Auth::guard('rzk_web_admin')->user()->admin_token == $token)
            {
                $result['message'] = 'success';
                $result['result'] = 'access';
            }
        }

        return Response::json($result);
    }

    // 登陆
    public function login()
    {
        if(request()->isMethod('get'))
        {
            $view_blade = env('TEMPLATE_RZK_WEB_ADMIN').'entrance.login';
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
            $admin = RZK_Admin::whereMobile($mobile)->first();

            if($admin)
            {
                if($admin->user_status == 1)
                {
                    $token = request()->get('_token');
                    $password = request()->get('password');
                    if(password_check($password,$admin->password))
                    {
                        $remember = request()->get('remember');
                        if($remember) Auth::guard('rzk_web_admin')->login($admin,false);
                        else Auth::guard('rzk_web_admin')->login($admin,false);
//                        Auth::guard('rzk_web_admin')->user()->admin_token = $token;
//                        Auth::guard('rzk_web_admin')->user()->save();
                        return response_success();
                    }
                    else return response_error([],'账户or密码不正确！');
                }
                else return response_error([],'账户已禁用！');
            }
            else return response_error([],'账户不存在！');
        }
    }

    // 退出
    public function logout()
    {
//        Auth::guard('rzk_web_admin')->user()->admin_token = '';
//        Auth::guard('rzk_web_admin')->user()->save();
        Auth::guard('rzk_web_admin')->logout();
        return redirect('/admin/login');
    }

    // 退出
    public function logout_without_token()
    {
        Auth::guard('rzk_web_admin')->logout();
        return redirect('/admin/login');
    }




    // 返回主页视图
    public function view_admin_index()
    {
        return $this->repo->view_admin_index();
    }


    // 返回主页视图
    public function view_admin_404()
    {
        return $this->repo->view_admin_404();
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
     * ITEM 内容管理
     */
    // 【页面】返回-列表-视图
    public function view_item_page_list()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_page_list(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_item_page_list_datatable(request()->all());
    }

    // 【页面】添加
    public function operate_item_page_create()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_page_create();
        else if (request()->isMethod('post')) return $this->repo->operate_item_page_save(request()->all());
    }
    // 【页面】编辑
    public function operate_item_page_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_page_edit(request()->all());
        else if (request()->isMethod('post')) return $this->repo->operate_item_page_save(request()->all());
    }

    // 【页面】删除
    public function operate_item_page_delete()
    {
        return $this->repo->operate_item_page_delete(request()->all());
    }
    // 【页面】恢复
    public function operate_item_page_restore()
    {
        return $this->repo->operate_item_page_restore(request()->all());
    }
    // 【模块】永久删除
    public function operate_item_page_delete_permanently()
    {
        return $this->repo->operate_item_page_delete_permanently(request()->all());
    }

    // 【页面】启用
    public function operate_item_page_enable()
    {
        return $this->repo->operate_item_page_enable(request()->all());
    }
    // 【页面】禁用
    public function operate_item_page_disable()
    {
        return $this->repo->operate_item_page_disable(request()->all());
    }






    /*
     * ITEM 模块管理
     */
    // 【模块】返回-列表-视图
    public function view_item_module_list()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_module_list(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_item_module_list_datatable(request()->all());
    }

    // 【模块】添加
    public function operate_item_module_create()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_module_create();
        else if (request()->isMethod('post')) return $this->repo->operate_item_module_save(request()->all());
    }
    // 【模块】编辑
    public function operate_item_module_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_module_edit(request()->all());
        else if (request()->isMethod('post')) return $this->repo->operate_item_module_save(request()->all());
    }

    // 【模块】删除
    public function operate_item_module_delete()
    {
        return $this->repo->operate_item_module_delete(request()->all());
    }
    // 【模块】恢复
    public function operate_item_module_restore()
    {
        return $this->repo->operate_item_module_restore(request()->all());
    }
    // 【模块】永久删除
    public function operate_item_module_delete_permanently()
    {
        return $this->repo->operate_item_module_delete_permanently(request()->all());
    }


    // 【模块】启用
    public function operate_item_module_enable()
    {
        return $this->repo->operate_item_module_enable(request()->all());
    }
    // 【模块】禁用
    public function operate_item_module_disable()
    {
        return $this->repo->operate_item_module_disable(request()->all());
    }







    /*
     * 文章管理
     */
    // 【文章】返回-列表-视图
    public function view_item_article_list()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_article_list(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_item_article_list_datatable(request()->all());
    }

    // 【文章】添加
    public function operate_item_article_create()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_article_create();
        else if (request()->isMethod('post')) return $this->repo->operate_item_article_save(request()->all());
    }
    // 【文章】编辑
    public function operate_item_article_edit()
    {
        if(request()->isMethod('get')) return $this->repo->view_item_article_edit();
        else if (request()->isMethod('post')) return $this->repo->operate_item_article_save(request()->all());
    }

    // 【文章】获取-详情
    public function operate_item_article_get()
    {
        return $this->repo->operate_item_article_get(request()->all());
    }
    // 【文章】获取-详情
    public function operate_item_article_get_html()
    {
        return $this->repo->operate_item_article_get_html(request()->all());
    }
    // 【文章】获取-附件
    public function operate_item_article_get_attachment_html()
    {
        return $this->repo->operate_item_article_get_attachment_html(request()->all());
    }

    // 【文章】删除
    public function operate_item_article_delete()
    {
        return $this->repo->operate_item_article_delete(request()->all());
    }
    // 【文章】恢复
    public function operate_item_article_restore()
    {
        return $this->repo->operate_item_article_restore(request()->all());
    }
    // 【文章】永久删除
    public function operate_item_article_delete_permanently()
    {
        return $this->repo->operate_item_article_delete_permanently(request()->all());
    }

    // 【文章】启用
    public function operate_item_article_enable()
    {
        return $this->repo->operate_item_article_enable(request()->all());
    }
    // 【文章】禁用
    public function operate_item_article_disable()
    {
        return $this->repo->operate_item_article_disable(request()->all());
    }

    // 【文章】发布
    public function operate_item_article_publish()
    {
        return $this->repo->operate_item_article_publish(request()->all());
    }
    // 【文章】完成
    public function operate_item_article_complete()
    {
        return $this->repo->operate_item_article_complete(request()->all());
    }
    // 【文章】弃用
    public function operate_item_article_abandon()
    {
        return $this->repo->operate_item_article_abandon(request()->all());
    }
    // 【文章】复用
    public function operate_item_article_reuse()
    {
        return $this->repo->operate_item_article_reuse(request()->all());
    }
    // 【文章】验证
    public function operate_item_article_verify()
    {
        return $this->repo->operate_item_article_verify(request()->all());
    }
    // 【文章】审核
    public function operate_item_article_inspect()
    {
        return $this->repo->operate_item_article_inspect(request()->all());
    }







    /*
     * 留言管理
     */
    // 【留言】返回-列表-视图
    public function view_message_message_list()
    {
        if(request()->isMethod('get')) return $this->repo->view_message_message_list(request()->all());
        else if(request()->isMethod('post')) return $this->repo->get_message_message_list_datatable(request()->all());
    }

















}
