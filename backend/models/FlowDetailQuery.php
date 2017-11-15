<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[FlowDetail]].
 *
 * @see FlowDetail
 */
class FlowDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return FlowDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return FlowDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
