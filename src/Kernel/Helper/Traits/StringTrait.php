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
 *  | Date: 2020/10/30 下午12:14
 *  +----------------------------------------------------------------------
 *  | Description:   StringTrait
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Kernel\Helper\Traits;


use Hahadu\Helper\StringHelper;

trait StringTrait
{
    public function check_chines($string){
        return StringHelper::check_chines($string);
    }
    public function re_substr($string, $start=0, $length=10, $suffix=true, $charset="utf-8"){
        return StringHelper::re_substr($string,$start,$length,$suffix,$charset);
    }
    public function get_chines($text){
        return StringHelper::get_chines($text);
    }

}