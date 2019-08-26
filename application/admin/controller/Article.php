<?php
namespace app\admin\controller;

use think\Db;
use think\Request;
use app\admin\model\Column as ColumnModel;
class Article extends Aclcommon
{
    public function lst(){
        $rows = Db::name('article')->order('id desc')->paginate(5,false,['query'=>request()->param()]);
        // $arclist = model('article')->select();
        return $this->fetch('list',[
            // 'arclist'=> $arclist,
            'rows' => $rows,
        ]);
    }
    public function search (){
        $search = request()->param('search');
        $rows = Db::name('article')->where('title','like','%'.$search.'%')->order('id desc')->paginate(5,false,['query'=>array('search' => $search)]);
        return $this->fetch('search',[
            // 'arclist'=> $arclist,
            'rows' => $rows,
        ]);
    }
    public function addarticle(){
        $column = new ColumnModel();
        $listcolumn = $column->listtree();
        $this->assign("listcolumn",$listcolumn);
        return $this->fetch();
    }
    public function add(){
        //request()->isPost()
        if(Request::instance()->isPost()){
            $data = input('post.');
            if ($data['pid']==0){
                $this->error('请选择文章所在栏目');
            }elseif(empty($data['title'])||$data['title'] == ''){
                $this->error('文章标题不能为空');
            }else{
                $arc = model("article");
                $arc->data([
                    'pid' => $data['pid'],
                    'title' => $data['title'],
                    'description' => $data['description'],
                    'keyword' => $data['keyword'],
                    'article' => $data['article'],
                    'status' => $data['status'],
                ]);
                $v = $arc->save();
                if ($v){
                    $this->success('添加成功');
                }else
                $this->error('插入失败');
            }
        }
        $this->redirect('article/addarticle');
    }
    public function edit(){
        //编辑上面有点小问题，就是在修改时如果选择自身就出bug，待修复
        if (request()->isPost()) {
            $data = input('post.');
            $request = model("article")->save($data);
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
        $status = Db::name('article')->field('id,status')->find($statusid);
        if($status['status']==0){
            Db::name('list')->where('id', $statusid)->update(['status' => '1']);
            $this->redirect('article/lst');
        }else{
            Db::name('list')->where('id', $statusid)->update(['status' => '0']);
            $this->redirect('article/lst');
        }
    }
}