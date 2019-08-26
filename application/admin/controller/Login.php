<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
class Login extends Controller
{
    public function index(){
        session_start();
        if (!empty(session('uid'))) {
            $this->redirect('index/index');
        }elseif(request()->isPost()){
            $username = input('name');
            $password = md5(input('password'));
            $verify = input('verifyCode');
            if(!captcha_check($verify)) {
                // 校验失败
                $this->error("验证码不正确", 'Login/index');
            }
            $r = db::table('tp5_user')->where('name', $username)->find();
            if (!$r) {
                $this->error("用户名不存在",'Login/index');
            }
            $result = db::table('tp5_user')->where("name='{$username}' and password='{$password}'")->find();
            if($result){
                session('uid',$result['id']);
                session('user',$result['name']);
                session('logintime', request()->time());
                //dump($_SESSION);
                $this->success("登录成功",'index/index');
            }else{
                $this->error("登录失败,密码错误",url('Login/index'));
            }
        }
        return $this->fetch();
    }
}
