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
 *  | Date: 2020/10/29 下午10:12
 *  +----------------------------------------------------------------------
 *  | Description:   config
 *  +----------------------------------------------------------------------
 **/

namespace Hahadu\ImageFactory\Config;


class Config
{
    /*****
     * @var string 设置随机字符串
     */
    public $chars = "$@B%8&WM#*oahkbdpqwmZO0QLCJUYXzcvunxrjft/\|()1{}[]?-_+~<>i!lI;:,\"^`'. ";
    /****
     * @var string 默认文件保存路径
     */
    public $savePath = 'images/';
    /****
     * @var string 默认文本水印字符串
     */
    public $waterMarkText ="power by ha顶戴hadu楕沙发上/i\nmage-factory"; //设置水印
    /****
     * @var array 默认文本水印样式
     */
    public $TextStyle = [
        'font_size' => 20,
    ];
    public $fonts = '';

}