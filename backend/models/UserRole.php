<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_role".
 *
 * @property integer $id
 * @property string $role_name
 * @property string $create_at
 * @property string $update_at
 */
class UserRole extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_role';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_name'], 'required'],
            [['create_at', 'update_at'], 'safe'],
            [['role_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_name' => '用户组名称',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return UserRoleQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserRoleQuery(get_called_class());
    }
}
