<?php
namespace app\index\controller;

use think\Db;
use think\Request;
use think\Session;
use think\Cookie;

class Phpexcel extends Common{

    public function index(){

        $request = Request::instance();

        echo '请求方法：'.$request->method() . '<br/>';

        echo '资源类型：'.$request->type() . '<br/>';

        echo '访问ip：'.$request->ip() . '<br/>';

        echo '是否为ajax请求：'.var_export($request->isAjax(), true) . '<br/>';

        echo '请求参数：';
        dump($request->param());

        echo '请求参数：仅包含name';
        dump($request->only(['name']));

        echo '请求参数：排除name';
        dump($request->except(['name']));

        echo '资源类型：'.$request->type() . '<br/>';
        echo '<br/>操作：'.$request->action();
        echo '获取当前域名：'.$request->domain() . '<br/>';

        // 获取当前入口文件
        echo '获取当前入口文件：'.$request->baseFile() . '<br/>';

        // 获取当前URL地址，不含域名
        echo '获取当前URL地址，不含域名：'.$request->url() . '<br/>';

        // 获取包含域名的完整url地址
        echo '获取包含域名的完整url地址：'.$request->url(true) . '<br/>';

        // 获取URL地址 不含QUERY_STRING
        echo '获取URL地址 不含QUERY_STRING：'.$request->baseurl() . '<br/>';

        // 获取URL访问的ROOT地址
        echo '获取URL访问的ROOT地址：'.$request->root() . '<br/>';

        // 获取URL访问的ROOT地址
        echo '获取URL访问的ROOT地址 ：'.$request->root(true) . '<br/>';

        // 获取URL地址中的 PATH_INFO 信息
        echo '获取URL地址中的 PATH_INFO 信息：'.$request->pathinfo() . '<br/>';

        // 获取URL地址中的 PATH_INFO 信息，不含后缀
        echo '获取URL地址中的 PATH_INFO 信息，不含后缀：'.$request->path() . '<br/>';

        // 获取URL地址中的后缀信息
        echo '获取URL地址中的后缀信息：'.$request->ext() . '<br/>';
        Session::set('name','thinkphp');
        Cookie::set('name','thinkphp2');
        dump($request->route());
        dump($request->dispatch());
        echo Session::get('name');
    }
}
