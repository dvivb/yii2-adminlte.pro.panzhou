<?php

namespace backend\modules\member\services;

use yii\base\Object;
use app\models\Member;
/**
 * Default controller for the `project` module
 */
class MemberService{
    /**
     * 
     * @param  $memberId int
     * @return boolen
     */
    public static function delMemeberById($memberId){
        $memberModel = Member::find()->where(['id'=>$memberId])->one();
        if(is_null($memberModel) || empty($memberModel)){
            return false;
        }
        $memberModel->setAttributes(['state'=>1]);
        return $memberModel->save(false);
    }        
}