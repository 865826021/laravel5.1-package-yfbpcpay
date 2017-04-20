

### Laravel 5.1 易付宝PC端支付 扩展使用教程

### 用法

```
composer require yuxiaoyang/yfbpcpay
```

或者在你的 `composer.json` 的 require 部分中添加:
```json
 "yuxiaoyang/yfbpcpay": "~1.0"
```

下载完毕之后,直接配置 `config/app.php` 的 `providers`:

```php
//Illuminate\Hashing\HashServiceProvider::class,

Yuxiaoyang\YfbpcPay\YfbpcPayProvider::class,
```
控制器中使用 `YfbpcPayController.php` :


```php

<?php


use \Yuxiaoyang\YfbpcPay\YfbpcPay;

class YfbpcPayController extends Controller
{
    public $yfbpcpay;

    //易付宝PC支付
    public function yfbpcpay()
    {
        //创建示例对象
        $this->yfbpcpay = new yfbpcpay();
        $params["out_trade_no"] = rand(1000000000,9999999999);
        $params["subject"] = "易付宝PC在线支付";
        $params["body"] = "订单详细";
        $params["total_fee"] = "0.01";
        $params["returnUrl"] = "http://www.***.com/yipcpayReturn";
        $data = $this->yfbpcpay->pay($params);
        return $data;
    }

    //易付宝PC支付回调验签
    public function yfbpcpayReturn(Request $request)
    {
        //创建示例对象
        $this->yfbpcpay = new yfbpcpay();
        $params['responseCode'] = Input::get('responseCode');
        $params['signAlgorithm'] = Input::get('signAlgorithm');//签名方式
        $params['keyIndex'] = Input::get('keyIndex');
        $params['merchantOrderNos'] = Input::get('merchantOrderNos');
        $params['signature'] = Input::get('signature');
        $data = $this->yfbpcpay->payReturn($params);
        return $data;
    }

}