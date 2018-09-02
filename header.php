<?php
/*
Template Name:black memory V2
Description:《黑色记忆》,一个简洁的黑色主题模板。基于sevennight大佬的black memory模板改版。
Version:2.0
Author:sevennight,广树
Author Url:http://www.wikimoe.com/
Sidebar Amount:1
*/
if(!defined('EMLOG_ROOT')) {exit('error!');}
require_once View::getView('module');
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title><?php echo $site_title; ?></title>
<meta name="keywords" content="<?php echo $site_key; ?>" />
<meta name="description" content="<?php echo $site_description; ?>" />
<meta name="generator" content="emlog" />
<meta itemprop="name" content="<?php echo $site_title; ?>"/>
<meta itemprop="image" content="<?php echo TEMPLATE_URL; ?>qqico.jpg" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
<link rel="EditURI" type="application/rsd+xml" title="RSD" href="<?php echo BLOG_URL; ?>xmlrpc.php?rsd" />
<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="<?php echo BLOG_URL; ?>wlwmanifest.xml" />
<link rel="alternate" type="application/rss+xml" title="RSS"  href="<?php echo BLOG_URL; ?>rss.php" />
<link href="<?php echo TEMPLATE_URL; ?>main.css?ver0.10" rel="stylesheet" type="text/css" />
<link href="<?php echo TEMPLATE_URL; ?>is_mobile.css?ver0.3" rel="stylesheet" type="text/css" />
<link href="<?php echo TEMPLATE_URL; ?>js/code/prettify.css" rel="stylesheet" type="text/css" />
<link href="<?php echo TEMPLATE_URL; ?>OwO/OwO.min.css" rel="stylesheet" type="text/css" />
<script src="<?php echo TEMPLATE_URL; ?>OwO/OwO.min.js" type="text/javascript"></script>
<script src="<?php echo TEMPLATE_URL; ?>js/code/prettify.js" type="text/javascript"></script>
<!--百度编辑器-->


<script src="<?php echo BLOG_URL; ?>include/lib/js/common_tpl.js" type="text/javascript"></script>
<script src="https://apps.bdimg.com/libs/jquery/1.7.1/jquery.min.js" type="text/javascript"></script>
<!--[if IE 6]>
<script src="<?php echo TEMPLATE_URL; ?>iefix.js" type="text/javascript"></script>
<![endif]-->
<script async src="//pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<script>
  (adsbygoogle = window.adsbygoogle || []).push({
    google_ad_client: "ca-pub-2419422873915278",
    enable_page_level_ads: true
  });
</script>
</head>
<body>
<div id="wrap">
  <div id="header">
  	<!-- logo -->
    <div class="logo l">

    	<a href="<?php echo BLOG_URL; ?>"><img src="<?php echo _g('logo');?>"></a>
    	<!-- <h3><?php echo $bloginfo; ?></h3> -->
    </div>
    <!-- 导航-->
    <div id="nav" class="nav l"><?php blog_navi();?>

    <!-- 搜索框 -->
    <div class="search-area" id="search">
    	<form name="keyform" method="get" action="<?php echo BLOG_URL; ?>index.php">
			  <input name="keyword" class="search-input" type="text" placeholder="搜索关键字" onblur="searchblur()" onfocus="searchfocus()"/>
        <input type="button" class="btn-search">
        <script type="text/javascript">
          function searchblur(){
            document.getElementById('search').className='search-area';
          }
          function searchfocus(){
            document.getElementById('search').className='search-area focus';
          }
        </script>
		  </form>
    </div>
    
    <div class="mobile_nav_body">
    	<div class="mobile_nav_close" id="mobile_menu_close"></div>
    </div>
    <div class="wikimoe_overlay_black"></div>
    <div class="wikimoe_mobile_nav_open" id="mobile_menu_open"></div>
    <script src="<?php echo TEMPLATE_URL; ?>js/is_mobile.js" type="text/javascript"></script>
    
  </div>
  
  