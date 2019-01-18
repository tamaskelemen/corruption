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

    public function getProcurements()
    {
        return $this->hasMany(Procurement::class, ['id' => 'proc_id'])
            ->viaTable('proc_requirements', ['ability_id' => 'id']);
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
     * @return array
     */
    public static function listActives() : array
    {
        $abilites = self::find()->all();

        $result = [];
        foreach ($abilites as $ability) {
            $result[$ability->id] = $ability->description;
        }

        return $result;
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
