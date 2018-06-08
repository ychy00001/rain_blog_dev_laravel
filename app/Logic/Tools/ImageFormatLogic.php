<?php

namespace App\Logic\Tools;

use App\Support\FileTools;
use App\Support\ImageTools;
use Ramsey\Uuid\Uuid;
use Symfony\Component\HttpFoundation\File\Exception\FileNotFoundException;

/**
 * 图片格式化处理逻辑类
 *
 * 文件功能
 * @author  Rain
 * @version 1.0
 */
class ImageFormatLogic
{
    private $imgPath;  //格式化的图片路径 目前只处理资源目录下的
    private $pointR;  //关键点R色值
    private $pointG;  //关键点G色值
    private $pointB;  //关键点B色值
    private $floatValue;  //浮动值

    private $minR;  //最小R
    private $maxR;  //最大R
    private $minG;  //最小G
    private $maxG;  //最大G
    private $minB;  //最小B
    private $maxB;  //最大B

    private $tempOutput; //临时输出目录
    private $calculateArr; //计算结果

    /**
     * 构造函数
     *
     * @param $imgPath
     * @param int $pointR 曲线关键点RGB色值R
     * @param int $pointG 曲线关键点RGB色值R
     * @param int $pointB 曲线关键点RGB色值R
     * @param int $floatValue 色差浮动值 用于模糊图片
     */
    public function __construct($imgPath, $pointR, $pointG, $pointB, $floatValue = 100)
    {
        $this->imgPath = $imgPath;
        $this->pointR = $pointR;
        $this->pointG = $pointG;
        $this->pointB = $pointB;
        $this->floatValue = $floatValue;

        //计算最大最小值
        $this->minR = $this->pointR - $this->floatValue;
        $this->maxR = $this->pointR + $this->floatValue;
        $this->minG = $this->pointG - $this->floatValue;
        $this->maxG = $this->pointG + $this->floatValue;
        $this->minB = $this->pointB - $this->floatValue;
        $this->maxB = $this->pointB + $this->floatValue;

        //创建临时目录
        if (!is_writable(storage_path('/temp'))) {
            mkdir(storage_path('/temp'), 0777, true);
        }
        //生成临时文件
        $this->tempOutput = storage_path('/temp') . '/' . str_replace('-', '', Uuid::uuid1()->toString()) . '.txt';
    }

