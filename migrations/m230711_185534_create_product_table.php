<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m230711_185534_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'sku' => $this->string(32)->notNull(),
            'name' => $this->string(32)->notNull(),
            'quantity' => $this->smallInteger()->notNull(),
            'type_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
          'fk-product-type_id',
          'product',
          'type_id',
          'type',
          'id',
          'RESTRICT',
          'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%product}}');
    }
}
