<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
use app\admin\controller\index;
class Login extends Controller
{
    public function index(){
        if (request()->isPost()){
            session_start();
            $username = input('name');
            $password = md5(input('password'));
            $r = db::table('tp5_user')->where('name', $username)->find();
            if (!$r) {
                $this->error("用户名不存在",'Login/login');
            }
            $result = db::name('user')->where("name='{$username}' and password='{$password}'")->find();
            if($result){
                session('uid',$result['id']);
                session('user',$result['name']);
                session('logintime', request()->time());
                //dump($_SESSION);
                $this->success("登录成功",'index/index');
            }else{
                $this->error("登录失败,密码错误",url('Login/index'));
            }
        }elseif (session('uid')){
            $this->redirect('index/index');
        }else {
            return $this->fetch('index',[
                'title' => '前台登录页面',
            ]);
        }
    }
    public function _empty(){
        $this->error("方法不存在，正在跳转到登录页面！",url('Login/index'));
    }
}
