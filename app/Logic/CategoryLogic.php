<?php
/**
 * 分类逻辑
 *
 * 分类数据逻辑处理
 * @author  Rain
 * @version 1.0
 */

namespace App\Logic;


use App\Models\Article;
use App\Models\Category;

class CategoryLogic
{
    /**
     * 获取分类列表
     *
     * @author Rain
     * @date   2018/8/3 下午6:00
     *
     * @return array
     */
    public static function getCategoryList()
    {
        $categories = Category::all();
        if (empty($categories)) {
            $categories = $categories->toArray();
        }
        foreach ($categories as $key => $category) {
            $articleNumber = with(new Article())->select("id")->where(['category_id' => $category->id])->count();
            $categories[$key]['article_num'] = $articleNumber;
        }
        return $categories;
    }

    /**
     * 获取所有分类
     *
     * @author Rain
     * @date   2018/9/11 下午2:45
     *
     * @return array
     */
    public static function getAllCategory()
    {
        return Category::all("class_name");
    }

    /**
     * 查询一个分类
     *
     * @author Rain
     * @date   2018/9/11 下午2:51
     *
     * @param $categoryId
     * @param $column
     * @return mixed|static
     */
    public static function findOneCategory($categoryId, $column = "*")
    {
        $category = with(new Category())->find($categoryId, $column);
        if ($category) {
            $category = $category->toArray();
        }
        return $category;
    }

}