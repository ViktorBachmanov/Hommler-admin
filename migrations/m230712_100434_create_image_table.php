<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%image}}`.
 */
class m230712_100434_create_image_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%image}}', [
            'id' => $this->primaryKey(),
            'body' => $this->binary()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
          'fk-image-product_id',
          'image',
          'product_id',
          'product',
          'id',
          'CASCADE',
          'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%image}}');
    }
}
