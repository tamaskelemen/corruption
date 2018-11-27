<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "proc_requirements".
 *
 * @property int $proc_id
 * @property int $ability_id
 */
class ProcRequirement extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proc_requirements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proc_id', 'ability_id'], 'integer'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'proc_id' => 'Proc ID',
            'ability_id' => 'Ability ID',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\ProcRequirementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ProcRequirementQuery(get_called_class());
    }
}
