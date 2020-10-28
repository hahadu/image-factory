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


use Hahadu\ImageFactory\Confing\Constants;
use Hahadu\ImageFactory\Kernel\Kernel;

class TextToIcon
{
    protected $background = 'white';
    protected $image_files = null;
    protected $icon_size = 35;
    protected $icon_format = 'icon';
    /****
     * @var Kernel
     */
    private $_kernel;
    public function __construct($kernel){
        $this->_kernel = $kernel;
    }

    public function text_to_icon($text,$path=''){
        $save_path = $this->_kernel->base->get_save_path($path);
        $font_size  = 22;
        $font_weight= 500;
        $text_x = 2;
        $text_y = 26;
        $text_angle =0;
        $path = $save_path.
            base64_encode($text.time().'_'.$this->icon_size.'x'.$this->icon_size).'.'.
            $this->icon_format;

        $check = function($text){
            if ($this->_kernel->base->check_chines($text)) {
                $text = $this->_kernel->base->re_substr($text,0,1,false);
            }
            return $text;
        };
        $text = $this->_kernel->base->re_substr($text,0,2,false);

        try {
            $image = $this->_kernel->Imagick($this->image_files);

            $draw = $this->_kernel->ImagickDraw();

            $pixel = $this->_kernel->ImagickPixel($this->background);

            $image->newImage($this->icon_size, $this->icon_size, $pixel);

            $pixel->setColor('#DDDDDD');

            $draw->setFontSize( $font_size );

            $draw->setFontWeight($font_weight);

            $draw->setFont($this->_kernel->config->setFonts);

            $image->annotateImage($draw, $text_x, $text_y, $text_angle,$check($text) );

            $image->setImageFormat($this->icon_format);

            $image->writeImages($path,true);
            return Constants::DS.$path;
        }catch (\Exception $e){
            return $e;
        }
    }
}