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
use App\Models\Category;
use App\Models\Comment;
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
            foreach ($allArticle as $key => $value) {
                $summary = substr($value['content'], 0, strpos($value['content'], "<!--more-->"));
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
     * @param string $categoryId 分类编号
     *
     * @return array
     */
    public static function getArticleList($categoryId = "")
    {
        if (empty($categoryId)) {
            $category = [];
        } else {
            $category = CategoryLogic::findOneCategory($categoryId,['id','class_name']);
        }

        $query = with(new Article())->select(Article::$commonColumn)
            ->with("category");
        if(!empty($category)){
            $query = $query->where("category_id", '=', $category['id']);
        }
        $allArticle = $query->orderBy('order', "desc")->orderBy('release_at', "desc")->limit(4)->paginate(10);
        if (!empty($allArticle)) {
            $allArticle = $allArticle->toArray();
        }

        if(!empty($category)){
            $allArticle['category_name'] = $category['class_name'];
        }else{
            $allArticle['category_name'] = "";
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
    public static function getArticleDetail($id)
    {
        if (empty($id)) {
            return [];
        }
        $article = with(new Article())->select(Article::$detailColumn)->with('category')->where('id', '=', $id)->first();
        if (!empty($article)) {
            $article->content = EndaEditor::MarkDecode($article->content);
            return $article->toArray();
        }
        return [];
    }

    /**
     * 获取文章评论
     *
     * @author Rain
     * @date   2018/8/27 下午5:04
     *
     * @param $id
     * @return array
     */
    public static function getArticleComment($id)
    {
        if (empty($id)) {
            return [];
        }
        $comment = with(new Comment())->select(Comment::$detailColumn)->where('article_id', '=', $id)->get();
        return self::getCommentTree($comment, 0, 0);
    }

    /**
     * 获取评论树
     *
     * @author Rain
     * @date   2018/8/27 下午5:24
     *
     * @param $commentArr
     * @param $pid
     * @param $level
     * @return array
     */
    public static function getCommentTree($commentArr, $pid, $level)
    {
        $returnArr = [];
        foreach ($commentArr as $item) {
            if (isset($item['pid']) && $item['pid'] == $pid) {
                $item['level'] = $level;
                $item['child'] = self::getCommentTree($commentArr, $item['id'], ++$level);
                $returnArr[] = $item;
            }
        }
        return $returnArr;
    }

    /**
     * 获取文章评论
     *
     * @author Rain
     * @date   2018/8/27 下午5:04
     *
     * @param array $commentInfo 评论信息
     * @return boolean
     */
    public static function addArticleComment($commentInfo)
    {
        if (empty($commentInfo)) {
            return false;
        }
        $result = with(new Comment())->setRawAttributes($commentInfo)->save();
        return $result;
    }
}