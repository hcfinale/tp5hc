<?php
namespace app\index\controller;

use app\common\model\han;
use think\Db;
use think\config;
use think\Request;
use app\index\model\User as UserModel;
class Index extends Common
{
    public function index(){
        $data = [];
        $column = db('list')->where('status',1)->select();
        foreach ($column as $k => $val) {
            $data[$k] = $val;
            $data[$k]['arc'] = db('article')->where(['status'=>'1','pid'=>$val['id']])->select();
        }
        return $this->fetch('index',[
                'title' => '首页',
                'data'   =>  $data,
        ]);
    }
    public function xixi(){
        $han = new UserModel();
        return $han->xixihaha();
        /*
        $han->hcinstall();
        //根据id更新操作
        $han->save([
            'city'=>'北京',
            'title'=>'习大大',
            'description'=>'中国梦',
            'keyword'=>'梦之蓝，天之蓝',
            'staus'=>'0'
        ],['id' => 4]);
        //过滤post过来的非数据库中的字段数据
        $han->allowField(true)->save($_POST,['id' => 1]);
        //根据条件删除数据
        $han->where('id','>',5)->delete();
        echo '<pre>';
        var_dump($res);
        echo '</pre>';
        //json序列化，把id为1的数据查询出来并显示为json格式
        $res = json_encode($han->get(1));
        echo $res;
        */
    }
    public function conf(){
        config::set([
            '配置参数11'=>'配置值11',
            '配置参数22'=>'配置值22'
        ]);
        // 或者使用助手函数
        config([
            '配置参数1'=>'配置值1',
            '配置参数2'=>'配置值2'
        ]);
        echo config::get("配置参数22");
        return config('default_return_type');
    }
    public function SendMailer(){
        //邮件发送功能实现
        $res= send_mail("hanchang@wanho.net","蒋斌","邮箱提醒","蒋斌您的邮箱已经被盗，如果不是本人操作，请重置你的密码");
        dump($res);
    }
    public function dbsql(){
        /*
        $sql = Db::name('article')->where('id',1)->find();
        $sql = Db::name('article')->select();
        $sql = Db::name('article')->where('id','neq',2)->select();

        $sql = Db::table('tp5_article')->insert(
            ['id'=>1,'pid'=>0,'title'=>"sql单条插入",'description'=>"sql单条描叙",'keyword'=>"sql单条关键词",'article'=>"sql单条内容",'status'=>1]
        );
        $sql = Db::table('tp5_article')->insertAll([
            ['id'=>3,'pid'=>0,'title'=>"sql多条插入",'description'=>"sql多条描叙",'keyword'=>"sql多条关键词",'article'=>"sql多条内容",'status'=>1],
            ['id'=>4,'pid'=>0,'title'=>"sql多条插入",'description'=>"sql多条描叙",'keyword'=>"sql多条关键词",'article'=>"sql多条内容",'status'=>1]
        ]);
        //数据删除操作
        $sql = Db::name('article')->where('id',3)->delete();
        //数据更新操作

        $sql = Db::name('article')->where('id',2)->fetchSql(true)->update(
            ['pid'=>1,'title'=>"数据更新操作",'description'=>"呵呵呵呵，不知道成功了没有"]
        );
        $sql = Db::table('tp5_article')->fetchSql(true)->where('id>0')->min('id');
        //where条件查询
        $sql = Db::table('tp5_article')->where('id','>',1)->where('name','thinkphp')->fetchSql(true)->select();
        //join和数据表别名查询
        $sql = Db::table('tp5_article')->alias('a')->join('__user__ b ','b.user_id= a.id')->fetchSql()->select();
        $sql = Db::query('select id,pid,title as tt,description as des,keyword as ke from tp5_article where id > 2;');
        var_dump($sql);
        */
    }
    public function hcredis(){
        // $redis = new redis();
        echo phpinfo();
    }
}
