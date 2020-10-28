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
 *  | Date: 2020/10/28 下午10:48
 *  +----------------------------------------------------------------------
 *  | Description:   AddTextTimage
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Kernel\Models;


use Hahadu\ImageFactory\Kernel\Kernel;

class AddText
{
    private $_kernel;

    /****
     * AddText constructor.
     * @param Kernel $kernel
     */
    public function __construct($kernel){
        $this->_kernel=$kernel;
    }

    /****
     * @param \Imagick $imagick
     * @param string $text 添加的文本
     * @param int $x
     * @param int $y
     * @param int $angle
     * @param array $style
     */
    public function add_text(& $imagick, $text, $x = 0, $y = 0, $angle = 0, $style = array()) {

        $draw = $this->_kernel->ImagickDraw();

        if (isset ( $style ['font'] ))

            $draw->setFont ( $style ['font'] );

        if (isset ( $style ['font_size'] ))

            $draw->setFontSize ( $style ['font_size'] );

        if (isset ( $style ['fill_color'] ))

            $draw->setFillColor ( $style ['fill_color'] );

        if (isset ( $style ['under_color'] ))

            $draw->setTextUnderColor ( $style ['under_color'] );

        if (isset ( $style ['font_family'] ))

            $draw->setfontfamily( $style ['font_family'] );

        if (isset ( $style ['font'] ))

            $draw->setfont($style ['font'] );

        $draw->settextencoding('UTF-8');

        if (strtolower ($imagick->getImageFormat ()) == 'gif') {

            foreach ( $imagick as $frame ) {

                $frame->annotateImage ( $draw, $x, $y, $angle, $text );

            }

        } else {

            $imagick->annotateImage ( $draw, $x, $y, $angle, $text );

        }

    }

}