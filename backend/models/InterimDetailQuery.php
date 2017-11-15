<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[InterimDetail]].
 *
 * @see InterimDetail
 */
class InterimDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return InterimDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return InterimDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
