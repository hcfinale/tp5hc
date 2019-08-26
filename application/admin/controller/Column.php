<?php
namespace app\admin\controller;

use think\Controller;
use think\Db;
use think\Request;
use app\admin\model\Column as ColumnModel;
class Column extends Aclcommon
{
    public function lst(){
        $column = new ColumnModel();
        $listcolumn = $column->listtree();
        $this->assign("list",$listcolumn);
     	return $this->fetch('list');
    }
    public function addlist(){
        //request()->isPost()
        if(Request::instance()->isPost()){
            $data = input('post.');
            if(empty($data['name'])){
                $this->error('栏目名称不能为空');
            }else{
                $v = db::name("list")->insert($data);
                if ($v){
                    $this->success('添加成功',url('lst'));
                }
            }
        }
        $column = new ColumnModel();
        $listcolumn = $column->listtree();
        $this->assign("listcolumn",$listcolumn);
        return $this->fetch("addlist");
    }
    public function edit(){
        //编辑上面有点小问题，就是在修改时如果选择自身就出bug，待修复
         if (request()->isPost()) {
            $data = input('post.');
            $request = db('list')->update($data);
            if($request){
                $this->success('修改成功', url('lst'));    
            }else{
                $this->error('修改失败', url('lst'));
            }
        }

        $list_id = input('list_id');
        if (!$list_id) {
            $this->error('参数错误');
        }
        $request = db('list')->find($list_id);
        $column = new ColumnModel();
        $listcolumn = $column->listtree();
        $this->assign('request', $request);
        $this->assign("listcolumn",$listcolumn);
        return $this->fetch("edit");
    }
    public function del(){
        $list_id = input('list_id');
        if (!$list_id) {
            $this->error('参数错误');
        }
        $request = db('list')->where('id',$list_id)->delete();
        if($request){
            $this->success('删除成功',url('lst'));
        }
    }
    public function clStatus(){
        $statusid = input('id');
        $status = Db::name('list')->field('id,status')->find($statusid);
        if($status['status']==0){
            Db::name('list')->where('id', $statusid)->update(['status' => '1']);
            $this->redirect('Column/lst');
        }else{
            Db::name('list')->where('id', $statusid)->update(['status' => '0']);
            $this->redirect('Column/lst');
        }
    }
}