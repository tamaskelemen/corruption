<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "abilities".
 *
 * @property int $id
 * @property string $description
 */
class Ability extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'abilities';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'description' => 'Description',
        ];
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\AbilityQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\AbilityQuery(get_called_class());
    }
}
