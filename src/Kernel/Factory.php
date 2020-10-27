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
 *  | Date: 2020/10/28 上午12:24
 *  +----------------------------------------------------------------------
 *  | Description:   微信公众平台SDK
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Kernel;
use Hahadu\ImageFactory\Client\ImageToText;

class Factory
{
    protected static $ImageToText;
    protected $kernel;
    //构造方法
    public function __construct(){
        $this->kernel = new Kernel();
        self::$ImageToText = new ImageToText($this->kernel);

    }

    //参数设置
    static public function setOptions(){

    }
    static public function image_to_text($images='', $flag=true){
        return self::$ImageToText->to_text($images, $flag);
    }

}