<?php
namespace app\index\controller;

// use FontLib\Table\Type\name;
use think\Db;
use think\Request;
class Lists extends Common
{
    private  $obj;
    public function _initialize(){
        parent::_initialize();
        $this->obj = model("Lists");
    }
    public function index(){
        $res =  $this->obj->selectAll();
        $title = "栏目列表";
        return $this->fetch('index',[
            'list' => $res,
            'title' => $title,
        ]);
    }
    public function lists($id){
        $res = model('article')->where('pid',$id)->paginate(15,false,[
            'type'=>'BootstrapDetailed'
        ]);
        // $res = Db::name('article')->where('pid',$id)->paginate(15,false,[
        //     'type'=>'BootstrapDetailed'
        // ]);
        $ListName = "列表页";
        return $this->fetch('list',[
            'list' => $res,
            'ListName' => $ListName,
        ]);
    }
    /**
    protected $beforeActionList = [
        'first',                                //在执行所有方法前都会执行first方法
        'second' =>  ['except'=>'index'],       //除hello方法外的方法执行前都要先执行second方法
        'three'  =>  ['only'=>'hello,data'],    //在hello/data方法执行前先执行three方法
    ];
    public function first(){
        echo "<br /><br />this is first fun<br />";
    }
    public function second(){
        echo "<br /><br />not index execute fun<br />";
    }
    public function three(){
        echo "<br /><br />only hello function and data function execute before execute this fun<br />";   
    }

    **/
}
