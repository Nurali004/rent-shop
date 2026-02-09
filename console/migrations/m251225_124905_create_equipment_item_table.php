<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment_item}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%equipment}}`
 */
class m251225_124905_create_equipment_item_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment_item}}', [
            'id' => $this->primaryKey(),
            'equipment_id' => $this->integer(),
            'img' => $this->text(),
        ]);

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-equipment_item-equipment_id}}',
            '{{%equipment_item}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-equipment_item-equipment_id}}',
            '{{%equipment_item}}',
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
        // drops foreign key for table `{{%equipment}}`
        $this->dropForeignKey(
            '{{%fk-equipment_item-equipment_id}}',
            '{{%equipment_item}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-equipment_item-equipment_id}}',
            '{{%equipment_item}}'
        );

        $this->dropTable('{{%equipment_item}}');
    }
}
