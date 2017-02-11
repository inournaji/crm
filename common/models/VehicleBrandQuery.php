<?php

namespace common\models;

/**
 * This is the ActiveQuery class for [[ViechleBrand]].
 *
 * @see ViechleBrand
 */
class VehicleBrandQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * @inheritdoc
     * @return ViechleBrand[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return ViechleBrand|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
