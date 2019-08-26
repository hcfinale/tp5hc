<?php
namespace app\index\controller;

use think\Controller;
use think\Db;
class User extends Controller
{
    public function index(){
        return $this->fetch();
    }
    public function adduser(){
    	/*
		//添加多条数据的时候直接用db的installAll方法即可
		$data = [
		    ['foo' => 'bar', 'bar' => 'foo'],
		    ['foo' => 'bar1', 'bar' => 'foo1'],
		    ['foo' => 'bar2', 'bar' => 'foo2']
		];
		Db::name('user')->insertAll($data);
		*/
    	$data = input('post.');
    	dump($data);
    	die;
		Db::table('user')->insert($data);
        return $this->fetch('index');
    }
}