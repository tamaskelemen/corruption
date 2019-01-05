<?php

use frontend\models\Institution;
use yii\db\Migration;

/**
 * Class m190105_201347_insert_default_data
 */
class m190105_201347_insert_default_data extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('institutions', ['id' => 1, 'name' => 'Nemzeti Választási Hivatal', 'status' => Institution::STATUS_ACTIVE]);
        $this->insert('institutions', ['id' => 2, 'name' => 'Nemzeti Bank', 'status' => Institution::STATUS_ACTIVE]);
        $this->insert('institutions', ['id' => 3, 'name' => 'Nemzeti Magyarságkutató Intézet', 'status' => Institution::STATUS_ACTIVE]);
        $this->insert('institutions', ['id' => 4, 'name' => 'Nemzeti Turisztikai Hivatal', 'status' => Institution::STATUS_ACTIVE]);

        $this->insert('abilities', ['id' => 1, 'description' => 'Építkezik']);
        $this->insert('abilities', ['id' => 2, 'description' => 'Szoftvert fejleszt']);
        $this->insert('abilities', ['id' => 3, 'description' => 'Takarít']);
        $this->insert('abilities', ['id' => 4, 'description' => 'Ács munka']);
        $this->insert('abilities', ['id' => 5, 'description' => 'Villanyszerelő munka']);
        $this->insert('abilities', ['id' => 6, 'description' => 'Könyvel']);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
       $this->delete('institutions', ['id' => [1, 2, 3, 4]]);
       $this->delete('abilities', ['id' => [1, 2, 3, 4, 5, 6]]);
    }

}
