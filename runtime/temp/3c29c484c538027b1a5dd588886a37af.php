<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:31:"./tpl\admin\column\addlist.html";i:1549007465;}*/ ?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <title>添加栏目</title>
    <meta name="keywords" content="添加栏目">
    <meta name="description" content="添加栏目">
    <link rel="shortcut icon" href="/public/admin/favicon.ico">
    <link href="/public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
</head>
<body>
<style>
    .form-group{height: 3em;}
</style>
<form action="<?php echo url('Column/addlist'); ?>" method="post" role="form">
    <div class="container" style="margin-top: 3rem;">
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">下拉列表：</label>
            <div class="col-lg-4 col-sm-9">
                <select class="form-control" name="pid">
                    <option value="0">顶级栏目</option>
                    <?php if(is_array($listcolumn) || $listcolumn instanceof \think\Collection || $listcolumn instanceof \think\Paginator): $i = 0; $__LIST__ = $listcolumn;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$column): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $column['id']; ?>">
                        <?php if($column['pid'] != '0'): ?>|
                        <?php echo str_repeat("——",$column['level']); endif; ?>
                        <?php echo $column['name']; ?>
                    </option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">栏目名：</label>
            <div class="col-lg-4 col-sm-9">
                <input type="text" name="name" class="form-control" placeholder="请输入栏目名称">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">栏目title：</label>
            <div class="col-lg-4 col-sm-9">
                <input type="text" name="title" class="form-control" placeholder="请输入文本">

            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">栏目描述：</label>
            <div class="col-lg-4 col-sm-9">
                <input type="text" name="description" class="form-control" placeholder="请输入文本">

            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">栏目关键词：</label>
            <div class="col-lg-4 col-sm-9">
                <input type="text" name="keyword" class="form-control" placeholder="请输入文本">

            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">栏目类型：</label>
            <div class="col-lg-4 col-sm-9">
                <label class="radio-inline" for="type1">
                    <input type="radio" checked="" value="1" id="type1" name="type">多页</label>
                <label class="radio-inline" for="type2">
                    <input type="radio" value="2" id="type2" name="type">单页</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">栏目状态：</label>
            <div class="col-lg-4 col-sm-9">
                <label class="radio-inline" for="status1">
                    <input type="radio" checked="checked" value="1" id="status1" name="status">开启</label>
                <label class="radio-inline" for="status2">
                    <input type="radio" value="0" id="status2" name="status">关闭</label>
            </div>
        </div>
        <div class="form-group">
            <input type="submit" value="提交" class="btn btn-primary center-block" />
        </div>
    </div>
</form>
<script src="/public/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/public/admin/js/bootstrap.min.js?v=3.3.5"></script>
</body>
</html>