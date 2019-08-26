<?php
namespace app\index\controller;

use think\Validate;
use think\image;

class Life extends Common
{
    private $hcnumber;
    public function index(){
        $hcnumber = rand(100000,999999);
        dump($hcnumber);
        return $hcnumber;
        //return $this->fetch();
    }
    public function hcrand(){
        
        $sum = setOrderCode();
        dump("生成订单的一个随机数字，里面包含时间戳".$sum);
    }
    public function ceshi(){
        echo "<br />输出上面的code码".$this->index();
    }
    public function test() {
        dump(\Map::getLngLat('北京昌平沙河地铁'));
        return 'singwa';
    }
    public function hcimg(){

    }
    public function map() {
        return \Map::staticimage('南京市南京南站');
    }
    public function hcxml(){
        $xmldata=<<<XML
<?xml version="1.0" encoding="UTF-8"?>
        <sms>
            <rpt>
                <mobile>15951977097</mobile>			<!--手机号码-->
                <msgid>7506751276725633025</msgid>	<!---消息ID ,对应发送的消息id-->
                <status>MA:0006</status>				<!--状态报告，DELIVRD-成功，其他-失败-->
                <time>2015-06-08 11:21:46</time>		<!--报告时间-->						<!--扩展码-->
            </rpt>
            <rpt>
                <mobile>15951977097</mobile>
                <msgid>7506751276725633026</msgid>
                <status>MA:0006</status>
                <time>2015-06-08 11:21:46</time>
            </rpt>
            <rpt>
                <mobile>15951977097</mobile>
                <msgid>7507418680283693057</msgid>
                <status>DELIVRD</status>
                <time>2015-06-08 11:59:37</time>
            </rpt>
        </sms>
XML;
        $xml = simplexml_load_string($xmldata);
        echo '手机号:',$xml->rpt->mobile."<br />";
        echo '信息:',$xml->msgid."<br />";
        echo '状态:',$xml->status."<br />";
        echo '时间:',$xml->time."<br />";
        echo "<pre>";
        print_r($xml);
        echo "</pre>";
    }
    public function sms_msheng(){
        //演示短信接口的使用
        $ms=new \Sms();
        //获取帐户余额
        //$result= $ms->getAmount();
        //$number = rand(100000,999999);
        //普通短信 ，需要人工审核，因此发送成功后可能不能立即收到
        //$result=$ms->sendTextMsg("18805141100","你的验证码是：'$number'。");

        //模板短信
        $code=rand(1000,9999);
        $result=$ms->sendTplMsg("JSM42416-0001","13851945299","@1@=$code");

        //查询状态报告
        //$result=$ms-> queryReport();

        //获取上行短信
        //$result =$ms->queryMo();


        //输出结果
        $xml = simplexml_load_string($result);
        if ($xml->mt->status=="0")
        {
            var_dump($xml);
            echo '上面解析的是$xml变量是什么<br /><br />';
            var_dump($xml->mt->msgid);
            echo '上面打印的是消息中的集合<br /><br />';
            var_dump($code);
            echo "上面是生成的验证码数字";

            //echo $xml->mt->account;//获取余额
            echo "成功";

        }else{
            echo  $xml->mt->status;
            echo  $xml->mt->msg;
        }
        //读取xml格式的返回值
        // $doc = new DOMDocument();
        // $doc->loadXML($res);
        // $states = $doc->getElementsByTagName("mt");
        // echo  $states->item(0)->nodeValue;
    }
    public function SendMailer(){
        //邮件发送功能实现
        $res= send_mail("hanchang@wanho.net","蒋斌","邮箱提醒","蒋斌您的邮箱已经被盗，如果不是本人操作，请重置你的密码");
        dump($res);
    }
    public function SendSms(){
        //根据方法来填参数即可 sendSms( $mobile, $type, $create_id )
        $returnArr = smsSend('13851752194', 1, 8);
        halt($returnArr);
    }
}
