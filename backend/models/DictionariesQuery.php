<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Dictionaries]].
 *
 * @see Dictionaries
 */
class DictionariesQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Dictionaries[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Dictionaries|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
