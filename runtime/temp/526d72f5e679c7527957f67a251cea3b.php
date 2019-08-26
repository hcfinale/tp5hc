<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:28:"./tpl\index\index\index.html";i:1550729197;s:41:"E:\www\tp5hc\tpl\index\public\header.html";i:1548927475;s:41:"E:\www\tp5hc\tpl\index\public\footer.html";i:1550730116;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo $title; ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1,user-scalable=no">
	<meta name="apple-mobile-web-app-capable" content="yes">
	<meta name="apple-mobile-web-app-status-bar-style" content="black">
	<link rel="stylesheet" href="/public/index/css/mui.min.css">
	<link rel="stylesheet" href="/public/index/css/pub.css">
</head>
<body>
<div id="offCanvasWrapper" class="mui-off-canvas-wrap <mui-dragga></mui-dragga>ble">
	<!--侧滑菜单部分-->
	<aside id="offCanvasSide" class="mui-off-canvas-left">
		<div id="offCanvasSideScroll" class="mui-scroll-wrapper">
			<div class="mui-scroll">
				<div class="title">侧滑导航</div>
				<ul class="mui-table-view mui-table-view-chevron mui-table-view-inverted">
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="<?php echo url('Excel/index'); ?>">
							Excel 表格
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="<?php echo url('life/index'); ?>">
							日常功能测试页面
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="<?php echo url('Lists/index'); ?>">
							列表页面
						</a>
					</li>
					<li class="mui-table-view-cell">
						<a class="mui-navigate-right" href="<?php echo url('Article/index'); ?>">
							测试文章
						</a>
					</li>
				</ul>
			</div>
		</div>
	</aside>
	<!--主界面部分-->
	<div class="mui-inner-wrap">
		<header class="mui-bar mui-bar-nav">
			<a href="#offCanvasSide" class="mui-icon mui-action-menu mui-icon-bars mui-pull-left"></a>
			<h1 class="mui-title"><?php echo (isset($title) && ($title !== '')?$title:"首页"); ?></h1>
			<a class="mui-action-back mui-icon mui-icon-undo mui-pull-right" href="#" onclick="javascript :history.back(-1);"></a>
		</header>
		<div id="offCanvasContentScroll" class="mui-content mui-scroll-wrapper">
			<div class="mui-scroll">
				<div id="slider" class="mui-slider">
					<div class="mui-slider-group mui-slider-loop">
						<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
						<div class="mui-slider-item mui-slider-item-duplicate">
							<a href="#">
								<img src="/tpl/index/public/images/banner.jpg">
							</a>
						</div>
						<!-- 第一张 -->
						<div class="mui-slider-item">
							<a href="#">
								<img src="/tpl/index/public/images/banner.jpg">
							</a>
						</div>
						<!-- 第二张 -->
						<div class="mui-slider-item">
							<a href="#">
								<img src="/tpl/index/public/images/banner.jpg">
							</a>
						</div>
						<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
						<div class="mui-slider-item mui-slider-item-duplicate">
							<a href="#">
								<img src="/tpl/index/public/images/banner.jpg">
							</a>
						</div>
					</div>
					<div class="mui-slider-indicator">
						<div class="mui-indicator mui-active"></div>
						<div class="mui-indicator"></div>
					</div>
				</div>
				<div class="container margin-xs-1">
					<div class="mui-row">
						<div class="mui-col-sm-3 mui-col-xs-3">名字</div>
						<div class="mui-col-sm-3 mui-col-xs-3">年龄</div>
						<div class="mui-col-sm-3 mui-col-xs-3">性别</div>
						<div class="mui-col-sm-3 mui-col-xs-3">头像</div>
					</div>
					<?php if(is_array($res) || $res instanceof \think\Collection || $res instanceof \think\Paginator): $i = 0; $__LIST__ = $res;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
					<div class="mui-row">
						<div class="mui-col-sm-3 mui-col-xs-3"><?php echo $vo['name']; ?></div>
						<div class="mui-col-sm-3 mui-col-xs-3"><?php echo $vo['sex']; ?></div>
						<div class="mui-col-sm-3 mui-col-xs-3"><?php echo $vo['age']; ?></div>
						<div class="mui-col-sm-3 mui-col-xs-3"><img src='<?php echo $vo['pic']; ?>' width="40px" /></div>
					</div>
					<?php endforeach; endif; else: echo "" ;endif; if($name == '我的名字HC'): ?>
						<?php echo $name; endif; ?>
					<br />
					我的email
					<?php if($email == 'hcfinale@qq.com'): ?>
						<?php echo $email; endif; ?>
				</div>

			</div>
		</div>
		<!-- off-canvas backdrop -->
		<div class="mui-off-canvas-backdrop"></div>
	</div>
</div>
<script src="/public/index/js/mui.min.js"></script>
<script src="/public/index/js/pub.js"></script>
<script type="text/javascript">
	mui.init();
	 //主界面和侧滑菜单界面均支持区域滚动；
	mui('#offCanvasSideScroll').scroll();
	mui('#offCanvasContentScroll').scroll();
	 //实现ios平台原生侧滑关闭页面；
	if (mui.os.plus && mui.os.ios) {
		mui.plusReady(function() { //5+ iOS暂时无法屏蔽popGesture时传递touch事件，故该demo直接屏蔽popGesture功能
			plus.webview.currentWebview().setStyle({
				'popGesture': 'none'
			});
		});
	}
</script>
</body>
</html>