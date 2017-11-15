<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[Flow]].
 *
 * @see Flow
 */
class FlowQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return Flow[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return Flow|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
