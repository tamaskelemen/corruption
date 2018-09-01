<?php

use yii\db\Migration;

/**
 * Handles the creation of table `company`.
 */
class m180831_233950_create_companies_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('company', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'user_id' => $this->integer(),
            'value' => $this->integer(),
        ]);
        $this->addForeignKey('fk_companies_user_id', 'company', 'user_id', 'user', 'id', 'CASCADE', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_companies_user_id', 'company');
        $this->dropTable('company');
    }
}
