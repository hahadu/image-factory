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
 *  | Date: 2020/10/28 下午8:07
 *  +----------------------------------------------------------------------
 *  | Description:   微信公众平台SDK
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Kernel\Helper;


use Hahadu\Helper\FilesHelper;
use Hahadu\Helper\StringHelper;
use Hahadu\ImageFactory\Confing\Config;

class BaseHelper
{
    private $config;
    /****
     * @var Config
     */

    private $save_path;
    /****
     * @var Config $config
     */
    public function __construct($config){
        $this->config = $config;
        $this->save_path = $config->setSavePath;
    }
    public function mkdir($dirname){
        return FilesHelper::mkdir($dirname);
    }
    public function check_chines($string){
        return StringHelper::check_chines($string);
    }
    public function re_substr($string, $start=0, $length, $suffix=true, $charset="utf-8"){
        return StringHelper::re_substr($string,$start,$length,$suffix,$charset);
    }
    public function get_save_path($save_path){
        if(null!=$save_path){
            $this->save_path = $save_path;
        }
        $this->mkdir($this->save_path);
        return $this->save_path;
    }
}