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
 *  | Date: 2020/10/28 下午7:58
 *  +----------------------------------------------------------------------
 *  | Description:   微信公众平台SDK
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Manage\TextToImage;
use Hahadu\ImageFactory\Manage\TextToImage\Model\TextAddImage;
use Hahadu\ImageFactory\Manage\TextToImage\Model\TextToAvatar;
use Hahadu\ImageFactory\Manage\TextToImage\Model\TextToIcon;


class Client
{
    protected $TextToAvatar;
    protected $TextToIcon;
    public $TextAddImage;

    public function __construct($kernel){
        $this->TextToAvatar = new TextToAvatar($kernel);
        $this->TextToIcon = new TextToIcon($kernel);
        $this->TextAddImage = new TextAddImage($kernel);
    }
    public function text_to_avatar($text){
        return $this->TextToAvatar->text_to_avatar($text);
    }
    public function text_to_icon($text,$path=''){
        return $this->TextToIcon->text_to_icon($text,$path);
    }

}