<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flow_detail".
 *
 * @property string $id
 * @property integer $flow_id
 * @property integer $user_id
 * @property integer $pid
 * @property string $update_time
 */
class FlowDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flow_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['flow_id', 'user_id', 'pid','status'], 'integer'],
            [['update_time'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'flow_id' => 'Flow ID',
            'user_id' => 'User ID',
            'status'=>'status',
            'pid' => '流程deitailid，上一级审批信息',
            'update_time' => 'Update Time',
        ];
    }

    /**
     * @inheritdoc
     * @return FlowDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlowDetailQuery(get_called_class());
    }
    public static function getUserIdsByFlowId($flowid){
        $idsArr =  self::find()->select(['user_id'])->where(['flow_id'=>$flowid])->orderBy('pid')->asArray()->all();
        if(empty($idsArr) || is_null($idsArr)){
            return [];
        }else{
            return array_column($idsArr,'user_id');
        }
    }
    public static function getUserDetailsByFlowId($flowid){
        return  self::find()->select(['user_id','username'])->where(['flow_id'=>$flowid])->orderBy('pid')
            ->leftJoin(User::tableName(),User::tableName().'.id = '.FlowDetail::tableName().'.user_id')
            ->asArray()->all();

    }
    public static function delUserDetailByFlowId($flowid){
        return self::deleteAll(['flow_id'=>$flowid]);
    }
    public static function getFlowSecondUserIdByFlowId($flowId){
        return self::find()->where(['flow_id'=>$flowId,'pid'=>0])->asArray()->one();
    }
    public static function getFlowNextUserIdByFlowIdAndUserId($flowId,$userId){
        $model = self::find()->where(['flow_id'=>$flowId,'user_id'=>$userId])->asArray()->one();
        if(empty($model))return false;
        $modelN = self::find()->where(['flow_id'=>$flowId,'pid'=>$model['id']])->asArray()->one();
        return $modelN;
    }
}
