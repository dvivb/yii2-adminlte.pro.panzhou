<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "flow".
 *
 * @property integer $id
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
            [['type', 'update_time'], 'required'],
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
            'name' => 'Name',
            'type' => 'Type',
            'create_time' => 'Create Time',
            'update_time' => 'Update Time',
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
