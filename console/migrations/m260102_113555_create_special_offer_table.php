<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%special_offer}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%equipment}}`
 */
class m260102_113555_create_special_offer_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%special_offer}}', [
            'id' => $this->primaryKey(),
            'equipment_id' => $this->integer(),
            'old_price' => $this->decimal(10,2),
            'new_price' => $this->decimal(10,2),
            'is_active' => $this->integer()->defaultValue(1),
            'updated_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `equipment_id`
        $this->createIndex(
            '{{%idx-special_offer-equipment_id}}',
            '{{%special_offer}}',
            'equipment_id'
        );

        // add foreign key for table `{{%equipment}}`
        $this->addForeignKey(
            '{{%fk-special_offer-equipment_id}}',
            '{{%special_offer}}',
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
            '{{%fk-special_offer-equipment_id}}',
            '{{%special_offer}}'
        );

        // drops index for column `equipment_id`
        $this->dropIndex(
            '{{%idx-special_offer-equipment_id}}',
            '{{%special_offer}}'
        );

        $this->dropTable('{{%special_offer}}');
    }
}
