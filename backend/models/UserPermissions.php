<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "user_permissions".
 *
 * @property integer $id
 * @property integer $role_id
 * @property integer $permission_id
 * @property string $create_at
 * @property string $update_at
 */
class UserPermissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user_permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['role_id'], 'required'],
            [['role_id', 'permission_id'], 'integer'],
            [['create_at', 'update_at'], 'safe'],
            [['role_id', 'permission_id'], 'unique', 'targetAttribute' => ['role_id', 'permission_id'], 'message' => 'The combination of Role ID and Permission ID has already been taken.'],
        ];
    }

    /**
     * @inheritdoc
     */
 public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'role_id' => '分组ID',
            'permission_id' => '权限ID',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return UserPermissionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UserPermissionsQuery(get_called_class());
    }
    
    public function getUserRole(){
        return $this->hasOne(UserRole::className(), ['id' => 'role_id']);
    }
    public function getPermissions(){
        return $this->hasOne(Permissions::className(), ['id' => 'permission_id']);
    }
}
