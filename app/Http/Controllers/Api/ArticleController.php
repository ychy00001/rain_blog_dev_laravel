<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Logic\ArticleLogic;
use Illuminate\Support\Facades\Request;

class ArticleController extends Controller
{
    /**
     * @api {get} /article/recommend-list 获取文章列表
     * @apiName ArticleList
     * @apiGroup Article
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
     *       "data": [
     *           {
     *               "id": 1,
     *               "category": {
     *                  "class_name": "CSS"
     *               },
     *               "user_id": 1,
     *               "title": "我是一条鱼",
     *               "subtitle": "我是一只鱼",
     *               "cover": "http://image.png",
     *               "content": "我是内容",
     *               "order": 1,
     *               "comment_count": 1,
     *               "created_at": 1123123,
     *               "updated_at": 4124124,
     *               "deleted_at": 123213,
     *               "release_at": 124214,
     *           }
     *       ]
     *     }
     *
     */
    public function articleRecommendList(Request $request)
    {
        $list = ArticleLogic::getArticleRecommendList();
        return api_success($list);
    }

    /**
     * @api {get} /article/list 获取文章列表
     * @apiName ArticleList
     * @apiGroup Article
     *
     *
     * @apiSuccess {String} code 返回码
     * @apiSuccess {String} message   返回信息
     * @apiSuccess {Array}   data 返回数据
     *
     * @apiSuccessExample Success-Response:
     *     HTTP/1.1 200 OK
     *    {
     *        "code": 200,
     *        "message": "成功!",
     *        "data": {
     *            "current_page": 1,
     *            "data": [
     *            {
     *               "id": 1,
     *               "category_id": 1,
     *               "title": "凤飞飞ADS",
     *               "subtitle": null,
     *               "order": 1,
     *               "comment_count": 0,
     *               "release_at": "2018-04-17 00:25:35",
     *               "cover": null,
     *               "user_id": 0,
     *               "category": {
     *                   "id": 1,
     *                   "class_name": "JS",
     *                   "order": "1",
     *                   "created_at": "2018-06-08 11:53:52",
     *                   "updated_at": "2018-06-08 03:07:42",
     *                   "deleted_at": null
     *               }
     *            },
     *        ],
     *       "first_page_url": "http://local.ychy666.com/api/article/list?page=1",
     *       "from": 1,
     *       "last_page": 1,
     *       "last_page_url": "http://local.ychy666.com/api/article/list?page=1",
     *       "next_page_url": null,
     *       "path": "http://local.ychy666.com/api/article/list",
     *       "per_page": 15,
     *       "prev_page_url": null,
     *       "to": 3,
     *       "total": 3
     *   }
     *}
     *
     */
    public function articleList(Request $request)
    {
        $list = ArticleLogic::getArticleList();
        return api_success($list);
    }

    /**
     * @api {get} /article/latest 获取文章列表
     * @apiName ArticleLatestList
     * @apiGroup Article
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
     *       "data": [
     *           {
     *               "id": 1,
     *               "category": {
     *                  "class_name": "CSS"
     *               },
     *               "user_id": 1,
     *               "title": "我是一条鱼",
     *               "subtitle": "我是一只鱼",
     *               "cover": "http://image.png",
     *               "content": "我是内容",
     *               "order": 1,
     *               "comment_count": 1,
     *               "created_at": 1123123,
     *               "updated_at": 4124124,
     *               "deleted_at": 123213,
     *               "release_at": 124214,
     *           }
     *       ]
     *     }
     *
     */
    public function articleLatestList(Request $request)
    {
        $list = ArticleLogic::getArticleLatestList();
        return api_success($list);
    }

    /**
     * 文章详情
     *
     * @param Request $request
     * @return array
     *
     * @api {get} /article/latest 获取文章列表
     * @apiName ArticleLatestList
     * @apiGroup Article
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
     *           "id": 1,
     *           "category": {
     *               "class_name": "CSS"
     *            },
     *           "user_id": 1,
     *           "title": "我是一条鱼",
     *           "subtitle": "我是一只鱼",
     *           "cover": "http://image.png",
     *           "content": "我是内容",
     *           "order": 1,
     *           "comment_count": 1,
     *           "created_at": 1123123,
     *           "updated_at": 4124124,
     *           "deleted_at": 123213,
     *           "release_at": 124214,
     *        }
     *     }
     *
     */
    public function articleDetail(Request $request)
    {
        $detail = ArticleLogic::getArticleDetail($request::get("id"));
        return api_success($detail);
    }
}
