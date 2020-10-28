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
 *  | Date: 2020/10/28 上午12:02
 *  +----------------------------------------------------------------------
 *  | Description:   ImageFactory
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Helper;


use Hahadu\Helper\FilesHelper;
use Hahadu\ImageFactory\Confing\Config;

class BaseHelper
{
    /****
     * @var Config
     */
    private $config;
    public function __construct($config){
        $this->config = $config;
    }
    public function mkdir($dirname){
        return FilesHelper::mkdir($dirname);
    }
}