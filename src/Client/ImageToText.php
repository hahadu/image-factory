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
 *  | Date: 2020/10/28 上午12:04
 *  +----------------------------------------------------------------------
 *  | Description:   ImageFactory 图像转代码
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Client;


use Hahadu\ImageFactory\Kernel\Kernel;

class ImageToText
{
    /****
     * @var Kernel
     */
    protected $_kernel;

    public function __construct($kernel){
        $this->_kernel = $kernel;
        if(!empty($chars)){
            $this->chars = $this->_kernel->chars;
        }
    }
    public function to_text($images='', $flage=true){
        return '';
    }

}