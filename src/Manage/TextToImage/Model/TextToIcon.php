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
 *  | Date: 2020/10/28 下午9:03
 *  +----------------------------------------------------------------------
 *  | Description:   TextToIcon
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Manage\TextToImage\Model;


use Hahadu\ImageFactory\Kernel\Extend\Constants;
use Hahadu\ImageFactory\Kernel\Kernel;

class TextToIcon
{
    protected $background = 'white';
    protected $image_files = null;
    protected $icon_size = 50;
    protected $icon_format = 'ico';
    /****
     * @var Kernel
     */
    private $_kernel;
    public function __construct($kernel){
        $this->_kernel = $kernel;
    }

    public function text_to_icon($text,$path=''){
        $save_path = $this->_kernel->base->get_save_path($path);
        $set=$this->_kernel->config->getTextStyle();
        $set['font_size']  = $this->icon_size*0.6;
        $set['fill_color'] = "#666";
        $set['font_weight']= 500;
        $text_x = 2;
        $text_y = 26;
        $text_angle =0;
        $path = $save_path.
            base64_encode($text.time().'_'.$this->icon_size.'x'.$this->icon_size).Constants::DOT.
            $this->icon_format;

        $check = function($text){
            if ($this->_kernel->base->check_chines($text)) {
                $text = $this->_kernel->base->re_substr($text,0,1,false);
            }
            return $text;
        };
        $text = $this->_kernel->base->re_substr($text,0,2,false);
        $line= mb_substr_count($check($text),PHP_EOL)+1;
        $len = $this->_kernel->base->get_str_max_len($check($text),$line);

        if(mb_strlen($check($text))>1){
            $set['font_size']  = $this->icon_size*0.55;
            $text_x=$len*$set['font_size']/3.5;
            $text_y=$line*$set['font_size']*1.2;
        }else{
            $set['font_size']  = $this->icon_size*0.65;
            if($this->_kernel->base->check_chines($text)){
                $text_x=$len*$set['font_size']/4.5;
            }else{
                $text_x=$len*$set['font_size']/1.25;
            }
            $text_y=$line*$set['font_size']*1.15;
        }

        try {
            $image = $this->_kernel->Imagick($this->image_files);

            $draw = $this->_kernel->ImagickDraw()->set_text($set);

            $pixel = $this->_kernel->ImagickPixel($this->background);

            $pixel->setColor('#DDDDDD');

            $image->newImage($this->icon_size, $this->icon_size, $pixel);

            $image->annotateImage($draw, $text_x, $text_y, $text_angle,$check($text) );

            $image->setImageFormat($this->icon_format);

            $image->writeImages($path,true);
            $image->destroy();
            return Constants::DS.$path;
        }catch (\Exception $e){
            return $e;
        }
    }
}