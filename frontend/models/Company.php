<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "companies".
 *
 * @property int $id
 * @property string $name
 * @property int $hero_id
 * @property string $description
 * @property string $created_at
 * @property int $level
 * @property double $balance
 * @property int $status
 *
 * @property Hero $hero
 */
class Company extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'companies';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['hero_id', 'level', 'status'], 'integer'],
            [['created_at'], 'safe'],
            [['balance'], 'number'],
            [['name', 'description'], 'string', 'max' => 255],
            [['hero_id'], 'exist', 'skipOnError' => true, 'targetClass' => Hero::className(), 'targetAttribute' => ['hero_id' => 'id']],
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
            'hero_id' => 'Hero ID',
            'description' => 'Description',
            'created_at' => 'Created At',
            'level' => 'Level',
            'balance' => 'Balance',
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getHero()
    {
        return $this->hasOne(Hero::className(), ['id' => 'hero_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\CompanyQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\CompanyQuery(get_called_class());
    }
}
