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
use Imagick;
use ImagickDraw;
use ImagickPixel;

class Kernel
{

    public $chars;
    public function __construct(){
        $this->chars = "$@B%8&WM#*oahkbdpqwmZO0QLCJUYXzcvunxrjft/\|()1{}[]?-_+~<>i!lI;:,\"^`'. ";
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
    public function chars($string=''){
        return $this->chars;
    }

}