<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "information".
 *
 * @property string $id
 * @property string $name
 * @property string $identification
 * @property string $phone
 * @property string $towns
 * @property string $address
 * @property string $booklet
 * @property string $contract_no
 * @property integer $arrange_type
 * @property integer $permute_type
 * @property integer $house_area
 * @property integer $permute_area
 * @property integer $use_area
 * @property string $arrange_address
 * @property integer $arrange_house_total
 * @property string $arrange_root_no
 * @property integer $arrange_house_area
 * @property integer $arrange_clearing
 * @property string $arrange_delivery_time
 * @property integer $arrange_is_clearing
 * @property string $remarks
 * @property string $upload_file
 * @property string $operator
 * @property string $sign_time
 * @property string $created_at
 * @property string $updated_at
 */
class Information extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'information';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['arrange_type', 'permute_type', 'house_area', 'permute_area', 'use_area', 'arrange_house_total', 'arrange_house_area', 'arrange_clearing', 'arrange_is_clearing'], 'integer'],
            [['arrange_delivery_time', 'sign_time', 'created_at', 'updated_at'], 'safe'],
            [['name', 'identification', 'phone', 'towns', 'address', 'booklet', 'contract_no', 'arrange_address', 'arrange_root_no', 'remarks', 'upload_file', 'operator'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => '姓名',
            'identification' => '身份证号',
            'phone' => '联系电话',
            'towns' => '乡镇',
            'address' => '家庭住址',
            'booklet' => '家庭户口簿编号',
            'contract_no' => '合同号',
            'arrange_type' => '安置方式',
            'permute_type' => '置换比例',
            'house_area' => '住房屋面积（㎡）',
            'permute_area' => '用于置换面积（㎡）',
            'use_area' => '应置换面积（㎡）',
            'arrange_address' => '安置选房地点',
            'arrange_house_total' => '住房套数',
            'arrange_root_no' => '房号',
            'arrange_house_area' => '实际选择安置面积（㎡）',
            'arrange_clearing' => '选房结算后应付款（元）',
            'arrange_delivery_time' => '钥匙交付时间',
            'arrange_is_clearing' => '是否结算（0:否，1是）',
            'remarks' => '备注',
            'upload_file' => '档案资料',
            'operator' => '填报人',
            'sign_time' => '签约时间',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
