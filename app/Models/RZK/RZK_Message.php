<?php
namespace App\Models\RZK;
use Illuminate\Database\Eloquent\Model;

class RZK_Message extends Model
{
    //
    protected $table = "rzk_message";
    protected $fillable = [
        'active', 'status', 'category', 'type', 'form', 'sort',
        'message_active', 'message_status', 'message_category', 'message_type', 'message_form',
        'admin_id', 'menu_id', 'item_id',
        'name', 'mobile', 'email', 'address',
        'title', 'subtitle', 'description', 'content', 'custom', 'link_url', 'cover_pic',
        'ip', 'ip_address',
        'visit_num', 'share_num'
    ];
    protected $dateFormat = 'U';

//    protected $dates = ['created_at','updated_at'];
//    public function getDates()
//    {
//        return array(); // 原形返回；
//        return array('created_at','updated_at');
//    }


    function admin()
    {
        return $this->belongsTo('App\Models\RZK\RZK_Admin','admin_id','id');
    }

    // 一对多 反向关联的内容（所属内容）
    function item()
    {
        return $this->belongsTo('App\Models\RZK\RZK_Item','item_id','id');
    }




    // 一对多 反向关联的目录（所属目录）
    function menu()
    {
        return $this->belongsTo('App\Models\RZK\RZK_Menu','menu_id','id');
    }

    // 多对多 关联的目录
    function pivot_menus()
    {
        return $this->belongsToMany('App\Models\RZK\RZK_Menu','rzk_pivot_menu_item','item_id','menu_id');
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
