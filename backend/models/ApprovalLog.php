<?php

namespace app\models;

use Yii;
use yii\base\Object;

/**
 * This is the model class for table "approval_log".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $source_id
 * @property string $source_type
 * @property string $approval
 * @property string $remarks
 * @property string $created_at
 * @property string $updated_at
 */
class ApprovalLog extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'approval_log';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['user_id', 'source_id','approver'], 'integer'],
            [['source_type', 'approval'], 'required'],
            [['source_type'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['approval', 'remarks'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => '用户ID',
            'source_id' => '数据源ID',
            'source_type' => '数据来源',
            'approval' => '审批进度',
            'approver' => '审批人id',
            'remarks' => '备注',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return ApprovalLogQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ApprovalLogQuery(get_called_class());
    }
    
    public static function addLog($data){
        $model = new ApprovalLog();
        $model->setAttributes($data);
        return $model->save(false);
    }
    public static function approvallogList($sourece_id,$source_type){
        return self::find()
            ->select([User::tableName().'.username',ApprovalLog::tableName().'.remarks',ApprovalLog::tableName().'.created_at'])
            ->where(['source_id'=>$sourece_id,'source_type'=>$source_type])
            ->leftJoin(User::tableName(),User::tableName().'.id = '.ApprovalLog::tableName().'.approver')
            ->asArray()->all();
    }
}
