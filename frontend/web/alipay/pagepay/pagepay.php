<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html>
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<title>支付</title>
</head>
<?php
error_reporting(E_ALL);
require_once dirname(dirname(__FILE__)).'/config.php';
require_once dirname(__FILE__).'/service/AlipayTradeService.php';
require_once dirname(__FILE__).'/buildermodel/AlipayTradePagePayContentBuilder.php';
// $db = LtObjectUtil::singleton('LtDb');
// try{
// //     $db = LtObjectUtil::singleton('LtDb');
//     var_dump($db);exit;
// // var_dump($db->getTableGateway('t_bill'));
// }catch(Exception $e){
//     echo $e->getMessage();
// }
// exit;




    //商户订单号，商户网站订单系统中唯一订单号，必填
//     $out_trade_no = trim($_POST['WIDout_trade_no']);
    $out_trade_no = 11111111;

    //订单名称，必填
//     $subject = trim($_POST['WIDsubject']);
    $subject = 'dempo';

    //付款金额，必填
//     $total_amount = trim($_POST['WIDtotal_amount']);
    $total_amount = 1;

    //商品描述，可空
    $body =''; //trim($_POST['WIDbody']);

	//构造参数
	$payRequestBuilder = new AlipayTradePagePayContentBuilder();
	$payRequestBuilder->setBody($body);
	$payRequestBuilder->setSubject($subject);
	$payRequestBuilder->setTotalAmount($total_amount);
	$payRequestBuilder->setOutTradeNo($out_trade_no);
	try{
    	$aop = new AlipayTradeService($config);
	}catch (Exception $e){
	    echo $e->getMessage();
	}
	
	/**
	 * pagePay 电脑网站支付请求
	 * @param $builder 业务参数，使用buildmodel中的对象生成。
	 * @param $return_url 同步跳转地址，公网可以访问
	 * @param $notify_url 异步通知地址，公网可以访问
	 * @return $response 支付宝返回的信息
 	*/
	$response = $aop->pagePay($payRequestBuilder,$config['return_url'],$config['notify_url']);

	//输出表单
	var_dump($response);
?>
</body>
</html>