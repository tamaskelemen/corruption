<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "reports".
 *
 * @property int $id
 * @property int $user_id
 * @property string $title
 * @property string $message
 * @property int $read
 * @property string $created_at
 *
 * @property User $user
 */
class Report extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'reports';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'read'], 'integer'],
            [['message'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'message' => 'Message',
            'read' => 'Read',
            'created_at' => 'Created At',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::className(), ['id' => 'user_id']);
    }

    /**
     * {@inheritdoc}
     * @return \frontend\models\query\ReportQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \frontend\models\query\ReportQuery(get_called_class());
    }
}
