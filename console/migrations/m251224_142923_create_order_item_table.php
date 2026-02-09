<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%order_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%order}}`
 * - `{{%equipment}}`
 */
class m251224_142923_create_order_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%order_item}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer(),
            'equipment_id' => $this->integer(),
            'daily_price' => $this->decimal(10,2),
        ]);

        // creates index for column `order_id`
        $this->createIndex(
            '{{%idx-order_item-order_id}}',
            '{{%order_item}}',
            'order_id'
        );

        // add foreign key for table `{{%order}}`
        $this->addForeignKey(
            '{{%fk-order_item-order_id}}',
            '{{%order_item}}',
            'order_id',
            '{{%order}}',
            'id',
            'CASCADE'
        );

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-order_item-equipment_id}}',
            '{{%order_item}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-order_item-equipment_id}}',
            '{{%order_item}}',
            'equipment_id',
            '{{%equipment}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%order}}`
        $this->dropForeignKey(
            '{{%fk-order_item-order_id}}',
            '{{%order_item}}'
        );

        // drops index for column `order_id`
        $this->dropIndex(
            '{{%idx-order_item-order_id}}',
            '{{%order_item}}'
        );

        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-order_item-equipment_id}}',
            '{{%order_item}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-order_item-equipment_id}}',
            '{{%order_item}}'
        );

        $this->dropTable('{{%order_item}}');
    }
}
