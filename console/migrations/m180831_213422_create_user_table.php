<?php

use yii\db\Migration;

/**
 * Handles the creation of table `user`.
 */
class m180831_213422_create_user_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'username' => $this->string(),
            'password_hash' => $this->string(),
            'password_reset_token' => $this->string(),
            'created_at' => $this->timestamp(),
            'last_login' => $this->timestamp(),
            'hero' => $this->integer(),
            'auth_key' => $this->string(),
            'status' => $this->integer(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }
}
