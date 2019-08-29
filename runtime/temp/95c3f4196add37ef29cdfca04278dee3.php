<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:28:"./tpl\admin\column\list.html";i:1515740552;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>添加栏目</title>
    <meta name="keywords" content="添加栏目">
    <meta name="description" content="添加栏目">
    <link rel="shortcut icon" href="/public/admin/favicon.ico">
    <link href="/public/admin/css/bootstrap.min.css?v=3.3.5" rel="stylesheet">
    <link href="/public/admin/css/font-awesome.min.css?v=4.4.0" rel="stylesheet">
    <link href="/public/admin/css/plugins/iCheck/custom.css" rel="stylesheet">
    <link href="/public/admin/css/animate.min.css" rel="stylesheet">
    <link href="/public/admin/css/style.min.css?v=4.0.0" rel="stylesheet"><base target="_blank">
</head>
<body>
<div class="table-responsive">
    <table class="table table-striped">
        <thead>
        <tr>
            <th></th>
            <th>栏目名称</th>
            <th>栏目状态</th>
            <th>栏目类型</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
        <tr>
            <td>
                <input type="checkbox"  class="i-checks" name="check[]">
            </td>
            <td>
                <?php if($vo['pid'] != '0'): ?>|
                <?php echo str_repeat("_",$vo['level']*4); endif; ?>
                <?php echo $vo['name']; ?>
            </td>
            <td>
                <?php if($vo['status'] == '1'): ?>
                <a onclick="clStatus(<?php echo $vo['id']; ?>)" class="btn btn-sm btn-info" target="_self">
                    开启
                </a>
                <?php else: ?>
                <a href="<?php echo url('Column/clStatus',array('id'=>$vo['id'])); ?>" class="btn btn-sm btn-danger" target="_self">
                    关闭
                </a>
                <?php endif; ?>
            </td>
            <td>
                <?php if($vo['type'] == '1'): ?>
                多页
                <?php else: ?>
                单页
                <?php endif; ?>
            </td>
            <td>
                <a href="<?php echo url('Column/edit',array('list_id'=>$vo['id'])); ?>" class="btn btn-primary" target="_self"><i class="glyphicon glyphicon-plus"></i>修改</a>
                <a href="<?php echo url('Column/del',array('list_id'=>$vo['id'])); ?>" class="btn btn-danger btn-sm demo4" onclick="return confirm('确认要删除？');"><i class="glyphicon glyphicon-remove"></i>删除</a>
            </td>
        </tr>
        <?php endforeach; endif; else: echo "" ;endif; ?>
        </tbody>
    </table>
</div>
<script src="/public/admin/js/jquery.min.js?v=2.1.4"></script>
<script src="/public/admin/js/bootstrap.min.js?v=3.3.5"></script>
<script src="/public/admin/js/plugins/peity/jquery.peity.min.js"></script>
<script src="/public/admin/js/content.min.js?v=1.0.0"></script>
<script src="/public/admin/js/plugins/iCheck/icheck.min.js"></script>
<script src="/public/admin/js/demo/peity-demo.min.js"></script>
<script>
function clStatus(listid) {
    $.ajax({
        type:"get",
        datatype:"json",
        data:{id:listid},
        url:"<?php echo url('Column/clStatus'); ?>",
        success:function(data){
            location.reload();
        },
        error:function(){
            alert("获取ajax失败");
        }
    });
}
</script>
</body>
</html>