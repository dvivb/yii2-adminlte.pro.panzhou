<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landlevy_detail".
 *
 * @property string $id
 * @property integer $landlevy_list_id
 * @property integer $dictionaries_id
 * @property string $subject
 * @property integer $parent_id
 * @property string $name
 * @property string $unit
 * @property string $price
 * @property string $levy_value
 * @property string $compensation_price
 * @property string $created_at
 * @property string $updated_at
 */
class LandlevyDetail extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landlevy_detail';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['landlevy_list_id', 'dictionaries_id', 'parent_id'], 'integer'],
            [['subject', 'name'], 'required'],
            [['subject'], 'string'],
            [['price', 'levy_value', 'compensation_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['unit'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'landlevy_list_id' => '土地征收汇总花名册ID',
            'dictionaries_id' => '字典表ID',
            'subject' => '主题名称',
            'parent_id' => '父级ID',
            'name' => '名称',
            'unit' => '单位',
            'price' => '补偿标准',
            'levy_value' => '征收数值',
            'compensation_price' => '补偿金额（元）',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return LandlevyDetailQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LandlevyDetailQuery(get_called_class());
    }
}
