<?php
namespace App\Models\GH;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\SoftDeletes;

class GH_Admin extends Authenticatable
{
    use Notifiable;
    use SoftDeletes;

//    protected $connection = 'mysql0';
//    protected $connection = 'mysql_def';

    protected $table = "gh_admin";

    protected $fillable = [
        'active', 'status', 'user_active', 'user_status', 'user_category', 'user_group', 'user_type', 'category', 'group', 'type',
        'creator_id', 'parent_id', 'p_id',
        'name', 'username', 'nickname', 'true_name', 'description', 'portrait_img', 'tag',
        'mobile', 'telephone', 'email', 'password',
        'wx_unionid',
        'district_category', 'district_type', 'district_id',
        'introduction_id', 'advertising_id',
        'QQ_number',
        'wx_id', 'wx_qr_code_img',
        'wb_name', 'wb_address',
        'website',
        'address',
        'contact_phone', 'contact_email', 'contact_wx_id', 'contact_wx_qr_code_img', 'contact_address',
        'linkman', 'linkman_name', 'linkman_phone', 'linkman_wx_id', 'linkman_wx_qr_code_img',
        'company', 'department', 'position', 'business_description',
        'visit_num', 'share_num', 'favor_num',  'follow_num', 'fans_num',

    ];

    protected $datas = ['deleted_at'];

    protected $hidden = [
        'password', 'remember_token',
    ];

    protected $dateFormat = 'U';



    // 所属代理商
    function ext()
    {
        return $this->hasOne('App\Models\GH\GH_AdminExt','user_id','id');
    }


    // 拥有者
    function owner()
    {
        return $this->belongsTo('App\Models\GH\GH_Admin','owner_id','id');
    }
    // 创作者
    function creator()
    {
        return $this->belongsTo('App\Models\GH\GH_Admin','creator_id','id');
    }
    // 用户
    function user()
    {
        return $this->belongsTo('App\Models\GH\GH_Admin','user_id','id');
    }




    // 所属代理商
    function parent()
    {
        return $this->belongsTo('App\Models\GH\GH_Admin','parent_id','id');
    }

    // 名下代理商
    function children()
    {
        return $this->hasMany('App\Models\GH\GH_Admin','parent_id','id');
    }

    // 成员
    function members()
    {
        return $this->hasMany('App\Models\GH\GH_Admin','parent_id','id');
    }

    // 粉丝
    function fans()
    {
        return $this->hasMany('App\Models\GH\GH_Admin','parent_id','id');
    }

    // 名下客户
    function clients()
    {
        return $this->hasMany('App\Models\GH\GH_Admin','parent_id','id');
    }

    // 与我相关的内容
    function fans_list()
    {
        return $this->hasMany('App\Models\GH\GH_Pivot_User_Relation','relation_user_id','id');
    }




    // 内容
    function items()
    {
        return $this->hasMany('App\Models\GH\GH_Item','owner_id','id');
    }
    // 内容
    function ad_list()
    {
        return $this->hasMany('App\Models\GH\GH_Item','owner_id','id');
    }

    // 广告
    function ad()
    {
        return $this->hasOne('App\Models\GH\GH_Item','id','advertising_id');
    }

    // 介绍
    function introduction()
    {
        return $this->hasOne('App\Models\GH\GH_Item','id','introduction_id');
    }

    // 与我相关的内容
    function pivot_item()
    {
        return $this->belongsToMany('App\Models\GH\GH_Item','pivot_user_item','user_id','item_id')
            ->withPivot(['active','relation_active','type','relation_type'])->withTimestamps();
    }




    //
    function pivot_user()
    {
        return $this->belongsToMany('App\Models\GH\GH_Admin','pivot_user_user','user_1_id','user_2_id')
            ->withPivot(['active','relation_active','type','relation_type'])->withTimestamps();
    }

    // 与我相关的内容
    function pivot_relation()
    {
        return $this->belongsToMany('App\Models\GH\GH_Admin','pivot_user_relation','mine_user_id','relation_user_id')
            ->withPivot(['active','relation_active','type','relation_type'])->withTimestamps();
    }

    // 与我相关的内容
    function pivot_sponsor_list()
    {
        return $this->belongsToMany('App\Models\GH\GH_Admin','pivot_user_relation','mine_user_id','relation_user_id')
            ->withPivot(['active','relation_active','type','relation_type'])->withTimestamps();
    }

    // 与我相关的内容
    function pivot_org_list()
    {
        return $this->belongsToMany('App\Models\GH\GH_Admin','pivot_user_relation','relation_user_id','mine_user_id')
            ->withPivot(['active','relation_active','type','relation_type'])->withTimestamps();
    }

    // 与我相关的内容
    function pivot_follow_list()
    {
        return $this->belongsToMany('App\Models\GH\GH_Admin','pivot_user_relation','relation_user_id','mine_user_id')
            ->withPivot(['active','relation_active','type','relation_type'])->withTimestamps();
    }




    // 关联资金
    function fund()
    {
        return $this->hasOne('App\Models\MT\Fund','user_id','id');
    }




    // 名下站点
    function sites()
    {
        return $this->hasMany('App\Models\MT\SEOSite','create_user_id','id');
    }

    // 名下关键词
    function keywords()
    {
        return $this->hasMany('App\Models\MT\SEOKeyword','create_user_id','id');
    }

    function children_keywords()
    {
        return $this->hasManyThrough(
            'App\Models\MT\SEOKeyword',
            'App\Models\MT\User',
            'pid', // 用户表外键...
            'createuserid', // 文章表外键...
            'id', // 国家表本地键...
            'id' // 用户表本地键...
        );
    }


}
