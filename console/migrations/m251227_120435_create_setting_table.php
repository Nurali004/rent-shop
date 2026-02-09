<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%setting}}`.
 */
class m251227_120435_create_setting_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%setting}}', [
            'id' => $this->primaryKey(),
            'email' => $this->string(),
            'phone_number' => $this->string(30),
            'logo_img' => $this->text(),
            'site_name' => $this->string(),
            'instagram_url' => $this->text(),
            'telegram_url' => $this->text(),
            'youtube_url' => $this->text(),
            'description' => $this->text(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%setting}}');
    }
}
