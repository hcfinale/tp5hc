<?php
namespace app\index\controller;

use think\Controller;
use think\auth\Auth;
class Common extends Controller
{
    public function _initialize(){
        parent::_initialize();
        $res = self::getSetting();
        if ($res){
            return true;
        }else{
            echo '网站关闭了，请等系统管理员开启后在访问';
            exit;
        }
    }
    public function getSetting(){
        $res = db('option')->where('name','switch')->field('id,value,status')->cache(true,'60')->find();
        if ($res['status']=='1' && $res['value']==1){
            return true;
        }else {
            return false;
        }
    }
    public function getClassName($all = false){
        return $all
            ? get_called_class()
            : basename(str_replace('\\', '/', get_called_class()),'.php');
    }
     /**
     * 数据库字段 网页字段转换
     * 标识为数据库字段 值为浏览器提交字段
     * Power: Mikkle
     * Email：776329498@qq.com
     * @param $array   标识为数据库字段 值为浏览器提交字段
     * @param bool|false $uuid  是否追加UUID信息
     * @return array
     */
    protected function buildParam($array,$uuid=false)
    {
        $data=[];
        foreach( $array as $item=>$value ){
            $data[$item] = $this->request->param($value);
        }
        if ($uuid && isset($this->uuid)){
            $data['uuid'] = $this->uuid;
        }
        return $data;
    }
    public function _empty(){
        //把所有城市的操作解析到city方法
        echo '这是一个空操作';
    }
    public function logout(){
        // session('uid', null);
        // session('user', null);
        session_destroy();
        $this->success('退出成功', 'Login/index');
    }
}
