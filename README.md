# image-class
基于imagick的图像处理类

设计初衷：大多数时候，imagick执行效率比GD高，业务代码量也比GD少

项目依赖php-imagick扩展，

安装前请确保安装了php-imagick
- debian/ubuntu sudo apt install php-imagick

安装项目：
- composer require hahadu/image-factory

已实现的功能模块：
* 图像转文字像素 [此模块旧版](https://github.com/hahadu/image-to-text)
* 创建图像缩略图

使用方法
* 图像转文字像素

```puml
//
        $image = 'iphonex.jpg';
        $config = new Config();
        $config->chars = '01';
        Factory::setOptions($config);
        echo Factory::image_to_text()->to_text_black($image);
        echo Factory::image_to_text()->to_text_color($image);

```
* 创建缩略图
```
        $image = 'image.png';
        $config = new Config();
        $config->setSavePath = 'images/thumb/'; //配置缓存目录
        Factory::setOptions($config);
        //thumb 四个参数 
        //其中设置$path参数会覆盖$config->setSavePath;null即可
        //返回文件路径
        $thumb_url = thumb($image=$image,$path='',$width=100,$height=100);

        return '<img src="'.$thumb_url.'"/>';

```