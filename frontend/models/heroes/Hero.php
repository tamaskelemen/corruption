<?php

namespace frontend\models\heroes;

use Yii;
use frontend\models\Company;
use frontend\models\User;

/**
 * This is the model class for table "heroes".
 *
 * @property int $id
 * @property string $alias
 * @property int $type
 * @property int $user_id
 * @property double $orban_index
 *
 * @property Company[] $companies
 * @property User $user
 */
class Hero extends \yii\db\ActiveRecord
{
    const MESZAROS_LORINC = 1;
    const ANDY_VAJNA = 2;
    const MATOLCSY = 3;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'heroes';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type', 'user_id'], 'integer'],
            [['orban_index'], 'number'],
            [['alias'], 'string', 'max' => 255],
            //[['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'alias' => 'Alias',
            'type' => 'Type',
            'user_id' => 'User ID',
            'orban_index' => 'Orban Index',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCompanies()
    {
        return $this->hasMany(Company::className(), ['hero_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    public function getEntity()
    {
        switch ($this->type) {
            case self::MESZAROS_LORINC:
                return new MeszarosLorinc();
            case self::ANDY_VAJNA:
                return new AndyVajna();
            case self::MATOLCSY:
                return new MatolcsyGyorgy();
            default:
                return null;
        }
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\HeroQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\HeroQuery(get_called_class());
    }
}
