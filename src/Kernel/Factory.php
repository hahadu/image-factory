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
 *  | Description:   Factory
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Kernel;
use Hahadu\ImageFactory\Kernel\Extend\ImagickConfig;
use Hahadu\ImageFactory\Manage\ImageToText\Client as ImageToText;
use Hahadu\ImageFactory\Manage\Scale\Client as Scale;
use Hahadu\ImageFactory\Manage\TextToImage\Client as TextToImage;
use Hahadu\ImageFactory\Manage\ImageToImage\Client as ImageToImage;
use Hahadu\ImageFactory\Kernel\Helper\BaseHelper;

class Factory
{
    private $ImageToText;
    protected $kernel;
    private $Base;
    private $instance;
    private $Scale;
    private $TextToImage;
    private $ImageToImage;
    private $config;

    //构造方法
    public function __construct($config){
        $this->config = $config;
        $this->kernel = new Kernel($config);
        $this->Base = new BaseHelper($config);
        $this->ImageToText = new ImageToText($this->kernel);
        $this->TextToImage = new TextToImage($this->kernel);
        $this->Scale = new Scale($this->kernel);
        $this->ImageToImage = new ImageToImage($this->kernel);

    }
    //参数设置
    static public function setOptions($config){
        $config = new ImagickConfig($config);
        return new self($config);
    }
    public function base(){
        return $this->Base;
    }
    public function scale(){
        return $this->Scale;
    }

    public function image_to_text(){
        return $this->ImageToText;
    }
    public function text_to_image(){
        return $this->TextToImage;
    }
    public function image_to_image(){
        return $this->ImageToImage;
    }

    public static function __callStatic($name, $arguments)
    {
        return self::setOptions($arguments)->{$name}();
    }

//    public function __call($name, $arguments)
//    {
//
//    }

}