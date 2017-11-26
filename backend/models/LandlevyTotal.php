<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landlevy_total".
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
class LandlevyTotal extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landlevy_total';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['project_id', 'periods', 'total_households','approver'], 'integer'],
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
            'approver' => '审批人id',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return LandlevyTotalQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LandlevyTotalQuery(get_called_class());
    }
    public static function getPendinglistByUserId($userId){
        return self::find()->select(
            [   LandlevyTotal::tableName().'.created_at',
                LandlevyTotal::tableName().'.updated_at',
                User::tableName().'.username',
                Projects::tableName().'.name',
                LandlevyTotal::tableName().'.sourece_type'
            ]
        )
            ->leftJoin(Projects::tableName(),Projects::tableName().'.id = '.LandlevyTotal::tableName().'.project_id')
            ->leftJoin(User::tableName(),User::tableName().'.id = '.LandlevyTotal::tableName().'.operator')
            ->where(['approver'=>$userId])
            ->andWhere(['approval'=>['1','2','3','4','5']])
            ->asArray()
            ->all();
    }
}
