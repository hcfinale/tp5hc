<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
USE app\admin\model\Authority as AuthorityModel;
class Authority extends Aclcommon
{
   //  public function __construct() {
   //     parent::__construct();
   //     $auth = new AuthorityModel();
   // }
	public function lst(){
		$auth = new AuthorityModel();
		$listdata = $auth->authAll();
		$this->assign('list',$listdata);
		return $this->fetch("list");
	}
	//需要修改下面all
	public function addAuth(){
        //request()->isPost()
        if(Request::instance()->isPost()){
            $data = input('post.');
            $data['name'] = $data['action']."/".$data['method'];
            unset($data['action'],$data['method']);
            if(empty($data['name'])&&empty($data['title'])){
                $this->error('模块名、控制器名称不能为空');
            }elseif (empty($data['type'])&&empty($data['status'])) {
                $this->error('非法访问',url('lst'));
            }else{
                $v = db::name("AuthRule")->insert($data);
                if ($v){
                    $this->success('添加成功');
                }
            }
        }
        $AuthRule = new AuthorityModel();
        $listcolumn = $AuthRule->authAll();
        $this->assign("listauth",$listcolumn);
        return $this->fetch("addAuth");
    }
    public function edit(){
        //编辑上面有点小问题，就是在修改时如果选择自身就出bug，待修复
        if (request()->isPost()) {
            $data = input('post.');
            //$AuthRule = new AuthorityModel();
            //dump($data);die;
            $data['name'] = $data['action']."/".$data['method'];
            unset($data['action'],$data['method']);
            $res = db('AuthRule')->update($data);
            //$request = db('AuthRule')->update($data);
            if($res){
                $this->success('修改成功', url('lst'));    
            }else{
                $this->error('修改失败', url('lst'));
            }
        }

        $auth_id = input('auth_id');
        if (!$auth_id) {
            $this->error('参数错误');
        }
        $request = db('AuthRule')->find($auth_id);
        $column = new AuthorityModel();
        $listcolumn = $column->authAll();
        $this->assign('request', $request);
        $this->assign("listcolumn",$listcolumn);
        return $this->fetch("edit");
    }
    public function del(){
        $auth_id = input('auth_id');
        if (!$auth_id) {
            $this->error('参数错误');
        }
        $request = db('AuthRule')->where('id',$auth_id)->delete();
        if($request){
            $this->success('删除成功',url('lst'));
        }
    }
    public function clStatus(){
        $statusid = input('id');
        $status = Db::name('AuthRule')->field('id,status')->find($statusid);
        if($status['status']==0){
            Db::name('AuthRule')->where('id', $statusid)->update(['status' => '1']);
            $this->redirect('Authority/lst');
        }else{
            Db::name('AuthRule')->where('id', $statusid)->update(['status' => '0']);
            $this->redirect('Authority/lst');
        }
    }
}