<?php

namespace App\Models;

use App\Models\Base\BaseModel;

class Banner extends BaseModel
{
    protected $table = 'banner';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'url', 'sort'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];
}