    /**
     * 计算图片点
     *
     * @author Rain
     * @date   2018/5/12 下午1:46
     *
     * @param float $xMaxValue x轴 最大数值
     * @param float $yMaxValue y轴 最大数字
     * @param float $offsetX x轴偏移
     * @param float $offsetY y轴偏移
     *
     * @return $this
     */
    public function calculate($xMaxValue = null, $yMaxValue = null ,$offsetX = 0.0 ,$offsetY = 0.0)
    {
        //读取图片至画布
        $originImg = ImageTools::imagecreatefromtype($this->imgPath);

        //获取图片宽高
        $imgW = imagesx($originImg);
        $imgH = imagesy($originImg);

        /**
         * 存放临时待选点值 格式如下： key 表示x的值  value 存储y的值
         * [
         * 0 => [7,8,9,10],
         * 1 => [7,8,22,9,10]
         * ]
         */
        $tmpPointArr = [];
        //扫描每一列像素 对比关键点
        for ($x = 0; $x < $imgW; $x++) { //遍历行
            //TODO 供调试使用 别删
//            if ($x == 6) {
//                break;
//            }
            for ($y = 0; $y < $imgH; $y++) { //循环列 输出一列数据
                $rgb = imagecolorat($originImg, $x, $y);
                $r = ($rgb >> 16) & 0xFF;
                $g = ($rgb >> 8) & 0xFF;
                $b = $rgb & 0xFF;
                //判断该点是否可能符合关键点颜色范围
                if ($this->checkRGB($r, $g, $b)) {
                    //添加待选点
                    $tmpPointArr[$x][] = $y;
                }
            }
        }

        /**
         * 选择待选点中间的值存放成最终结果的 x => y 格式的值
         * 注意：Y轴坐标图片上是左上角 现在转换为最下角为原点
         */
        $resultArr = [];
        foreach ($tmpPointArr as $x => $item) {
            $y_key = floor(count($item) / 2); //取中间数
            $y = $item[$y_key];
            //重构y轴坐标 翻转y的正轴
            $y = $imgH - $y;
            $pixY = $y;
            $pixX = $x;
            //如果设置了实际x y 根据实际数值计算
            if (!empty($xMaxValue) && !empty($yMaxValue)) {
                $pixXRatio = bcdiv($xMaxValue, $imgW, 8); //每一像素的x比例 保留4位小数
                //TODO 特殊y轴不做处理
//                $pixYRatio = bcdiv($yMaxValue, $imgH, 8); //每一像素的y比例 保留4位小数
                $x = bcmul($x, $pixXRatio, 4);
                //TODO 特殊y轴不做处理
//                $y = bcmul($y, $pixYRatio, 4);
            }

            //TODO 对当前特殊图片y轴重新计算
            $pixYRatio = 1;
            $typeBlock = 0;
            //第一块重构  202高度   总高度 1060
            if($y <= 202){
                $typeBlock = 1;
                $pixYRatio = bcdiv(0.01, 202, 8); //每一像素的y比例 保留4位小数
                $y = bcmul($y, $pixYRatio, 4);
            }else if($y > 202 && $y < 446){//计算第二块数据 //一块244
                $y = $y -202;
                $typeBlock = 2;
                $pixYRatio = bcdiv(0.1, 244, 8); //每一像素的y比例 保留4位小数
                $y = bcmul($y, $pixYRatio, 4);
                $y = bcadd($y, 0.01, 4);
            }else if($y >= 446 && $y < 690){
                $y = $y - 446;
                $typeBlock = 3;
                $pixYRatio = bcdiv(1, 244, 8); //每一像素的y比例 保留4位小数
                $y = bcmul($y, $pixYRatio, 4);
                $y = bcadd($y, 0.1, 4);
            }else if($y >= 690 && $y < 934){
                $y = $y - 690;
                $typeBlock = 4;
                $pixYRatio = bcdiv(10, 244, 8); //每一像素的y比例 保留4位小数
                $y = bcmul($y, $pixYRatio, 4);
                $y = bcadd($y, 1, 4);
            }else if($y >= 934){
                $y = $y - 934;
                $typeBlock = 5;
                //最后只剩126的高度
                $topRatio = bcdiv(126, 244, 8); //每一像素的y比例 保留4位小数
                $maxValue = bcmul($topRatio,100,8);
                $pixYRatio = bcdiv($maxValue, 244, 8); //每一像素的y比例 保留4位小数
                $y = bcmul($y, $pixYRatio, 4);
                $y = bcadd($y, 10, 4);
            }
            $tmpY = $y;
            //计算直线图距离
            $y = log10($y);
            $y = $y/10;
            $y = pow(10,$y);
            if($y > 20){
                echo 'tmpX:'.$x . " tmpY:" .$tmpY ." pixX:" .$pixX." : pixY:" .$pixY;
                echo "<br>";
                echo ' YRatio:'.$pixYRatio .' block:'.$typeBlock;
                echo "<br>";
                echo ' Y:'.$y;
                exit(1);
            }

            //如果设置了偏移量，需要偏移x y
            if(!empty($offsetX)){
                $x = bcadd($x,$offsetX,8);
            }
            if(!empty($offsetY)){
                $y = bcadd($y,$offsetY,8);
            }
            $resultArr[$x] = $y;
        }
        $this->calculateArr = $resultArr;
        return $this;
    }

    /**
     * 已文件形式输出下载txt
     *
     * @author Rain
     * @date  2018/5/12 下午3:01
     *
     */
    public function downloadAsText()
    {
        if ($this->saveAsText()) {
            FileTools::fileHttpDownload($this->tempOutput, "图片曲线点坐标");
        }
    }

    /**
     * 保存文件至TXT
     *
     * @author Rain
     * @date   2018/5/12 下午2:53
     *
     */
    private function saveAsText()
    {
        if (empty($this->calculateArr)) {
            throw new \Exception("结果数据不存在，可能未调用calculate()方法！");
        }
        if (empty($this->tempOutput)) {
            throw new FileNotFoundException($this->tempOutput);
        }
        foreach ($this->calculateArr as $x => $y) {
            file_put_contents($this->tempOutput, "$x,$y\r\n", FILE_APPEND);
        }
        return true;
    }

    /**
     * 检测RGB颜色是否和当前关键点颜色一致
     *
     * @author Rain
     * @date   2018/5/12 下午2:13
     *
     * @param $r
     * @param $g
     * @param $b
     *
     * @return boolean
     */
    private function checkRGB($r, $g, $b)
    {
//        238,32,40
//        239,83,89
//        206,95,100
        if ($r >= $this->minR && $r <= $this->maxR &&
            $g >= $this->minG && $g <= $this->maxG &&
            $b >= $this->minB && $b <= $this->maxB) {
            return true;
        }
        return false;
    }
}