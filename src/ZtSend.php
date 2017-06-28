<?php
namespace mitang1378\ztsms;

use linslin\yii2\curl;

class ZtSend{

  public $username;

  public $password;

  public $sign;

  public function __construct($username,$password,$sign)
   {
     $this->username = $username;
     $this->password = $password;
     $this->sign     = $sign;
   }

  public function send_sms($mobile,$content,$productid) {
    $url = "http://www.ztsms.cn/sendNSms.do";
    $tkey = date('YmdHis',time());
    $password = md5(md5($this->password).$tkey);
    $data = [
      'username' => $this->username,
      'password' => $password,
      'tkey' => $tkey,
      'mobile' => $mobile,
      'content' => $content."【{$this->sign}】",
      'productid' => $productid,
      'xh' => ''
    ];
    return $this->send($url, $data);
  }

  public function balance()
  {
    $url = "http://www.ztsms.cn/balanceN.do";
    $tkey = date('Ymdhis',time());
    $password = md5(md5($this->password).$tkey);
    $data = [
      'username' => $this->username,
      'password' => $this->password,
      'tkey' => $tkey
    ];
    return $this->send($url, $data);
  }

  public function send($url,$data)
  {
    $curl = new curl\Curl();
    $response = $curl->setPostParams($data)->post($url);
    return $response;
  }

}
