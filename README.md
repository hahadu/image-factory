# image-class
基于imagick的图像处理类

已实现的功能：
* 图像转文字像素
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
*创建缩略图
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