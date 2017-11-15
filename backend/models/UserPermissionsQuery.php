<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[UserPermissions]].
 *
 * @see UserPermissions
 */
class UserPermissionsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return UserPermissions[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return UserPermissions|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
