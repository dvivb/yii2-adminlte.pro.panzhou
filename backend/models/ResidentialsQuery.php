<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Residentials]].
 *
 * @see Residentials
 */
class ResidentialsQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Residentials[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Residentials|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
