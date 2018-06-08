<?php

namespace App\Support;

/**
 * 图片工具类
 *
 * 文件功能
 * @author  Rain
 * @version 1.0
 */
class ImageTools
{

    /**
     * 根据图片获取图片的资源
     *
     * @author Rain
     * @date   2018/5/11 下午2:54
     *
     * @param $imgPath
     * @return resource
     */
    public static function imagecreatefromtype($imgPath)
    {
        //1=>"gif" 2=>"jpeg" 3=>"png"
        $imagePortraitType = getimagesize($imgPath)[2];
        switch ($imagePortraitType) {
            case 1:
                $imgRes = imagecreatefromgif($imgPath);
                break;
            case 2:
                $imgRes = imagecreatefromjpeg($imgPath);
                break;
            case 3:
                $imgRes = imagecreatefrompng($imgPath);
                break;
            default:
                $imgRes = imagecreatefrompng($imgPath);
                break;
        }
        return $imgRes;
    }

    /**
     * 获取文字高度
     *
     * @author Rain
     * @date   2018/5/11 下午3:56
     *
     * @param $text
     * @param $textSize
     * @param $fontPath
     * @return mixed
     */
    public static function getTextHeight($text, $textSize, $fontPath)
    {
        $textBox = imagettfbbox($textSize, 0, $fontPath, $text);
        $textMinY = min(array($textBox[1], $textBox[3], $textBox[5], $textBox[7]));
        $textMaxY = max(array($textBox[1], $textBox[3], $textBox[5], $textBox[7]));
        return ($textMaxY - $textMinY); //文字高
    }

    /**
     * 获取文字宽度
     *
     * @author Rain
     * @date   2018/5/11 下午3:56
     *
     * @param $text
     * @param $textSize
     * @param $fontPath
     * @return mixed
     */
    public static function getTextWidth($text, $textSize, $fontPath)
    {
        $textBox = imagettfbbox($textSize, 0, $fontPath, $text);
        $textMinX = min(array($textBox[0], $textBox[2], $textBox[4], $textBox[6]));
        $textMaxX = max(array($textBox[0], $textBox[2], $textBox[4], $textBox[6]));
        return ($textMaxX - $textMinX); //文字高
    }
}