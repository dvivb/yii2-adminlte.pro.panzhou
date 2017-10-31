<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HouselevyTotal]].
 *
 * @see HouselevyTotal
 */
class HouselevyTotalQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HouselevyTotal[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HouselevyTotal|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
