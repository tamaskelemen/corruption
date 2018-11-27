<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "company_capabilities".
 *
 * @property int $company_id
 * @property int $ability_id
 */
class CompanyCapability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'company_capabilities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['company_id', 'ability_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'company_id' => 'Company ID',
            'ability_id' => 'Ability ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return query\CompanyCapabilityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new query\CompanyCapabilityQuery(get_called_class());
    }
}
