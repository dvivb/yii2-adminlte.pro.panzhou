<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flow".
 *
 * @property string $id
 * @property string $name
 * @property integer $type
 * @property string $create_time
 * @property string $update_time
 */
class Flow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'flow';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type'], 'required'],
            [['type'], 'integer'],
            [['create_time', 'update_time'], 'safe'],
            [['name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '流程名称',
            'type' => '1房屋2征收补偿款，3土地',
            'create_time' => 'Create Time',
            'update_time' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return FlowQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new FlowQuery(get_called_class());
    }
}
