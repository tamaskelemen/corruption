<?php

namespace frontend\models\query;

/**
 * This is the ActiveQuery class for [[\frontend\models\Institution]].
 *
 * @see \frontend\models\Institution
 */
class InstitutionQuery extends \yii\db\ActiveQuery
{
    public function active()
    {
        return $this->andWhere('[[status]]=1');
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\Institution[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\Institution|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }
}
