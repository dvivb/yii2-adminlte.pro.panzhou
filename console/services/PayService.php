<?php
namespace console\services;
use yii;
class PayService{
    public static  function signature(array $data){
        if(empty($data))return false;
    
        $key        =  yii::$app->params['secret_key'];//私钥
        ksort($data);
        $strTmp     =  http_build_query($data);
        $signatueTmp=  md5($strTmp.$key);
        return $signatueTmp ;
        /**
         * order_sn 1010000
         * sms_package_id 1
         * sms_number 1000
         * money 100
         * pay_check e2f975889a6d9a00fd7d2ce1e16731d3
         */
    }
}