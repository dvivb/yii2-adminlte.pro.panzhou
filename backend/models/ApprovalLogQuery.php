<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[ApprovalLog]].
 *
 * @see ApprovalLog
 */
class ApprovalLogQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ApprovalLog[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ApprovalLog|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
