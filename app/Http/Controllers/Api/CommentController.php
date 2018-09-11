<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Logic\CommentLogic;
use Illuminate\Support\Facades\Request;

class CommentController extends Controller
{
    /**
     * 添加文章评论
     *
     * @param Request $request
     * @return array
     *
     * @api {post} /api/comment/add 添加评论
     * @apiName CommentAdd
     * @apiGroup Comment
     *
     *
     * @apiSuccess {String} code 返回码
     * @apiSuccess {String} message   返回信息
     * @apiSuccess {Array}   data 返回数据
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *     {
     *       "code": 200,
     *       "message": "成功"
     *       "data":{
     *           "result":true,
     *        }
     *     }
     *
     */
    public function add(Request $request)
    {
        $result = CommentLogic::addComment($request::post());
        return api_success($result);
    }
}
