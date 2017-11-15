<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[HouselevyDetail]].
 *
 * @see HouselevyDetail
 */
class HouselevyDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return HouselevyDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return HouselevyDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
