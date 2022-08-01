<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%storage}}`.
 */
class m220731_102740_create_storage_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%storage}}', [
            'id' => $this->primaryKey(),
            'product' => $this->integer()->notNull(),
            'amount' => $this->integer(),
        ]);

        $this->createIndex(
            'idx-storage-product',
            'storage',
            'product'
        );

        $this->addForeignKey(
            'fk-storage-product',
            'storage',
            'product',
            'product',
            'id'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%storage}}');
    }
}
