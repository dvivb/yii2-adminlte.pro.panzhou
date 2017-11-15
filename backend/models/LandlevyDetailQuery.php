<?php

namespace app\models;

/**
 * This is the ActiveQuery class for [[LandlevyDetail]].
 *
 * @see LandlevyDetail
 */
class LandlevyDetailQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return LandlevyDetail[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return LandlevyDetail|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
