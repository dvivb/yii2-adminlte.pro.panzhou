<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interim_detail".
 *
 * @property string $id
 * @property string $name
 * @property string $id_number
 * @property integer $project_id
 * @property string $project_name
 * @property string $house_area
 * @property string $biz_house_area
 * @property string $amount
 * @property string $sign_time
 * @property string $start_time
 * @property string $end_time
 * @property string $created_at
 * @property string $updated_at
 */
class InterimDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interim_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['project_id'], 'integer'],
            [['house_area', 'biz_house_area', 'amount'], 'number'],
            [['sign_time', 'start_time', 'end_time', 'created_at', 'updated_at'], 'safe'],
            [['name', 'id_number', 'project_name'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '户主姓名',
            'id_number' => '身份证号',
            'project_id' => '项目编号',
            'project_name' => '项目名称',
            'house_area' => '住房面积（平方）',
            'biz_house_area' => '商业面积（平方）',
            'amount' => '金额（元）',
            'sign_time' => '签约时间',
            'start_time' => '开始时间',
            'end_time' => '结束时间',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return InterimDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InterimDetailQuery(get_called_class());
    }
}
