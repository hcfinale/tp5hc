<?php
namespace app\admin\controller;

use Flc\Dysms\Client;
use Flc\Dysms\Request\SendSms;
class ShortMassage extends Aclcommon
{
	public function note(){
		$config = [
		    'accessKeyId'    => 'LTAIbVA2LRQ1tULr',
		    'accessKeySecret' => 'ocS48RUuyBPpQHsfoWokCuz8ZQbGxl',
		];

		$client  = new Client($config);
		$sendSms = new SendSms;
		$sendSms->setPhoneNumbers('15000000000');
		$sendSms->setSignName('能收到吗，收到回复13851752194，谢谢');
		$sendSms->setTemplateCode('SMS_77670013');
		$sendSms->setTemplateParam(['code' => rand(100000, 999999)]);
		$sendSms->setOutId('demo');

		print_r($client->execute($sendSms));
	}
}