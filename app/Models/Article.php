<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Article extends BaseModel
{
    protected $table = 'article';

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
        return $this->hasOne('App\Models\Category','id');
    }

}
