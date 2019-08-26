<?php
namespace app\admin\model;

use think\Model;
class Column extends Model
{
    protected $table = 'tp5_list';
    public function listtree(){
        $data = $this->select();
        return $this->sorttree($data);
    }
    public function sorttree($data,$pid = 0,$level = 0){
        static $arr = array();
        foreach ($data as $k => $v){
            if($v['pid']==$pid){
                $v['level'] = $level;
                $arr[] = $v;
                $this->sorttree($data,$v['id'],$level+1);
            }
        }
        return $arr;
    }
}
