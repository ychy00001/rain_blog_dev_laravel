<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Comment extends BaseModel
{
    protected $table = 'comment';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'article_id', 'pid', 'content', 'name', 'email'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    public static $commonColumn = ['id', 'content', 'pid', 'article_id', 'name', 'email'];
    public static $detailColumn = ['id', 'content', 'pid', 'article_id', 'name', 'email', 'created_at'];
}
