<?php

use yii\db\Migration;

/**
 * Class m181130_193043_add_pk_to_competitions
 */
class m181130_193043_add_pk_to_competitions extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('competitions', 'id', $this->integer());
        $this->addPrimaryKey('pk_competitions', 'competitions', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropPrimaryKey('pk_competitions', 'competitions');
        $this->dropColumn('competitions', 'id');
    }
}
