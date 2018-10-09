<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Article extends BaseModel
{
    public static $pageLimit = 10;
    public static $latestLimit = 4;
    protected $table = 'article';
    public static $commonColumn = ["id","category_id","title","subtitle","order","comment_count","release_at","cover","user_id"];
    public static $detailColumn = ["id","category_id","title","subtitle","content","order","comment_count","created_at","updated_at","release_at","cover","user_id"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'category_id', 'title', 'content',
        'order', 'comment_count'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];


    /**
     * 获取一对一的分类
     */
    public function category()
    {
        return $this->hasOne('App\Models\Category','id','category_id');
    }

}
