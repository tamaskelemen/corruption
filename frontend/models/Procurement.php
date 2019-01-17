<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "procurements".
 *
 * @property int $id
 * @property string $name
 * @property string $created_at
 * @property string $ends_at
 * @property int $institution_id
 *
 * @property Institution $institution
 */
class Procurement extends \yii\db\ActiveRecord
{

    public $abilities;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'procurements';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'ends_at','abilities'], 'safe'],
            [['institution_id'], 'integer'],
            [['name'], 'string', 'max' => 255],
            [['institution_id'], 'exist', 'skipOnError' => true, 'targetClass' => Institution::className(), 'targetAttribute' => ['institution_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'created_at' => 'Created At',
            'ends_at' => 'Ends At',
            'institution_id' => 'Institution ID',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getInstitution()
    {
        return $this->hasOne(Institution::className(), ['id' => 'institution_id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getAbilities()
    {
        return $this->hasMany(Ability::class, ['id' => 'ability_id'])
            ->viaTable('proc_requirements', ['proc_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\ProcurementQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ProcurementQuery(get_called_class());
    }
}
