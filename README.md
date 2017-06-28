助通科技SMS平台接口
-------------------
这是一个为助通科技SMS平台接口写的一个yii2扩展程序，可以更方便的使用助通科技SMS短信接口

**安装**

使用`composer`安装

``` php
	composer require mitang1378/ztsms
```
**配置**

配置common/config/main.php文件

``` php
'components' => [
...
'sms' => [
			'class' => \mitang1378\ztsms\ZtSend::class,
			'username' => '用户名',
			'password' => '密码',
			'sign' => '签名'
		],
...
]
```
**使用**
``` php
Yii::$app->sms->send_sms('手机号','短信内容','产品ID')
```
---------
如果在使用的过程中发现问题请 issues .**Thanks!**
