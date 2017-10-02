<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "residentials".
 *
 * @property string $id
 * @property string $name
 * @property string $house_name
 * @property string $address
 * @property integer $house_total
 * @property integer $house_area
 * @property integer $suite_area
 * @property integer $house_month_total
 * @property integer $house_year_total
 * @property integer $house_year_area
 * @property integer $house_amount
 * @property integer $house_surplusr_amount
 * @property string $remarks
 * @property string $operator
 * @property string $finished_time
 * @property string $created_at
 * @property string $updated_at
 */
class Residentials extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'residentials';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['house_total', 'house_area', 'suite_area', 'house_month_total', 'house_year_total', 'house_year_area', 'house_amount', 'house_surplusr_amount'], 'integer'],
            [['finished_time', 'created_at', 'updated_at'], 'safe'],
            [['name', 'house_name', 'address', 'remarks', 'operator'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '开发商名称',
            'house_name' => '房源名称',
            'address' => '地址',
            'house_total' => '住房套数',
            'house_area' => '住房面积',
            'suite_area' => '套房面积',
            'house_month_total' => '本月（套）',
            'house_year_total' => '本年度（套）',
            'house_year_area' => '本年度累计面积(平面)',
            'house_amount' => '总累计（套）',
            'house_surplusr_amount' => '剩余套数',
            'remarks' => '备注',
            'operator' => '填报人',
            'finished_time' => '交房时间',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return ResidentialsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ResidentialsQuery(get_called_class());
    }
}
