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
 *  | Date: 2020/10/28 下午7:59
 *  +----------------------------------------------------------------------
 *  | Description:   Imagick Avatar model
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Manage\TextToImage\Model;


use Hahadu\ImageFactory\Confing\Constants;
use Hahadu\ImageFactory\Kernel\Kernel;

class TextToAvatar
{
    protected $background = 'white';
    protected $image_files = null;
    protected $avatar_size = 80;
    protected $avatar_format = 'png';
    /****
     * @var Kernel
     */
    private $_kernel;
    public function __construct($kernel){
        $this->_kernel = $kernel;
    }
    /****
     * 截取文本第一个字符生成图标
     * @param $text
     * @param string $type
     * @param string $path
     * @return \Exception|string
     */
    public function text_to_avatar($text,$path=''){
        $save_path = $this->_kernel->base->get_save_path($path);
        $font_size  = 35;
        $font_weight= 500;
        $text_x = 17;
        $text_y = 53;
        $text_angle =0;
        $path = $save_path.
            base64_encode($text.time().'_'.$this->avatar_size.'x'.$this->avatar_size).'.'.
            $this->avatar_format;

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

            $image->newImage($this->avatar_size, $this->avatar_size, $pixel);

            $pixel->setColor('#DDDDDD');

            $draw->setFontSize( $font_size );

            $draw->setFontWeight($font_weight);

            $draw->setFont($this->_kernel->config->setFonts);

            $image->annotateImage($draw, $text_x, $text_y, $text_angle,$check($text) );

            $image->setImageFormat($this->avatar_format);

            $image->writeImages($path,true);
            return Constants::DS.$path;
        }catch (\Exception $e){
            return $e;
        }
    }

}