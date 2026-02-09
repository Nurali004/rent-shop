<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%favorite}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%equipment}}`
 * - `{{%customer}}`
 */
class m260204_071001_create_favorite_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%favorite}}', [
            'id' => $this->primaryKey(),
            'equipment_id' => $this->integer(),
            'customer_id' => $this->integer(),
        ]);

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-favorite-equipment_id}}',
            '{{%favorite}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-favorite-equipment_id}}',
            '{{%favorite}}',
            'equipment_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        );

        // creates index for column `customer_id`
        $this->createIndex(
            '{{%idx-favorite-customer_id}}',
            '{{%favorite}}',
            'customer_id'
        );

        // add foreign key for table `{{%customer}}`
        $this->addForeignKey(
            '{{%fk-favorite-customer_id}}',
            '{{%favorite}}',
            'customer_id',
            '{{%customer}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-favorite-equipment_id}}',
            '{{%favorite}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-favorite-equipment_id}}',
            '{{%favorite}}'
        );

        // drops foreign key for table `{{%customer}}`
        $this->dropForeignKey(
            '{{%fk-favorite-customer_id}}',
            '{{%favorite}}'
        );

        // drops index for column `customer_id`
        $this->dropIndex(
            '{{%idx-favorite-customer_id}}',
            '{{%favorite}}'
        );

        $this->dropTable('{{%favorite}}');
    }
}
