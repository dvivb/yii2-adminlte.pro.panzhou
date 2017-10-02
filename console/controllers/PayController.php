<?php
/*
 * 支付完成回调
 * 
 */
namespace console\controllers;

use yii\console\Controller;
use yii;
use common\services\SmsOrderModelService;
use console\services\PayService;
class PayController extends Controller
{
    public function actionTest()
    {
        yii\console\Application;
        echo date("Y-m-d H:i:s")."test";
    }
    
    /*
     *  php yii pay/pay-call-back
     * 
     */
    public function actionPayCallBack(){
      $orderSn = Yii::$app->redis->RPOP('call_back_order_sn');
//       $orderSn = '201707271744399721';
//       echo $orderSn;exit;
      if(is_null($orderSn)){
         yii::info("订单号为空",'callback');  
         return ;
      }
      while($orderSn){
          $orderInfo = SmsOrderModelService::getOrderDetailByOrderSn($orderSn);
          
          if(is_null($orderInfo)){
              yii::info($orderSn."订单信息不存在",'callback');
              return;
          }
          
          if($orderInfo->order_status != 1){
              yii::info($orderSn."订单未支付",'callback');
              return;
          }
          
          $orderArr = array();
          $orderArr['order_sn'] = $orderInfo->order_sn;
          $orderArr['order_status'] = $orderInfo->order_status;
          $orderArr['pay_sn'] = $orderInfo->pay_sn;
          $orderArr['money'] = $orderInfo->money;
          $orderArr['pay_type'] = $orderInfo->pay_type;
          $orderArr['pay_time'] = strtotime($orderInfo->pay_time);
          $sigStr = PayService::signature($orderArr);
          
          $urlStr =http_build_query($orderArr);
          $urlStr .= '&pay_check='.$sigStr;
          $urlStr = yii::$app->params['callBackUrl'].'?'.$urlStr;
          
          $callBack =  file_get_contents($urlStr);
          
          yii::info($orderSn."返回结果 \n",'callback');
          yii::info(print_r($callBack,true),'callback');
          $callBackRes = json_decode($callBack,true);
          
          if(is_null($callBackRes)){
              yii::info($orderSn."返回结果解析失败 \n",'callback');
              return;
          }
          
          if(isset($callBackRes['code']) && $callBackRes['code'] == 0){
              $orderSn = $orderInfo->order_sn;
              $data['if_callback'] =1;
              $data['callback_time'] = date('Y-m-d H:i:s',time());
              $updateRes = SmsOrderModelService::updateOrder($orderSn, $data);
          }else{
              yii::info($orderSn."返回结果参数异常 \n",'callback');
              return;
          }
          $orderSn = Yii::$app->redis->RPOP('call_back_order_sn');
      }
      
      
    }
}