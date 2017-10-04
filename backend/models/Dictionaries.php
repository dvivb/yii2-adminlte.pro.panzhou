<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "dictionaries".
 *
 * @property string $id
 * @property string $subject
 * @property integer $parent_id
 * @property string $name
 * @property string $unit
 * @property string $price
 * @property string $remarks
 * @property integer $sort
 * @property string $created_at
 * @property string $updated_at
 */
class Dictionaries extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'dictionaries';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['subject', 'name'], 'required'],
            [['subject'], 'string'],
            [['parent_id', 'sort'], 'integer'],
            [['price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'remarks'], 'string', 'max' => 255],
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
            'subject' => '主题名称',
            'parent_id' => '父级ID',
            'name' => '名称',
            'unit' => '单位',
            'price' => '补偿标准',
            'remarks' => '备注',
            'sort' => '排序',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return DictionariesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DictionariesQuery(get_called_class());
    }
}
