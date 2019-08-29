<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:18:"./public/jump.html";i:1567042619;}*/ ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <script src="https://cdn.bootcss.com/jquery/3.4.1/jquery.min.js"></script>
</head>
<body>
<style>
    .system-message{
        width: 300px;
        height: 100px;
        border: 1px solid #dedede;
        position: absolute;
        top: 50%;
        left: 50%;
        transform: translate(-50%,-90%);
    }
</style>
<!--
* $msg 待提示的消息
* $url 待跳转的链接
* $time 弹出维持时间（单位秒）
* icon 这里主要有两个layer的表情，5和6，代表（哭和笑）
-->
<div class="system-message">
    <?php switch ($code) {case 1:?>
    <h1 class="success"><?php echo(strip_tags($msg));?></h1>
    <?php break;case 0:?>
    <h1 class="error"><?php echo(strip_tags($msg));?></h1>
    <?php break;} ?>
    <p class="detail"></p>
    <p class="jump">
        页面自动 <a id="href" href="<?php echo($url);?>">跳转</a> 等待时间： <b id="wait"><?php echo($wait);?></b>
    </p>
</div>
<script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),
            href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time <= 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1000);
    })();
</script>
</body>
</html>