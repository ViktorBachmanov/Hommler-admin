<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%images}}`.
 */
class m230712_100434_create_images_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%images}}', [
            'id' => $this->primaryKey(),
            'body' => $this->binary()->notNull(),
            'product_id' => $this->integer()->notNull(),
        ]);

        $this->addForeignKey(
          'fk-images-product_id',
          'images',
          'product_id',
          'products',
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
        $this->dropTable('{{%images}}');
    }
}
