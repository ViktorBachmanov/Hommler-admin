<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%products}}`.
 */
class m230711_185534_create_products_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%products}}', [
            'id' => $this->primaryKey(),
            'sku' => $this->string(32)->notNull(),
            'name' => $this->string(32)->notNull(),
            'quantity' => $this->smallInteger()->notNull(),
            'type_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
          'fk-products-type_id',
          'products',
          'type_id',
          'types',
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
        $this->dropTable('{{%products}}');
    }
}
