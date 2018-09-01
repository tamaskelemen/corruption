<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "user".
 *
 * @property int $id
 * @property string $email
 * @property string $username
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $created_at
 * @property string $last_login
 * @property int $caste
 * @property string $auth_key
 * @property int $status
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['created_at', 'last_login'], 'safe'],
            [['caste', 'status'], 'integer'],
            [['email', 'username', 'password_hash', 'password_reset_token', 'auth_key'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'username' => 'Username',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'created_at' => 'Created At',
            'last_login' => 'Last Login',
            'caste' => 'Hero',
            'auth_key' => 'Auth Key',
            'status' => 'Status',
        ];
    }
}
