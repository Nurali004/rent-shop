<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%equipment}}`.
 * Has foreign keys to the tables:
 *
 * - `{{%category}}`
 */
class m251224_101258_create_equipment_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%equipment}}', [
            'id' => $this->primaryKey(),
            'category_id' => $this->integer(),
            'name' => $this->string(),
            'description' => $this->text(),
            'img' => $this->text(),
            'status' => $this->integer(),
            'daily_price' => $this->decimal(10,2),
            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'),
        ]);

        // creates index for column `category_id`
        $this->createIndex(
            '{{%idx-equipment-category_id}}',
            '{{%equipment}}',
            'category_id'
        );

        // add foreign key for table `{{%category}}`
        $this->addForeignKey(
            '{{%fk-equipment-category_id}}',
            '{{%equipment}}',
            'category_id',
            '{{%category}}',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        // drops foreign key for table `{{%category}}`
        $this->dropForeignKey(
            '{{%fk-equipment-category_id}}',
            '{{%equipment}}'
        );

        // drops index for column `category_id`
        $this->dropIndex(
            '{{%idx-equipment-category_id}}',
            '{{%equipment}}'
        );

        $this->dropTable('{{%equipment}}');
    }
}
