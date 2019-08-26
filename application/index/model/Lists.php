<?php
//在模型里单独设置数据库连接信息
namespace app\index\model;

use think\Model;
class Lists extends Model
{
    //自定义初始化
    protected function initialize()
    {
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
        // $res = $this->order('listorder desc')->paginate(2,false,['query'=>request()->param()]);
        $res = $this->order('listorder desc')->paginate(2,false,['type'=>'BootstrapDetailed']);
        $count = $this->alias('l')->join('__ARTICLE__ a','l.id = a.pid')->count();
        return $res;
    }
}