<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%post}}`.
 */
class m220713_065042_create_post_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp(): void
    {
        $this->createTable(table: '{{%post}}', columns: [
            'id' => $this->primaryKey()->unsigned(),
            'username' => $this->string()->notNull(),
            'content' => $this->string(length: 512)->notNull(),
            'created_at' => $this->dateTime()->defaultExpression(default: 'NOW()'),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown(): void
    {
        $this->dropTable(table: '{{%post}}');
    }
}
