<?php
/**
 * 文件工具类
 *
 * 文件功能
 * @author  Rain
 * @version 1.0
 */

namespace App\Support;


class FileTools
{
    /**
     * 网页文件下载
     *
     * @author Rain
     * @date   2018/5/12 下午3:06
     *
     * @param $file_url
     * @param string $new_name
     */
    public static function fileHttpDownload($file_url, $new_name = '')
    {
        if (!isset($file_url) || trim($file_url) == '') {
            echo '500';
        }
        if (!file_exists($file_url)) { //检查文件是否存在
            echo '404';
        }
        $file_name = static::get_basename($file_url);
        $file_type = pathinfo($file_url, PATHINFO_EXTENSION);
        $file_name = trim($new_name == '') ? $file_name : urlencode($new_name).'.'.$file_type;
        $file = fopen($file_url, 'r'); //打开文件
        //输入文件标签
        header("Content-type: application/octet-stream");
        header("Accept-Ranges: bytes");
        header("Accept-Length: " . filesize($file_url));
        header("Content-Disposition: attachment; filename=" . $file_name);
        //输出文件内容
        echo fread($file, filesize($file_url));
        fclose($file);
    }

    /**
     * Desc: 获取文件名称
     * User: ycy
     * AddTime: 2018/1/31 下午6:01
     * @param $filename
     * @return mixed
     */
    public static function get_basename($filename)
    {
        return preg_replace('/^.+[\\\\\\/]/', '', $filename);
    }
}