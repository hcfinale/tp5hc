<?php
namespace app\admin\model;

use think\Model;
class Authority extends Model
{
    protected $table = 'tp5_auth_rule';
    protected static function init(){
        Authority::event('before_update', function ($data) {
            echo "韩钩子函数";die;
            $data['name'] = $data['action']."/".$data['method'];
            unset($data['action'],$data['method']);
        });
    }
    public function authAll(){
        $data = $this->field('id,pid,name,title,type,status,condition')->select();
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
