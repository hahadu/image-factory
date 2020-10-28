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
 *  | Date: 2020/10/28 上午9:08
 *  +----------------------------------------------------------------------
 *  | Description:   微信公众平台SDK
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Confing;


class Config
{
    /*****
     * @var string 设置随机字符串
     */
    public $chars = "$@B%8&WM#*oahkbdpqwmZO0QLCJUYXzcvunxrjft/\|()1{}[]?-_+~<>i!lI;:,\"^`'. ";
    public $getSavePath = 'images/';
    public $getWaterMark = '是asd写的是sdf啥的范'; //设置水印
    /*
     * 650 字体20 $len*$style['font_size']-$style['font_size']*4*3;
     * 650 24*20 = 650 - 480-0
     * 650 27*20 = 650 - 540-80
     *
     */
    public $getFonts = '';
    public function __construct(){
        if(null == $this->getFonts){
            $this->getFonts = dirname(dirname(__DIR__)).'/static/siyuanheiti.otf';
        }
    }

}