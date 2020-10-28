# image-class
基于imagick的图像处理类

设计初衷：大多数时候，imagick执行效率比GD高，业务代码量也比GD少

项目部依赖任何框架，因此你可以与你的任何项目集成。

项目依赖php-imagick扩展，

安装前请确保安装了php-imagick
- debian/ubuntu sudo apt install php-imagick

安装项目：
- composer require hahadu/image-factory

已实现的功能模块：
* 图像转文字像素 [此模块旧版](https://github.com/hahadu/image-to-text)
* 创建图像缩略图
* 根据文字前两个字符创建头像(.png)和图标(.icon)

使用方法
* 引入命名空间
```
use Hahadu\ImageFactory\Confing\Config;
use Hahadu\ImageFactory\Kernel\Factory;

```
* 图像转文字像素

```puml
//
        $image = 'iphonex.jpg';
        $config = new Config(); //获取配置信息
        $config->chars = '01';
        Factory::setOptions($config);
        echo Factory::image_to_text()->to_text_black($image);
        echo Factory::image_to_text()->to_text_color($image);

```
* 创建缩略图
```
        $image = 'image.png';
        $config = new Config();
        $config->getSavePath = 'images/thumb/'; //配置缓存目录
        Factory::setOptions($config);
        //thumb 四个参数 
        //其中设置$path参数会覆盖$config->getSavePath;null即可
        //返回文件路径
        $thumb_url = thumb($image=$image,$path='',$width=100,$height=100);

        echo '<img src="'.$thumb_url.'"/>';

```
* 根据文本前两个字符串创建头像
- > 注意:汉字目前只截取第一个字符，字母截取前两个字符，汉字与英文字母同时只能存在一个
```
        $config = new Config();
        $config->getSavePath = 'images/';
        Factory::setOptions($config);
        //生成.png格式头像
        $avatar_url = Factory::text_to_image()->text_to_icon('HahaDu'); //截取：Ha
        echo '<img src="'.$avatar_url.'"/>';
        //生成.icon格式图标
        $icon_url = Factory::text_to_image()->text_to_icon('哈哈'); //截取：哈
        echo '<img src="'.$icon_url.'"/>';
```