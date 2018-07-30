<?php
/**
 * 菜单逻辑
 *
 * 菜单页面逻辑处理
 * @author  Rain
 * @version 1.0
 */

namespace App\Logic;


use App\Models\Menu;

class MenuLogic
{
    /**
     * 获取菜单列表
     *
     * @author Rain
     * @date   2018/7/30 下午2:45
     *
     * @return array
     */
    public static function getMenuList()
    {
        $allMenu = with(new Menu())->orderBy('sort', "desc")->get();
        if (!empty($allMenu)) {
            $allMenu = $allMenu->toArray();
        }
        return self::menuTreeFormat($allMenu);
    }


    /**
     * 递归格式化菜单
     *
     * @author Rain
     * @date   2018/7/30 下午3:36
     *
     * @param $menus
     * @param $pid
     * @return array
     */
    public static function menuTreeFormat($menus, $pid = 0)
    {
        $newMenu = [];
        foreach ($menus as $key => $value){
            if($value['pid'] == $pid){
                $value["child_menu"] = self::menuTreeFormat($menus,$value['id']);
                $newMenu[] = $value;
            }
        }
        return $newMenu;
    }
}