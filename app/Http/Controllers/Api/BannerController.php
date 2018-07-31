<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Logic\BannerLogic;
use App\Logic\MenuLogic;
use App\Models\Menu;
use Illuminate\Support\Facades\Request;

class BannerController extends Controller
{

    /**
     * @api {get} /banner/list 获取Banner列表
     * @apiName MenuList
     * @apiGroup Menu
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
     *               "name": 1,
     *               "url": 1,
     *               "sort": 1,
     *               "poster": 1,
     *               "intro": 1,
     *               "created_at": 1,
     *               "updated_at": 1,
     *               "deleted_at": 1,
     *           }
     *       ]
     *     }
     *
     */
    public function bannerList(Request $request){
        $list = BannerLogic::getBannerList();
        return api_success($list);
    }

}
