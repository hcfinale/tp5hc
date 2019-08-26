<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:27:"./tpl\admin\index\info.html";i:1515141878;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>配置信息</title>
    <link rel="stylesheet" href="http://cdn.static.runoob.com/libs/bootstrap/3.3.7/css/bootstrap.min.css">
</head>
<body>
<div class="container-fluid">
    <div class="container">
        <h3>系统基本信息</h3>
         <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
            <dl class="dl-horizontal">
                <dt><?php echo $key; ?></dt>
                <dd><?php echo $vo; ?></dd>
            </dl>
          <?php endforeach; endif; else: echo "" ;endif; ?>
    </div>
</div>
</body>
</html>