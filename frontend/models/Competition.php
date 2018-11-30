<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "competitions".
 *
 * @property int $id
 * @property int $proc_id
 * @property int $company_id
 * @property string $created_at
 */
class Competition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'competitions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proc_id', 'company_id'], 'integer'],
            [['created_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'proc_id' => 'Proc ID',
            'company_id' => 'Company ID',
            'created_at' => 'Created At',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\CompetitionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\CompetitionQuery(get_called_class());
    }
}
