<?php
//在模型里单独设置数据库连接信息
namespace app\index\model;

use think\Model;
class User extends Model
{
    /**
    钩子前置操作，一个insert一个updata前置操作，after是后置操作
    protected static function init()
    {
        User::event('before_insert', function ($data) {

        });
        User::event('before_updata', function ($data) {

        });
    }
    **/
    //自定义初始化
    protected function initialize()
    {
        parent::initialize();
    }
//    protected $table = 'o2o_han';
	protected $name = 'city';
    protected $type = [
        'name'    =>  'varchar',
        'uname'     =>  'varchar',
        'status'  =>  'int',
    ];
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
    public function xixihaha(){
        $data = $this->fetchSql(true)->select();
        return $data;
    }
    public function hcinstall(){
        $list = [
            ['city'=>'河南郑州','title'=>'郑州红砖路','description'=>'河南郑州desc','keyword'=>'河南郑州key','staus'=>'0'],
            ['city'=>'河南新乡','title'=>'新乡电视塔','description'=>'新乡电视塔desc','keyword'=>'新乡电视塔key']
        ];
        $this->saveAll($list);

    }
}