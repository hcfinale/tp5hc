<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./tpl\admin\article\search.html";i:1566804543;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>文章列表</title>
    <link rel="shortcut icon" href="/public/admin/favicon.ico">
    <link href="/public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
</head>
<body>
<div class="container">
    <?php if(is_array($rows) || $rows instanceof \think\Collection || $rows instanceof \think\Paginator): $i = 0; $__LIST__ = $rows;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="row">
        <h4><a href="<?php echo url('index/article/index',['id'=>$vo['id']]); ?>" target="_blank"><?php echo $vo['title']; ?></a></h4>
    </div>
    <?php endforeach; endif; else: echo "" ;endif; ?>
    <?php echo $rows; ?>
</div>
<script src="/public/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/public/admin/js/bootstrap.min.js?v=3.3.5"></script>
</body>
</html>