<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%product}}`.
 */
class m220731_102011_create_product_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'category' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-product-category',
            'product',
            'category'
        );

        $this->addForeignKey(
            'fk-product-category',
            'product',
            'category',
            'category',
            'id'
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
