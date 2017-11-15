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
            [['flow_id', 'user_id', 'pid'], 'integer'],
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
}
