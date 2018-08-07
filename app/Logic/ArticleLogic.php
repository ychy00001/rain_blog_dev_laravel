<?php
/**
 * 文章逻辑
 *
 * 文章数据逻辑处理
 * @author  Rain
 * @version 1.0
 */

namespace App\Logic;


use App\Models\Article;
use YuanChao\Editor\EndaEditor;

class ArticleLogic
{
    /**
     * 获取文章推荐数据
     *
     * @author Rain
     * @date   2018/8/1 下午4:51
     *
     * @return array
     */
    public static function getArticleRecommendList()
    {
        $allArticle = with(new Article())->with("category")->orderBy('order', "desc")->orderBy('release_at', "desc")->limit(4)->get();
        if (!empty($allArticle)) {
            $allArticle = $allArticle->toArray();
            foreach ($allArticle as $key => $value){
                $summary = substr($value['content'],0,strpos($value['content'],"<!--more-->"));
                $allArticle[$key]['content'] = EndaEditor::MarkDecode($summary);
            }
        }
        return $allArticle;
    }

    /**
     * 获取文章最近数据
     *
     * @author Rain
     * @date   2018/8/3 下午4:35
     *
     * @return array
     */
    public static function getArticleLatestList()
    {
        $allArticle = with(new Article())->select(Article::$commonColumn)->with("category")->orderBy('release_at', "desc")->limit(4)->get();
        if (!empty($allArticle)) {
            $allArticle = $allArticle->toArray();
        }
        return $allArticle;
    }

    /**
     * 获取文章分页列表数据
     *
     * @author Rain
     * @date   2018/8/1 下午4:51
     *
     * @return array
     */
    public static function getArticleList()
    {
        $allArticle = with(new Article())->select(Article::$commonColumn)->with("category")->orderBy('order', "desc")->orderBy('release_at', "desc")->limit(4)->paginate(10);
        if (!empty($allArticle)) {
            $allArticle = $allArticle->toArray();
        }
        return $allArticle;
    }

    /**
     * 获取文章详情
     *
     * @author Rain
     * @date   2018/8/7 下午6:54
     *
     * @param $id
     * @return array
     */
    public static function getArticleDetail($id){
        if(empty($id)){
            return [];
        }
        $article = with(new Article())->select(Article::$detailColumn)->with('category')->where('id','=',$id)->first();
        if(!empty($article)){
            return $article->toArray();
        }
        return [];
    }
}