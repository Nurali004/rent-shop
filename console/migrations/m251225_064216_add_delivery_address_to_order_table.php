<?php

use yii\db\Migration;

class m251225_064216_add_delivery_address_to_order_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%order}}', 'delivery_address', $this->text());

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%order}}', 'delivery_address');


    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m251225_064216_add_delivery_address_to_order_table cannot be reverted.\n";

        return false;
    }
    */
}
