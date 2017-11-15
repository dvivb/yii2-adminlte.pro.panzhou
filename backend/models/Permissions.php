<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "permissions".
 *
 * @property integer $id
 * @property string $permission_name
 * @property string $permission_action
 * @property string $create_at
 * @property string $update_at
 */
class Permissions extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'permissions';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['create_at', 'update_at'], 'safe'],
            [['permission_name'], 'string', 'max' => 50],
            [['permission_action'], 'string', 'max' => 100],
            [['permission_action'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'permission_name' => '权限名称',
            'permission_action' => '权限方法',
            'create_at' => '创建时间',
            'update_at' => '更新时间',
        ];
    }

    /**
     * @inheritdoc
     * @return PermissionsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new PermissionsQuery(get_called_class());
    }
}
