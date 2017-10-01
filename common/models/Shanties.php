<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "shanties".
 *
 * @property string $id
 * @property string $name
 * @property string $address
 * @property integer $house_total
 * @property integer $house_area
 * @property integer $house_month_total
 * @property integer $house_year_total
 * @property integer $house_year_area
 * @property integer $house_amount
 * @property integer $house_amount_area
 * @property integer $house_surplusr_amount
 * @property integer $biz_house_total
 * @property integer $biz_house_area
 * @property integer $biz_house_month_total
 * @property integer $biz_house_year_total
 * @property integer $biz_house_year_area
 * @property integer $biz_house_amount
 * @property integer $biz_house_amount_area
 * @property integer $biz_house_surplusr_amount
 * @property string $remarks
 * @property string $operator
 * @property string $created_at
 * @property string $updated_at
 */
class Shanties extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'shanties';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'address'], 'required'],
            [['house_total', 'house_area', 'house_month_total', 'house_year_total', 'house_year_area', 'house_amount', 'house_amount_area', 'house_surplusr_amount', 'biz_house_total', 'biz_house_area', 'biz_house_month_total', 'biz_house_year_total', 'biz_house_year_area', 'biz_house_amount', 'biz_house_amount_area', 'biz_house_surplusr_amount'], 'integer'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'address', 'remarks', 'operator'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '项目名称',
            'address' => '地址',
            'house_total' => '住房套数',
            'house_area' => '住房面积',
            'house_month_total' => '本月（套）',
            'house_year_total' => '本年度（套）',
            'house_year_area' => '本年度累计面积(平面)',
            'house_amount' => '总累计（套）',
            'house_amount_area' => '总累计（平方）',
            'house_surplusr_amount' => '剩余套数',
            'biz_house_total' => '商业间数',
            'biz_house_area' => '商业面积',
            'biz_house_month_total' => '本月（套）',
            'biz_house_year_total' => '本年度（套）',
            'biz_house_year_area' => '本年度累计面积(平面)',
            'biz_house_amount' => '总累计（套）',
            'biz_house_amount_area' => '总累计（平方）',
            'biz_house_surplusr_amount' => '剩余套数',
            'remarks' => '备注',
            'operator' => '填报人',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
