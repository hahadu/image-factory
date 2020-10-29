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
use Hahadu\ImageFactory\Config\Config;
use Hahadu\ImageFactory\Kernel\Models\AddText;
use Hahadu\ImageFactory\Kernel\Extend\ImagickConfig;
use Hahadu\ImageFactory\Kernel\Models\PositionModel;

class BaseHelper
{
    private $AddText;
    private $config;
    /****
     * @var Config
     */

    private $save_path;
    /****
     * @var \Hahadu\ImageFactory\Kernel\Extend\ImagickConfig $config
     */
    public function __construct($config){
        $this->config = $config;
        $this->save_path = $config->getSavePath();
    }
    public function mkdir($dirname){
        return FilesHelper::mkdir($dirname);
    }
    public function check_chines($string){
        return StringHelper::check_chines($string);
    }
    public function re_substr($string, $start=0, $length=10, $suffix=true, $charset="utf-8"){
        return StringHelper::re_substr($string,$start,$length,$suffix,$charset);
    }
    public function get_save_path($save_path){
        if(null!=$save_path){
            $this->save_path = $save_path;
        }
        $this->mkdir($this->save_path);
        return $this->save_path;
    }
    public function get_chines($text){
        return StringHelper::get_chines($text);
    }
    /****
     * 获取字符串最长一行的长度
     * @param string $text
     * @param int|null $line
     * @return false|int|mixed
     */
    public function get_str_max_len($text,$line=null){
        if(!is_int($line)){
            $line = mb_substr_count($text,PHP_EOL)+1;
        }
        if($line>1) {
            $w_arr = explode(PHP_EOL, $text);
            for ($i = 0; $i < $line; $i++) {
                $chines_len = mb_strlen($this->get_chines($w_arr[$i]));
                $count_space = substr_count($w_arr[$i],' ')/2.5;
                if($chines_len!=0) {
                    $arr_len[$i] = mb_strlen($w_arr[$i], 'utf-8') / 3 +
                        $count_space +
                        ($chines_len);
                }else{
                    $arr_len[$i] = mb_strlen($w_arr[$i])/2.15+$count_space;
                }
            }
            $len = max($arr_len);
        }else{
            $chines_len = mb_strlen($this->get_chines($text));
            $count_space = substr_count($text,' ')/2.5;
            if($chines_len!=0){
                $len = mb_strlen($text)/3+$chines_len+$count_space;
            }else{
                $len = mb_strlen($text)/2.15+$count_space;
            }
        }
        return $len;
    }

    public function position(){
        return new PositionModel();
    }


}