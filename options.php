<?php
/*@support tpl_options*/
!defined('EMLOG_ROOT') && exit('access deined!');
$options = array(
    /*网站logo设置*/
    'logo' => array(
        'type' => 'image',
        'name' => '网站logo设置',
        'values' => array(
            TEMPLATE_URL . 'images/logo.png',
        ),
    ),
    'bangumiAccount' => array(
        'type' => 'text',
        'name' => 'bangumi账号',
        'description' => '填写bangumi账号',
        'default' => '',
    ),
    'bangumiPassword' => array(
        'type' => 'text',
        'name' => 'bangumi密码',
        'description' => '填写bangumi密码',
        'default' => '',
    ),
    'cardLink' => array(
        'type' => 'text',
        'name' => '抽卡系统页面路径',
        'description' => '去掉站点地址，如抽卡页面为www.host.com/?post=130,则取?post=130即可',
        'default' => '',
    ),
    /*是否开启幻灯片*/
    'slides' => array(
        'type' => 'radio',
        'name' => '幻灯片',
        'values' => array(
            'yes' => '显示',
            'no' => '隐藏',
        ),
        'default' => 'yes',
    ),
    /*是否开启幻灯片*/
    'slidesnum' => array(
        'type' => 'radio',
        'name' => '幻灯片显示数量',
        'description' => '选择显示数量，会从下面幻灯片依次显示',
        'values' => array(
            '1'=>'1',
            '2'=>'2',
            '3'=>'3',
            '4'=>'4',
            '5'=>'5',
            '6'=>'6',
            '7'=>'7',
            '8'=>'8',
            '9'=>'9',
            '10'=>'10',
        ),
        'default' => '2',
    ),
    /*设置自定义轮播图*/
    /*幻灯片1*/
    'hda1' => array(
        'type' => 'text',
        'name' => '首页幻灯1',
        'description' => '填写链接',
        'default' => 'http://www.7yex.com',
        ),
    'hdopen1' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt1' => array(
        'type' => 'text',
        'name' => '首页幻灯1',
        'description' => '填写标题',
        'default' => '既不回头，何必不忘。既然无缘，何须誓言。',
        ),
    'hd1' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片2*/
    'hda2' => array(
        'type' => 'text',
        'name' => '首页幻灯2',
        'description' => '填写链接',
        'default' => 'http://www.7yex.com',
        ),
    'hdopen2' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt2' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '恍惚中，时光停滞，岁月静好。宛如十年前。',
        ),
    'hd2' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片3*/
    'hda3' => array(
        'type' => 'text',
        'name' => '首页幻灯3',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen3' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt3' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd3' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片4*/
    'hda4' => array(
        'type' => 'text',
        'name' => '首页幻灯4',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen4' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt4' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd4' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片5*/
    'hda5' => array(
        'type' => 'text',
        'name' => '首页幻灯5',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen5' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt5' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd5' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片6*/
    'hda6' => array(
        'type' => 'text',
        'name' => '首页幻灯6',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen6' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt6' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd6' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片7*/
    'hda7' => array(
        'type' => 'text',
        'name' => '首页幻灯7',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen7' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt7' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd7' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片8*/
    'hda8' => array(
        'type' => 'text',
        'name' => '首页幻灯8',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen8' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt8' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd8' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片9*/
    'hda9' => array(
        'type' => 'text',
        'name' => '首页幻灯9',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen9' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt9' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd9' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
    /*幻灯片10*/
    'hda10' => array(
        'type' => 'text',
        'name' => '首页幻灯10',
        'description' => '填写链接',
        'default' => '',
        ),
    'hdopen10' => array(
        'type' => 'radio',
        'name' => '',
        'description' => '页面打开方式',
        'values' => array(
            ''=>'当前窗口打开',
            '_blank'=>'新窗口打开'
        ),
        'default' => '',
    ),
    'hdt10' => array(
        'type' => 'text',
        'name' => '',
        'description' => '填写标题',
        'default' => '',
        ),
    'hd10' => array(
        'type' => 'image',
        'name' => '',
        'description' => '建议上传宽880px，高300px的图片，能完美的显示',
        'values' => array(
            TEMPLATE_URL . 'images/null.jpg',
        ),
    ),
);