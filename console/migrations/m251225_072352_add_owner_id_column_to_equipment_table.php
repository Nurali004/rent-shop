<?php

use yii\db\Migration;

/**
 * Handles adding columns to table `{{%equipment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%customer}}`
 */
class m251225_072352_add_owner_id_column_to_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%equipment}}', 'owner_id', $this->integer());

        // creates index for column `owner_id`
        $this->createIndex(
            '{{%idx-equipment-owner_id}}',
            '{{%equipment}}',
            'owner_id'
        );

        // add foreign key for table `{{%customer}}`
        $this->addForeignKey(
            '{{%fk-equipment-owner_id}}',
            '{{%equipment}}',
            'owner_id',
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
        // drops foreign key for table `{{%customer}}`
        $this->dropForeignKey(
            '{{%fk-equipment-owner_id}}',
            '{{%equipment}}'
        );

        // drops index for column `owner_id`
        $this->dropIndex(
            '{{%idx-equipment-owner_id}}',
            '{{%equipment}}'
        );

        $this->dropColumn('{{%equipment}}', 'owner_id');
    }
}
