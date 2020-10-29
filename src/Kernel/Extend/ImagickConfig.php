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
 *  | Date: 2020/10/29 下午10:04
 *  +----------------------------------------------------------------------
 *  | Description:   微信公众平台SDK
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Kernel\Extend;


use Hahadu\ImageFactory\Config\Config;

class ImagickConfig
{
    private $config;
    /****
     * ImagickConfig constructor.
     * @param Config $config
     */
    public function __construct($config){
        return $this->config = $config;
    }
    /****
     * @return string 默认文件保存路径
     */
    public function getSavePath(){
        return $this->config->savePath;
    }

    /*****
     * @return string 设置随机字符串
     */
    public function getChars(){
        return $this->config->chars;
    }
    /****
     * @return string 默认文本水印字符串
     */
    public function getWaterMarkText(){
        return $this->config->waterMarkText;
    }

    /****
     * @return array 默认文本水印样式
     */
    public function getTextStyle(){
        $WaterMark = [
            "font_size" => 20,
            "font" => $this->getFonts(),
            "fill_color" => "#aaa",
            "under_color" => "#ffffff00", //背景颜色
        //    "fill_opacity" => 1, //文字透明度 会覆盖fill_color中设置的透明度
        //    "font_family" => '',
        ];
        return array_replace_recursive($WaterMark,$this->config->TextStyle);
    }
    public function getFonts(){
        $fonts = $this->config->fonts;
        if(null == $fonts){
            $fonts = dirname(dirname(dirname(__DIR__))).'/static/siyuanheiti.otf';
        }
        return $fonts;
    }

}