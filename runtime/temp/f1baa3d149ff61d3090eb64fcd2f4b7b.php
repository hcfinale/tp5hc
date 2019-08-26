<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:35:"./tpl\admin\article\addarticle.html";i:1529401328;}*/ ?>
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
    <link href="/public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/public/admin/css/plugins/summernote/summernote.css" rel="stylesheet">
    <link href="/public/admin/css/plugins/summernote/summernote-bs3.css" rel="stylesheet">
    <link href="/public/admin/css/animate.min.css" rel="stylesheet">
    <link href="/public/admin/css/style.min.css?v=4.0.0" rel="stylesheet">
</head>
<body class="gray-bg">
<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-sm-12 animated fadeInRight">
            <div class="mail-box-header">
                <h2>发布文章</h2>
            </div>
            <form class="form-horizontal" action="<?php echo url('article/add'); ?>" method="post">
                <div class="mail-box">
                    <div class="mail-body">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">栏目列表：</label>
                            <div class="col-sm-10">
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
                            <label class="col-lg-2 col-sm-3 control-label">文章名：</label>
                            <div class="col-lg-6 col-sm-9">
                                <input type="text" name="title" class="form-control" placeholder="请输入文章名称">
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-3 control-label">文章描述：</label>
                            <div class="col-lg-10 col-sm-9">
                                <textarea name="description" id="" cols="80" rows="5"></textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-3 control-label">关键词：</label>
                            <div class="col-lg-6 col-sm-9">
                                <input type="text" name="keyword" class="form-control" placeholder="文章关键词">

                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-lg-2 col-sm-3 control-label">文章状态：</label>
                            <div class="col-lg-6 col-sm-9">
                                <label class="radio-inline" for="status1">
                                    <input type="radio" checked="checked" value="1" id="status1" name="status">开启</label>
                                <label class="radio-inline" for="status2">
                                    <input type="radio" value="0" id="status2" name="status">关闭</label>
                            </div>
                        </div>
                    </div>
                    <div class="mail-text h-200">
                        <div class="summernote">

                        </div>
                        <div class="clearfix"></div>
                        <input type="hidden" id = "article" name="article" value='arcdate();'>
                    </div>
                    <div class="mail-body text-right tooltip-demo">
                        <input type="submit" class="btn btn-sm btn-primary" value="发布" />
                        <input type="reset" class="btn btn-sm btn-white " value="重置" />
                    </div>
                    <div class="clearfix"></div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="/public/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/public/admin/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/public/admin/js/content.min.js?v=1.0.0"></script>
<script src="/public/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/public/admin/js/plugins/summernote/summernote.min.js"></script>
<script src="/public/admin/js/plugins/summernote/summernote-zh-CN.js"></script>
<script>
    $(document).ready(function() {
        $(".i-checks").iCheck({
            checkboxClass: "icheckbox_square-green",
            radioClass: "iradio_square-green",
        });
        $(".summernote").summernote({
            lang: "zh-CN"
        })
    });
    var edit = function() {
        $(".click2edit").summernote({
            focus: true
        })
    };
    var save = function() {
        var aHTML = $(".click2edit").code();
        $(".click2edit").destroy()
    };
    $(function () {
        $('.note-editable').blur(function () {
            $("#article").val($('.note-editable').html());
        });
    });
</script>
<script type="text/javascript" src="http://tajs.qq.com/stats?sId=9051096" charset="UTF-8"></script>
</body>
</html>