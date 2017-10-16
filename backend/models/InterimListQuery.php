<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InterimList]].
 *
 * @see InterimList
 */
class InterimListQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InterimList[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InterimList|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
