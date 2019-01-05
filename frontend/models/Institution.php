<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "institutions".
 *
 * @property int $id
 * @property string $name
 * @property int $status
 *
 * @property Procurement[] $procurements
 */
class Institution extends \yii\db\ActiveRecord
{

    const STATUS_ACTIVE = 1;
    const STATUS_INACTIVE = -1;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'institutions';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['status'], 'integer'],
            [['name'], 'string', 'max' => 255],
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
            'status' => 'Status',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProcurements()
    {
        return $this->hasMany(Procurement::className(), ['institution_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\InstitutionQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\InstitutionQuery(get_called_class());
    }
}
