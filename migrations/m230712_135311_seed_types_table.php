<?php

use yii\db\Migration;

/**
 * Handles the seeding of table `{{%types}}`.
 */
class m230712_135311_seed_types_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->insert('{{%types}}', [
            'name' => 'Стул',
        ]);

        $this->insert('{{%types}}', [
          'name' => 'Кресло',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        
    }
}
