<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------

// 应用公共文件
// 清楚缓存数据函数

function delDir($dirpath){
    $dh=opendir($dirpath);
    while (($file=readdir($dh))!==false) {
        if($file!="." && $file!="..") {
            $fullpath=$dirpath."/".$file;
            if(!is_dir($fullpath)) {
                unlink($fullpath);
            } else {
                delDir($fullpath);
                @rmdir($fullpath);
            }
        }
    }    
    closedir($dh);
    $isEmpty = true;
    $dh=opendir($dirpath);
    while (($file=readdir($dh))!== false) {
        if($file!="." && $file!="..") {
            $isEmpty = false;
            break;
        }
    }
    return $isEmpty;
}
//截取控制器函数
function str_action($data){
    $num = strpos($data, '/');
    if($num){
        $method = substr($data, 0 , $num);
    }else
    $method = substr($data, $data.length());
    return $method;
}
function str_method($data){
    $num = strpos($data, '/');
    $action = substr($data, $num+1);
    return $action;
}
//百度地图
function doCurl($url, $type=0, $data=[]) {
    $ch = curl_init(); // 初始化
    // 设置选项
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HEADER,0);

    if($type == 1) {
        // post
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }

    //执行并获取内容
    $output = curl_exec($ch);
    // 释放curl句柄
    curl_close($ch);
    return $output;
}
/**
function show($status, $message='' , $data=[]) {
    return [
        'status' => intval($status),
        'message' => $message,
        'data' => $data,
    ];
}
*/