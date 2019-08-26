<?php
namespace app\admin\controller;

use think\Controller;
use think\auth\Auth;
class Aclcommon extends Controller
{
	public function _initialize(){
        $module = request()->module();
        $controller = request()->controller();
        $action = request()->action();
        $auth = new Auth();
		if(!session('uid') || request()->time() - session('logintime') > 8*60*60){
            session_destroy();
            $this->error('非法访问,请重新登录','Login/index');
        }elseif(session('uid') == '1') {
            return true;
        }
        if(!$auth->check($module.'/'.$controller . '/' . $action, session('uid'))){
            $this->error('你没有权限访问','Index/info');
        }
	}
	
	public function _empty(){
        //把所有城市的操作解析到city方法
        echo '这是一个空操作<br />没有这个操作方法';
        // $this->error('没有这个操作方法');
    }
	/*
	public function __call($method,$arg){    
		echo '不存在的方法',$method,'方法<br/>';    
		echo '不存在方法中有参数传入<br/>';
		echo print_r($arg),'<br/>';    
	}
	*/
    public function cache(){
        $path = RUNTIME_PATH;
        delDir($path);
        $this->success('清除缓存成功',url('Index/info'));
    }
    public function logout()
    {
        session('uid', null);
        session('user', null);
        $this->success('退出成功', 'Login/index');
    }
}
