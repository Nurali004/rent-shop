<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "slider".
 *
 * @property int $id
 * @property string|null $name
 * @property string|null $img
 * @property string|null $url
 * @property int|null $order
 */
class Slider extends \yii\db\ActiveRecord
{

    
    public $imageFile;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'slider';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'img', 'url', 'order'], 'default', 'value' => null],
            [['name', 'img', 'url'], 'string'],
            [['order'], 'integer'],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, webp,jpeg, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'img' => 'Img',
            'url' => 'Url',
            'order' => 'Order',
        ];
    }


    public function upload()
    {
        if ($this->validate()) {
            $filePath = '/uploads/sliders/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $fileSavePath = Yii::getAlias('@frontend'). '/web/'. $filePath;
            $this->imageFile->saveAs($fileSavePath);
            $this->img = $filePath;

            return true;
        }
        return false;
        
    }

}
