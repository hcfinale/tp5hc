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
    public function index($id){
        $res = $this->obj->selectId($id);
        $ListName = "文章";
        return $this->fetch('index',[
            'arc' => $res,
            'ListName' => $ListName,
        ]);
    }
}
