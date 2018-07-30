<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Logic\MenuLogic;
use App\Models\Menu;
use Illuminate\Support\Facades\Request;

class MenuController extends Controller
{

    /**
     * @api {get} /menu/list 获取菜单列表
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
     *               "pid": 1,
     *               "created_at": 1,
     *               "updated_at": 1,
     *               "deleted_at": 1,
     *               "child_menu": [
     *                    "id": 1,
     *                    "name": 1,
     *                    "url": 1,
     *                    "sort": 1,
     *                    "pid": 1,
     *               ],
     *           }
     *       ]
     *     }
     *
     */
    public function menuList(Request $request){
        $list = MenuLogic::getMenuList();
        return api_success($list);
    }

}
