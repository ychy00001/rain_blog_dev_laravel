<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Category;
use Illuminate\Support\Facades\Request;
use Psy\Util\Json;

class CategoryController extends Controller
{
    /**
     * 分页获取所有的分类
     *
     * @author Rain
     * @date   2018/4/14 上午11:26
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Pagination\LengthAwarePaginator
     */
    public function categoriesWithPaginate(Request $request){
        return with(Category::class)->paginate(null, ['id', 'class_name as text' ,'order']);
    }

    /**
     * 获取所有的分类
     *
     * @author Rain
     * @date   2018/4/14 上午11:27
     *
     * @param Request $request
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
