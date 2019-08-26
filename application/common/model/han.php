<?php
/**
 * Created by PhpStorm.
 * User: wuh
 * Date: 2018/5/18
 * Time: 9:09
 */
namespace app\common\model;

use think\Model;

class han extends Model{
    protected $table = 'o2o_han';
    protected $connection = [
        // 数据库类型
        'type'        => 'mysql',
        // 服务器地址
        'hostname'    => '127.0.0.1',
        // 数据库名
        'database'    => 'o2o',
        // 数据库用户名
        'username'    => 'hc',
        // 数据库密码
        'password'    => 'hc123456',
        // 数据库编码默认采用utf8
        'charset'     => 'utf8',
        // 数据库调试模式
        'debug'       => false,
        //数据库表前缀
        'prefix'      => 'o2o_',
    ];
    public function show($id) {
        return $this->where('id' , $id)->find();
    }
}