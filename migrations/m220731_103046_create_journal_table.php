<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%journal}}`.
 */
class m220731_103046_create_journal_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%journal}}', [
            'id' => $this->primaryKey(),
            'product' => $this->integer()->notNull(),
            'motion' => $this->integer()->notNull(),
            'date' => $this->integer()->notNull(),
        ]);

        $this->createIndex(
            'idx-journal-product',
            'journal',
            'product'
        );

        $this->addForeignKey(
            'fk-journal-product',
            'journal',
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
        $this->dropTable('{{%journal}}');
    }
}
