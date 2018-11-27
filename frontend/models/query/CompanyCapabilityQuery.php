<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[CompanyCapability]].
 *
 * @see CompanyCapability
 */
class CompanyCapabilityQuery extends \yii\db\ActiveQuery
{
    /*public function active()
    {
        return $this->andWhere('[[status]]=1');
    }*/

    /**
     * {@inheritdoc}
     * @return \frontend\models\CompanyCapability[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\CompanyCapability|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
