<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Psy\Util\Json;

class CategoryController extends Controller
{
    /**
     * Desc: 分页获取所有的分类
     * User: ycy
     * AddTime: 2018/3/19 上午11:50
     * @param $request
     */
    public function categoriesWithPaginate(Request $request){
        return Category::paginate(null, ['id', 'class_name as text' ,'order']);
    }

    /**
     * Desc: 获取所有的分类
     * User: ycy
     * AddTime: 2018/3/19 上午11:50
     * @param $request
     * @return array
     */
    public function categories(Request $request){
        $categories = Category::all();
        $result = [];
        foreach ($categories as $category){
            $result[] = [
                'id' => $category->id,
                'text' => $category->class_name,
            ];
        }
        return $result;
    }
}
