<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%email_verification}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%user}}`
 */
class m260218_042224_create_email_verification_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%email_verification}}', [
            'id' => $this->primaryKey(),
            'email_code' => $this->string(6)->notNull(),
            'email_expired_at' => $this->integer()->notNull(),
            'email_verified' => $this->boolean()->notNull()->defaultValue(0),
            'user_id' => $this->integer()->notNull(),
        ]);

        // creates index for column `user_id`
        $this->createIndex(
            '{{%idx-email_verification-user_id}}',
            '{{%email_verification}}',
            'user_id'
        );

        // add foreign key for table `{{%user}}`
        $this->addForeignKey(
            '{{%fk-email_verification-user_id}}',
            '{{%email_verification}}',
            'user_id',
            '{{%user}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%user}}`
        $this->dropForeignKey(
            '{{%fk-email_verification-user_id}}',
            '{{%email_verification}}'
        );

        // drops index for column `user_id`
        $this->dropIndex(
            '{{%idx-email_verification-user_id}}',
            '{{%email_verification}}'
        );

        $this->dropTable('{{%email_verification}}');
    }
}
