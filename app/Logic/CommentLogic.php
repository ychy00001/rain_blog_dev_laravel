<?php
/**
 * 评论逻辑
 *
 * 文章数据逻辑处理
 * @author  Rain
 * @version 1.0
 */

namespace App\Logic;


use App\Models\Comment;

class CommentLogic
{

    /**
     * 获取文章评论
     *
     * @author Rain
     * @date   2018/8/27 下午5:04
     *
     * @param array $commentInfo 评论信息
     * @return boolean
     */
    public static function addComment($commentInfo)
    {
        if (empty($commentInfo)) {
            return false;
        }
        $result = with(new Comment())->setRawAttributes($commentInfo)->save();
        return $result;
    }
}