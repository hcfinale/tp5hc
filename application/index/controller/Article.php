<?php
namespace app\index\controller;

use think\Db;
use think\Request;
class Article extends Common
{
    private  $obj;
    public function _initialize(){
        $this->obj = model("Article");
    }
    public function index($id = ''){
        if (empty($id)){
            return $this->error('文章不存在');
        }
        $res = $this->obj->selectId($id);
        $ListName = "文章";
        return $this->fetch('index',[
            'arc' => $res,
            'ListName' => $ListName,
        ]);
    }
}
