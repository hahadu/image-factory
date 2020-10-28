<?php
/**
 *  +----------------------------------------------------------------------
 *  | Created by  hahadu (a low phper and coolephp)
 *  +----------------------------------------------------------------------
 *  | Copyright (c) 2020. [hahadu] All rights reserved.
 *  +----------------------------------------------------------------------
 *  | SiteUrl: https://github.com/hahadu/wechat
 *  +----------------------------------------------------------------------
 *  | Author: hahadu <582167246@qq.com>
 *  +----------------------------------------------------------------------
 *  | Date: 2020/10/28 下午9:33
 *  +----------------------------------------------------------------------
 *  | Description:   添加文字到图像中
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Manage\TextToImage\Model;


use Hahadu\ImageFactory\Confing\Constants;
use Hahadu\ImageFactory\Kernel\Kernel;
use Hahadu\ImageFactory\Kernel\Models\AddText;

class TextAddImage
{
    /****
     * @var Kernel
     */
    private $_kernel;
    private $path;
    private $config;
    private $AddText;

    /****
     * TextAddImage constructor.
     * @param Kernel $kernel
     */
    public function __construct($kernel){
        $this->_kernel = $kernel;
        $this->config = $kernel->config;
        $this->AddText = new AddText($kernel);
    }
    public function getPic($image=null,$path=null){
        $this->path = $this->_kernel->base->get_save_path($path);
        $image_data = $this->_kernel->Imagick($image); //图像
        //获取图像信息
        $image_format = mb_strtolower($image_data->getImageFormat());
        $image_width  = $image_data->getImageWidth();
        $image_height = $image_data->getImageHeight();
        $image_file_name  = $image_data->getImageFilename();
        dump($image_width,$image_height);
        $WaterMark = $this->config->getWaterMark;

        $len = mb_strlen($this->config->getWaterMark);  //字符串长度

        $style['font'] = $this->_kernel->config->getFonts; ///微软雅黑字体 解决中文乱码
        dump($len);

        //return;

        $style['font_size'] = 20;
        //字符串长度 + 字符宽度 + 空格
        $text_x = $image_width-$len*$style['font_size']+$image_width/$len-$len/$style['font_size'];
        $text_y = $image_height-$style['font_size']/3;
        dump($text_x);

        $style['fill_color'] = '#666';

        //$text=mb_convert_encoding($text,'UTF-8'); //iconv("GBK","UTF-8//IGNORE",$text);

        $this->AddText->add_text($image_data,$this->config->getWaterMark, $text_x, $text_y, 0,$style);
        $file = $this->path.'text.'.mb_strtolower($image_data->getImageFormat());

        $image_data->writeImage($file);

        return Constants::DS.$file;

    }


}