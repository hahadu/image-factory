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
 *  | Date: 2020/10/28 上午12:05
 *  +----------------------------------------------------------------------
 *  | Description:   ImageFactory
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Kernel;
use Hahadu\ImageFactory\Confing\Config;
use Hahadu\ImageFactory\Kernel\Helper\BaseHelper;
use Imagick;
use ImagickDraw;
use ImagickPixel;

class Kernel
{

 //   public $chars;
    /****
     * @var Config
     */
    public $config;
    public $base;
    public function __construct($config){
        $this->config = $config;
        $this->base = new BaseHelper($config);
    }
    public function Imagick($files = null){
        return new Imagick($files);
    }
    public function ImagickDraw(){
        return new ImagickDraw();
    }
    public function ImagickPixel($color = null){
        return new ImagickPixel($color);
    }

}