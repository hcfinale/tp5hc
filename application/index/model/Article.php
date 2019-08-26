<?php
//在模型里单独设置数据库连接信息
namespace app\index\model;

use think\Model;
class Article extends Model
{
    //自定义初始化
    protected function initialize()
    {
        parent::initialize();
    }
    //    protected $table = 'o2o_han';
	protected $name = 'article';
    protected $type = [
        'title'     =>  'varchar',
        'description'  =>  'varchar',
        'keyword'  =>  'varchar',
        'article'   =>  'longtext',
        'status'  =>  'int',
    ];
    public function selectId($id = 0){
        $res = $this->find($id);
        return $res;
    }
    public function selectAll(){
        $res = $this->paginate(2,false);
        return $res;
    }
}