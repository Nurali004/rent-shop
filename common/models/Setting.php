<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "setting".
 *
 * @property int $id
 * @property string|null $email
 * @property string|null $phone_number
 * @property string|null $logo_img
 * @property string|null $site_name
 * @property string|null $instagram_url
 * @property string|null $telegram_url
 * @property string|null $youtube_url
 * @property string|null $description
 */
class Setting extends \yii\db\ActiveRecord
{

    public $imageFile;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'setting';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email', 'phone_number', 'logo_img', 'site_name', 'instagram_url', 'telegram_url', 'youtube_url', 'description'], 'default', 'value' => null],
            [['logo_img', 'instagram_url', 'telegram_url', 'youtube_url', 'description'], 'string'],
            [['email', 'site_name'], 'string', 'max' => 255],
            [['phone_number'], 'string', 'max' => 30],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, webp, jpeg, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email' => 'Email',
            'phone_number' => 'Phone Number',
            'logo_img' => 'Logo Img',
            'site_name' => 'Site Name',
            'instagram_url' => 'Instagram Url',
            'telegram_url' => 'Telegram Url',
            'youtube_url' => 'Youtube Url',
            'description' => 'Description',
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            $imageFilePath = 'uploads/setting/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $imageFileSavePath = Yii::getAlias('@frontend'). '/web/'.$imageFilePath;
            $this->imageFile->saveAs($imageFileSavePath);
            $this->logo_img = $imageFilePath;

            return true;
        }
        return false;

    }

}
