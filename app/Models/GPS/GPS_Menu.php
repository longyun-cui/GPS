<?php
namespace App\Models\GPS;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class GPS_Menu extends Model
{
    use SoftDeletes;
    //
    protected $table = "gps_menu";
    protected $fillable = [
        'active', 'status', 'category', 'type', 'sort', 'menu_active', 'menu_status', 'menu_category', 'menu_type',
        'owner_active',
        'owner_id', 'creator_id', 'user_id', 'admin_id', 'belong_id', 'source_id', 'object_id', 'p_id', 'parent_id',
        'menu_id', 'item_id',
        'name', 'title', 'subtitle', 'description', 'content', 'remark', 'tag', 'custom', 'custom2', 'custom3',
        'link_url', 'cover_pic', 'attachment_name', 'attachment_src',
        'time_type', 'time_point', 'start_time', 'end_time',
        'visit_num', 'share_num', 'favor_num', 'comment_num',
        'published_at'
    ];
    protected $dateFormat = 'U';

    protected $dates = ['created_at','updated_at','deleted_at'];
//    public function getDates()
//    {
////        return array(); // 原形返回；
//        return array('created_at','updated_at');
//    }


    // 拥有者
    function owner()
    {
        return $this->belongsTo('App\Models\GPS\GPS_User','owner_id','id');
    }
    // 创作者
    function creator()
    {
        return $this->belongsTo('App\Models\GPS\GPS_User','creator_id','id');
    }
    // 创作者
    function updater()
    {
        return $this->belongsTo('App\Models\GPS\GPS_User','updater_id','id');
    }
    // 创作者
    function completer()
    {
        return $this->belongsTo('App\Models\GPS\GPS_User','completer_id','id');
    }
    // 用户
    function user()
    {
        return $this->belongsTo('App\Models\GPS\GPS_User','user_id','id');
    }


    // 其他人的
    function todo_list()
    {
        return $this->hasMany('App\Models\GPS\GPS_Item','menu_id','id');
    }




    // 其他人的
    function pivot_item_relation()
    {
        return $this->hasMany('App\Models\GPS\GPS_Pivot_User_Item','item_id','id');
    }

    // 其他人的
    function others()
    {
        return $this->hasMany('App\Models\GPS\GPS_Pivot_User_Item','item_id','id');
    }

    // 收藏
    function collections()
    {
        return $this->hasMany('App\Models\GPS\GPS_Pivot_User_Collection','item_id','id');
    }

    // 转发内容
    function forward_item()
    {
        return $this->belongsTo('App\Models\GPS\GPS_Item','item_id','id');
    }




    // 与我相关的话题
    function pivot_collection_item_users()
    {
        return $this->belongsToMany('App\Models\GPS\GPS_User','pivot_user_item','item_id','user_id');
    }




    // 一对多 关联的目录
    function menu()
    {
        return $this->belongsTo('App\Models\GPS\GPS_Menu','menu_id','id');
    }

    // 多对多 关联的目录
    function menus()
    {
        return $this->belongsToMany('App\Models\GPS\GPS_Menu','pivot_menu_item','item_id','menu_id');
    }


    /**
     * 获得此文章的所有评论。
     */
    public function comments()
    {
        return $this->morphMany('App\Models\Comment', 'itemable');
    }

    /**
     * 获得此文章的所有标签。
     */
    public function tags()
    {
        return $this->morphToMany('App\Models\Tag', 'taggable');
    }
}
