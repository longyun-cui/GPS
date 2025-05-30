<?php
namespace App\Models\ZY;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

use DB;

class ZY_Task extends Model
{
    use SoftDeletes;
    //
    protected $table = "zy_task";
    protected $fillable = [
        'active', 'status', 'item_active', 'item_status', 'item_result',
        'item_category', 'item_type', 'item_form', 'category', 'type', 'form', 'sort',
        'owner_active', 'is_show', 'is_published', 'is_completed',
        'owner_id', 'creator_id', 'user_id', 'belong_id', 'source_id', 'object_id', 'p_id', 'parent_id',
        'org_id', 'admin_id',
        'item_id', 'menu_id',
        'name', 'title', 'subtitle', 'description', 'content', 'remark', 'custom', 'custom2', 'custom3',
        'company', 'fund', 'mobile', 'city', 'address',
        'link_url', 'cover_pic', 'attachment_name', 'attachment_src', 'tag',
        'time_point', 'time_type', 'start_time', 'end_time',
        'visit_num', 'share_num', 'favor_num', 'comment_num',
        'published_at', 'completed_at'
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
        return $this->belongsTo('App\Models\ZY\ZY_User','owner_id','id');
    }
    // 创作者
    function creator()
    {
        return $this->belongsTo('App\Models\ZY\ZY_User','creator_id','id');
    }
    // 创作者
    function updater()
    {
        return $this->belongsTo('App\Models\ZY\ZY_User','updater_id','id');
    }
    // 创作者
    function completer()
    {
        return $this->belongsTo('App\Models\ZY\ZY_User','completer_id','id');
    }
    // 用户
    function user()
    {
        return $this->belongsTo('App\Models\ZY\ZY_User','user_id','id');
    }




    // 其他人的
    function pivot_item_relation()
    {
        return $this->hasMany('App\Models\ZY\ZY_Pivot_User_Item','item_id','id');
    }

    // 其他人的
    function others()
    {
        return $this->hasMany('App\Models\ZY\ZY_Pivot_User_Item','item_id','id');
    }

    // 收藏
    function collections()
    {
        return $this->hasMany('App\Models\ZY\ZY_Pivot_User_Collection','item_id','id');
    }

    // 转发内容
    function forward_item()
    {
        return $this->belongsTo('App\Models\ZY\ZY_Item','item_id','id');
    }




    // 与我相关的话题
    function pivot_collection_item_users()
    {
        return $this->belongsToMany('App\Models\ZY\ZY_User','pivot_user_item','item_id','user_id');
    }




    // 一对多 关联的目录
    function menu()
    {
        return $this->belongsTo('App\Models\ZY\ZY_Menu','menu_id','id');
    }

    // 多对多 关联的目录
    function menus()
    {
        return $this->belongsToMany('App\Models\ZY\ZY_Menu','pivot_menu_item','item_id','menu_id');
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




    /**
     * 自定义更新
     */
//    public function update_batch_in($setColumn,$setValue,$whereColumn,$whereValue)
//    {
//        $sql ="UPDATE ".$this->table." SET ".$setColumn." = ".$setValue." WHERE ".$whereColumn." = ".$whereValue;
//        return DB::update(DB::raw($sql);
//    }
    
    
}
