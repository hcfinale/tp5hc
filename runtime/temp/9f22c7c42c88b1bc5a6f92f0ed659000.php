<?php if (!defined('THINK_PATH')) exit(); /*a:3:{s:28:"./tpl\index\lists\index.html";i:1566984567;s:41:"E:\www\tp5hc\tpl\index\public\header.html";i:1566984066;s:41:"E:\www\tp5hc\tpl\index\public\footer.html";i:1566984358;}*/ ?>
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
    <div class="mui-content">
        <div class="mui-card">
            <ul class="mui-table-view">
                <?php if(is_array($list) || $list instanceof \think\Collection || $list instanceof \think\Paginator): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
                <li class="mui-table-view-cell">
                    <a class="mui-navigate-right" href="<?php echo url('lists/lists',['id'=>$vo['id']]); ?>">
                        <?php echo $vo['name']; ?>
                    </a>
                </li>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </ul>
        </div>
    </div>
    <div style="margin: 3rem 0"></div>
			</div>
		</div>
		<!-- off-canvas backdrop -->
		<div class="mui-off-canvas-backdrop"></div>
	</div>
</div>
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
<script src="/public/index/js/mui.min.js"></script>
<script>
    var hc_page = document.getElementsByTagName('hc-page');
    hc_page.onclick = function(){
        alert("123");
    }
</script>
</html>