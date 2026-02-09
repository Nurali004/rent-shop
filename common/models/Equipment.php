<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "equipment".
 *
 * @property int $id
 * @property int|null $category_id
 * @property string|null $name
 * @property string|null $description
 * @property string|null $img
 * @property int|null $status
 * @property float|null $daily_price
 * @property string|null $created_at
 * @property string|null $updated_at
 * @property int|null $owner_id
 *
 * @property Category $category
 * @property OrderItem[] $orderItems
 * @property Customer $owner
 */
class Equipment extends \yii\db\ActiveRecord
{

    public $imageFile;
    public $imageFiles;



    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'equipment';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'name', 'description', 'img', 'status', 'daily_price', 'owner_id'], 'default', 'value' => null],
            [['category_id', 'status', 'owner_id'], 'integer'],
            [['description', 'img'], 'string'],
            [['daily_price'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => Category::class, 'targetAttribute' => ['category_id' => 'id']],
            [['owner_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['owner_id' => 'id']],
         //   [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, webp, jpeg, jpg'],
            [['imageFiles'], 'file', 'skipOnEmpty' => true,  'maxSize' => 1024 * 1024 * 30, 'tooBig' => 'Limit is 30MB', 'extensions' => 'png, webp, jpeg, jpg', 'maxFiles' => 5],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'category_id' => 'Category ID',
            'name' => 'Name',
            'description' => 'Description',
            'img' => 'Img',
            'status' => 'Status',
            'daily_price' => 'Daily Price',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
            'owner_id' => 'Owner ID',
        ];
    }

    /**
     * Gets query for [[Category]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(Category::class, ['id' => 'category_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['equipment_id' => 'id']);
    }

    public function getCarts()
    {
        return $this->hasMany(Cart::class, ['equipment_id' => 'id']);

    }

    /**
     * Gets query for [[Owner]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOwner()
    {
        return $this->hasOne(Customer::class, ['id' => 'owner_id']);
    }


    public function upload()
    {
        if ($this->validate()) {
            $imageFilePath = 'uploads/equipment/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $imageFileSavePath = Yii::getAlias('@frontend') . '/web/' . $imageFilePath;
            $this->imageFile->saveAs($imageFileSavePath);
            $this->img = $imageFilePath;
            return true;
        }
        return false;

    }


    public function uploads($id = null)
    {
        if ($this->validate()) {

            $ids = [];

            EquipmentItem::deleteAll(['equipment_id' => $id]);


            foreach ($this->imageFiles as $file) {
                $filePath = 'uploads/equipment-images/' . $file->baseName . '.' . $file->extension;
                $fileSavePath = Yii::getAlias('@frontend') . '/web/' . $filePath;
                $file->saveAs($fileSavePath);

                $equipmentItem = new EquipmentItem();
                $equipmentItem->img = $filePath;
                if (!is_null($id)) {
                    $equipmentItem->equipment_id = $id;
                }
                $equipmentItem->save();
                $ids[] = $equipmentItem->id;


            }

            return $ids;
        }

        return false;

    }


    public static function getLists()
    {
        return ArrayHelper::map(Equipment::find()->all(), 'id', 'name');


    }

}
