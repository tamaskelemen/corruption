<?php

use yii\db\Migration;

/**
 * Handles the creation of table `reports`.
 */
class m181129_210329_create_reports_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('reports', [
            'id' => $this->primaryKey(),
            'user_id' => $this->integer(),
            'title' => $this->string(),
            'message' => $this->text(),
            'read' => $this->boolean(),
            'created_at' => $this->timestamp()->defaultExpression('now()'),
        ]);

        $this->addForeignKey('fk_reporst_user_id_user_id',
            'reports',
            'user_id',
            'users',
            'id',
            'CASCADE',
            'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('reports');
    }
}
