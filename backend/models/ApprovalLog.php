<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "approval_log".
 *
 * @property string $id
 * @property integer $user_id
 * @property integer $source_id
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
            [['user_id', 'source_id'], 'integer'],
            [['approval'], 'required'],
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
            'approval' => '审批进度',
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
}
