<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HouselevyList]].
 *
 * @see HouselevyList
 */
class HouselevyListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HouselevyList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HouselevyList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
