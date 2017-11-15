<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LandlevyList]].
 *
 * @see LandlevyList
 */
class LandlevyListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LandlevyList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LandlevyList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
