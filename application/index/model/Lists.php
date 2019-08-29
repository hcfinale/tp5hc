<?php
//在模型里单独设置数据库连接信息
namespace app\index\model;

use think\Model;
class Lists extends Model
{
    //自定义初始化
    protected function initialize(){
        parent::initialize();
    }
    //    protected $table = 'o2o_han';
	protected $name = 'list';
    protected $type = [
        'name'    =>  'varchar',
        'title'     =>  'varchar',
        'description'  =>  'varchar',
        'keyword'  =>  'varchar',
        'status'  =>  'int',
    ];
    public function selectId($id){
        $res = $this->find($id);
        return $res;
    }
    public function selectAll(){
        // 排序的时候不会全部排序因为分页问题
//        $data = $this->allowField(true)->where('status','1')->order('id desc')->paginate(8,false,['type'=>'BootstrapDetailed']);
        $data = $this->allowField(true)->where('status','1')->order('id desc')->select();
        return $this->sortTree($data);
    }
    public function sortTree($data,$pid = 0,$level = 0){
        static $arr = array();
        foreach ($data as $k => $v){
            if($v['pid']==$pid){
                $v['level'] = $level;
                $arr[] = $v;
                $this->sortTree($data,$v['id'],$level+1);
            }
        }
        return $arr;
    }
}