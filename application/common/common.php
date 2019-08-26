<?php
/**
 * 发送短信
 *
 * @param string $mobile 手机号码
 * @param string $type 类型：1-用户注册验证码、2-修改密码验证码
 * @param int $create_id 操作人menber_id
 * @return bool 返回状态
 */
function smsSend($mobile, $type, $create_id, $ParamArr='')
{
    $aliSms = new \app\common\AliSms();
    return $aliSms->sendSms($mobile, $type, $create_id, $ParamArr);
}

/**
 * 通过CURL获取远程服务器数据
 * @param string $url 远程服务器URL
 * @param json $data POST数据
 * @param mixed $output 返回值
 * @param array $header 传递头部信息
 * @return mixed
 */
function dbb_curl($curr_url, $data = null, &$output, $header = null)
{
    $ch = curl_init();
    if (!$header) {
        $header = ["Accept-Charset: utf-8"];
    }
    curl_setopt($ch, CURLOPT_URL, $curr_url);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
//     curl_setopt($ch, CURLOPT_HEADER, true); //获取头部信息
    if (1 == strpos("$".$curr_url, "https://")) {
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, FALSE);
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, FALSE);
    }
    curl_setopt($ch, CURLOPT_USERAGENT, 'Mozilla/5.0 (compatible; MSIE 5.01; Windows NT 5.0)');
    if (!empty($data)){
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
    }
    $output     = curl_exec($ch);
    $errorno    = curl_errno($ch);
    curl_close($ch);
    if ($errorno) {
        return $errorno;
    }else{
        return 0;
    }
}