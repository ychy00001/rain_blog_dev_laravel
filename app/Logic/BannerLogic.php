<?php
/**
 * Banner逻辑
 *
 * 首页Banner数据逻辑处理
 * @author  Rain
 * @version 1.0
 */

namespace App\Logic;


use App\Models\Banner;

class BannerLogic
{
    /**
     * 获取Banner列表
     *
     * @author Rain
     * @date   2018/7/31 下午6:14
     *
     * @return array
     */
    public static function getBannerList()
    {
        $allBanner = with(new Banner())->orderBy('sort', "desc")->get();
        if (!empty($allBanner)) {
            $allBanner = $allBanner->toArray();
        }
        return $allBanner;
    }

}