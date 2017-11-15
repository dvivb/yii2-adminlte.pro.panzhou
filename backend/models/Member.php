<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "member".
 *
 * @property integer $id
 * @property integer $projectlist_id
 * @property string $name
 * @property integer $sex
 * @property string $village
 * @property string $card_no
 * @property string $mobile
 * @property string $address
 * @property string $account
 * @property string $bank
 * @property integer $state
 * @property string $created_at
 * @property string $updated_at
 */
class Member extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'member';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['projectlist_id', 'sex', 'state'], 'integer'],
            [['address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'village', 'card_no', 'account'], 'string', 'max' => 50],
            [['mobile'], 'string', 'max' => 11],
            [['bank'], 'string', 'max' => 100],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'projectlist_id' => 'Projectlist ID',
            'name' => '姓名',
            'sex' => '性别',
            'village' => '乡镇',
            'card_no' => '身份证号',
            'mobile' => '联系电话',
            'address' => '常住地址',
            'account' => 'Account',
            'bank' => 'Bank',
            'state' => 'State',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
        ];
    }
}
