<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:34:"./tpl\admin\authority\addAuth.html";i:1516581555;}*/ ?>
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
<form action="<?php echo url('Authority/addAuth'); ?>" method="post" role="form">
    <div class="container" style="margin-top: 3rem;">
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">下拉列表：</label>
            <div class="col-lg-4 col-sm-9">
                <select class="form-control" name="pid">
                    <option value="0">顶级模块</option>
                    <?php if(is_array($listauth) || $listauth instanceof \think\Collection || $listauth instanceof \think\Paginator): $i = 0; $__LIST__ = $listauth;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$auth): $mod = ($i % 2 );++$i;?>
                    <option value="<?php echo $auth['id']; ?>">
                        <?php if($auth['pid'] != '0'): ?>|
                        <?php echo str_repeat("——",$auth['level']); endif; ?>
                        <?php echo $auth['title']; ?>
                    </option>
                    <?php endforeach; endif; else: echo "" ;endif; ?>
                </select>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">后台模块名</label>
            <div class="col-lg-4 col-sm-9">
                <input type="text" name="title" class="form-control" placeholder="请输入模块名称如(前台首页)">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">控制器名称：</label>
            <div class="col-lg-4 col-sm-9">
                <input type="text" name="action" class="form-control" placeholder="请输入控制器名如(admin)">
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">操作方法：</label>
            <div class="col-lg-4 col-sm-9">
                <input type="text" name="method" class="form-control" placeholder="请输入操作方法如(add)">

            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">附加规则：</label>
            <div class="col-lg-4 col-sm-9">
                <textarea name="condition" class="form-control" rows="3" placeholder="请输入附加规则，可以不写默认即可"></textarea>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">type类型：</label>
            <div class="col-lg-4 col-sm-9">
                <label class="radio-inline" for="type1">
                    <input type="radio" checked="" value="1" id="type1" name="type">标准</label>
                <label class="radio-inline" for="type2">
                    <input type="radio" value="2" id="type2" name="type">其他</label>
            </div>
        </div>
        <div class="form-group">
            <label class="col-lg-2 col-lg-offset-3 col-sm-3 control-label">开启状态：</label>
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