<?php

namespace App\Models\Base;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Notifications\Notifiable;

class BaseModel extends Model
{
    use Notifiable;
    use SoftDeletes;

    public static $commonColumn = [];
    public static $detailColumn = [];
    /**
     * 应该被调整为日期的属性
     *
     * @var array
     */
    protected $dates = ['deleted_at'];

}
