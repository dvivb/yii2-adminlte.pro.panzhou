<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "houselevy_total".
 *
 * @property string $id
 * @property integer $project_id
 * @property integer $periods
 * @property integer $total_households
 * @property string $total_area
 * @property string $total_amount
 * @property string $operator
 * @property string $approval
 * @property string $created_at
 * @property string $updated_at
 */
class HouselevyTotal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'houselevy_total';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'periods', 'total_households'], 'integer'],
            [['total_area', 'total_amount'], 'number'],
            [['approval'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['operator', 'approval'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => '项目编号',
            'periods' => '期数',
            'total_households' => '总户数',
            'total_area' => '总面积（平方）',
            'total_amount' => '总金额（元）',
            'operator' => '填报人',
            'approval' => '审批进度',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return HouselevyTotalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new HouselevyTotalQuery(get_called_class());
    }
}
