<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Request;
use YuanChao\Editor\EndaEditor;

/**
 * 文件上传控制器
 *
 * 类的详细介绍
 * @author  Rain
 * @version 1.0
 *
 * @package App\Http\Controllers\Api
 */
class UploadController extends Controller
{
    /**
     * 上传图片
     *
     * @author Rain
     * @date   2018/4/14 上午11:28
     *
     * @param Request $request
     * @return string
     */
    public function uploadImg(Request $request){
        // endaEdit 为你 public 下的目录 update 2015-05-19
        $data = EndaEditor::uploadImgFile('endaEdit');
        return json_encode($data);
    }

}
