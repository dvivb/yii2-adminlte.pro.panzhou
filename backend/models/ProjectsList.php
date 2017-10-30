<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects_list".
 *
 * @property integer $id
 * @property integer $project_id
 * @property integer $household
 * @property string $area
 * @property string $amount
 * @property integer $state
 * @property integer $status
 * @property integer $type
 * @property string $created_at
 * @property string $updated_at
 */
class ProjectsList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id'], 'required'],
            [['project_id', 'household', 'state', 'status', 'type'], 'integer'],
            [['amount'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['area'], 'string', 'max' => 10],
            
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'project_id' => '项目ID',
            'household' => '总户数',
            'area' => '总面积',
            'amount' => '金额',
            'state' => '状态',
            'status' => '审批进度',
            'type' => 'Type',
            'created_at' => '制表时间',
            'updated_at' => '更新时间',
            'start_at' =>'时间搜索'
        ];
    }
}
