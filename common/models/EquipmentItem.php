<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "equipment_item".
 *
 * @property int $id
 * @property int|null $equipment_id
 * @property string|null $img
 *
 * @property Equipment $equipment
 */
class EquipmentItem extends \yii\db\ActiveRecord
{

    public $imageFiles;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment_item';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_id', 'img'], 'default', 'value' => null],
            [['equipment_id'], 'integer'],
            [['img'], 'string'],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::class, 'targetAttribute' => ['equipment_id' => 'id']],
            [['imageFiles'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, webp', 'maxFiles' => 10],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'equipment_id' => 'Equipment ID',
            'img' => 'Img',
        ];
    }

    /**
     * Gets query for [[Equipment]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipment()
    {
        return $this->hasOne(Equipment::class, ['id' => 'equipment_id']);
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $file) {
                $imageFilePath = 'uploads/equipment-item' . $file->baseName . '.' . $file->extension;
                $imageFileSavePath = Yii::getAlias('@frontend'). '/web/'.$imageFilePath;
                $file->saveAs($imageFileSavePath);
                $this->img = $imageFilePath;


            }
            return true;
        }
        return false;

    }

}
