<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:30:"./tpl\index\article\index.html";i:1566984956;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>栏目列表</title>
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!--标准mui.css-->
    <link rel="stylesheet" href="/public/index/css/mui.min.css">
    <!--App自定义的css-->
    <link rel="stylesheet" type="text/css" href="/public/index/css/app.css"/>
</head>
<body>
<style type="text/css">
    .text-center{text-align: center;}
    .article{clear: both;overflow: hidden;margin: 0 1%;}
    .article img{width: 80%;height: auto;}
    .article p{font-size: 14px;text-indent: 2em;}
</style>
<header class="mui-bar mui-bar-nav">
    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
    <h1 class="mui-title"><?php echo $ListName; ?></h1>
</header>
<div class="mui-content">
    <h1 class="text-center" style="font-size: 18px;margin: 1em"><?php echo $arc['title']; ?></h1>
    <div class="article">
        <?php echo $arc['article']; ?>
    </div>
</div>
<div style="margin: 3rem 0"></div>
<nav class="mui-bar mui-bar-tab">
    <a class="mui-tab-item mui-active">
        <span class="mui-icon mui-icon-home"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a class="mui-tab-item">
        <span class="mui-icon mui-icon-phone"></span>
        <span class="mui-tab-label">电话</span>
    </a>
    <a class="mui-tab-item">
        <span class="mui-icon mui-icon-email"></span>
        <span class="mui-tab-label">邮件</span>
    </a>
    <a class="mui-tab-item">
        <span class="mui-icon mui-icon-gear"></span>
        <span class="mui-tab-label">设置</span>
    </a>
</nav>
</body>
<script src="/public/index/js/mui.min.js"></script>
</html>