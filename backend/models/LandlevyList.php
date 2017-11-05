<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "landlevy_list".
 *
 * @property string $id
 * @property integer $landlevy_total_id
 * @property string $land_survey_no
 * @property string $land_map_no
 * @property string $name
 * @property integer $gender
 * @property string $identification
 * @property string $phone
 * @property string $towns
 * @property string $address
 * @property string $bank_card
 * @property string $bank_name
 * @property string $upload_file
 * @property string $created_at
 * @property string $updated_at
 */
class LandlevyList extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'landlevy_list';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['landlevy_total_id', 'gender'], 'integer'],
            [['name'], 'required'],
            [['created_at', 'updated_at'], 'safe'],
            [['land_survey_no', 'land_map_no', 'name', 'identification', 'phone', 'towns', 'address', 'bank_card', 'bank_name', 'upload_file'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'landlevy_total_id' => '土地征收汇总ID',
            'land_survey_no' => '土地勘丈登记表编号',
            'land_map_no' => '地籍图号',
            'name' => '姓名',
            'gender' => '性别',
            'identification' => '身份证号',
            'phone' => '联系电话',
            'towns' => '乡镇',
            'address' => '家庭住址',
            'bank_card' => '银行账号',
            'bank_name' => '银行名称',
            'upload_file' => '档案资料',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return LandlevyListQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new LandlevyListQuery(get_called_class());
    }
}
