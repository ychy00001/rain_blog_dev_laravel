<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Logic\Tools\ImageFormatLogic;
use Illuminate\Support\Facades\Request;

/**
 * 工具控制器
 *
 * 类的详细介绍
 * @author  Rain
 * @version 1.0
 *
 * @package App\Http\Controllers\Api
 */
class ToolsController extends Controller
{
    /**
     * 转换图片上得曲线变成点
     *
     * @author Rain
     * @date   2018/5/12 下午1:17
     *
     * @param Request $request
     * @return void
     */
    public function formatImgCurveForPoint(Request $request){
        //加载图片
        $imgPath = resource_path('images/xintuhahaha.png');
        $logic = new ImageFormatLogic($imgPath,255,0,0);
        //计算点并保存txt文件下载
        $logic->calculate(1.249,20,0.5)->downloadAsText();
    }

}
