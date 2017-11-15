<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "interim_list".
 *
 * @property string $id
 * @property integer $project_id
 * @property string $project_name
 * @property string $total_area
 * @property string $total_amount
 * @property string $remarks
 * @property string $operator
 * @property string $approval
 * @property string $grant_time
 * @property string $created_at
 * @property string $updated_at
 */
class InterimList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'interim_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'integer'],
            [['total_area', 'total_amount'], 'number'],
            [['approval'], 'required'],
            [['grant_time', 'created_at', 'updated_at'], 'safe'],
            [['project_name', 'remarks', 'operator', 'approval'], 'string', 'max' => 100],
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
            'project_name' => '项目名称',
            'total_area' => '总面积（平方）',
            'total_amount' => '总金额（元）',
            'remarks' => '备注',
            'operator' => '填报人',
            'approval' => '审批进度',
            'grant_time' => '发放时间',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return InterimListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new InterimListQuery(get_called_class());
    }
}
