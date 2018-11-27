<?php

use yii\db\Migration;

/**
 * Class m181125_200300_init_tables
 */
class m181125_200300_init_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('users', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression("now()"),
            'last_login' => $this->timestamp(),
            'password_hash' => $this->string(),
            'password_reset_token' => $this->string(),
            'auth_key' => $this->string(),
            'hero_id' => $this->integer(),
            'status' => $this->integer(),
            'terms' => $this->timestamp(),
            'newsletter' => $this->boolean(),
        ]);

        $this->createTable('heroes', [
            'id' => $this->primaryKey(),
            'alias' => $this->string(),
            'type' => $this->integer(),
            'user_id' => $this->integer(),
            'orban_index' => $this->float()->defaultValue(1.0),
            //'balance' => $this->double(),
        ]);


        $this->createTable('companies', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'hero_id' => $this->integer(),
            'description' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('NOW()'),
            'level' => $this->integer()->defaultValue(1),
            'balance' => $this->double(),
            'status' => $this->integer(),
        ]);


        $this->createTable('abilities', [
            'id' => $this->primaryKey(),
            'description' => $this->string(),
        ]);

        //to store which company which ability has
        $this->createTable('company_capabilities', [
            'company_id' => $this->integer(),
            'ability_id' => $this->integer(),
        ]);

        //kozbeszerzes: ki adta fel, mirol szol
        $this->createTable('procurements', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'created_at' => $this->timestamp()->defaultExpression('now()'),
            'ends_at' => $this->timestamp(),
            'institution_id' => $this->integer(),
        ]);

        //to store which ability a company must have in order to palyaz egy kozbeszerzes
        $this->createTable('proc_requirements',[
            'proc_id' => $this->integer(),
            'ability_id' => $this->integer(),
        ]);

        //ki adta be kire
        $this->createTable('competitions', [
            'proc_id' => $this->integer(),
            'company_id' => $this->integer(),
            'created_at' => $this->timestamp(),
        ]);

        //goverment institutions
        $this->createTable('institutions', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'status' => $this->integer(),
        ]);

        $this->addForeignKey('fk_user_hero_id_hero_id', 'users', 'hero_id', 'heroes', 'id','SET NULL', 'CASCADE');
        $this->addForeignKey('fk_heroes_user_id_user_id', 'heroes', 'user_id', 'users', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('fk_companies_hero_id_heroes_id', 'companies', 'hero_id', 'heroes', 'id', 'CASCADE', 'CASCADE');

        $this->addForeignKey('fk_procurements_institution_id_institutions_id', 'procurements', 'institution_id', 'institutions', 'id', 'SET NULL', 'CASCADE');

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_procurements_institution_id_institutions_id', 'procurements');
        $this->dropForeignKey('fk_companies_hero_id_heroes_id', 'companies');
        $this->dropForeignKey('fk_heroes_user_id_user_id', 'heroes');
        $this->dropForeignKey('fk_user_hero_id_hero_id', 'users');

        $this->dropTable('institutions');
        $this->dropTable('competitions');
        $this->dropTable('proc_requirements');
        $this->dropTable('procurements');
        $this->dropTable('company_capabilities');
        $this->dropTable('abilities');
        $this->dropTable('companies');
        $this->dropTable('heroes');
        $this->dropTable('users');

    }
}
