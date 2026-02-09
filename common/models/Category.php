<?php

namespace common\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "category".
 *
 * @property int $id
 * @property int|null $pid
 * @property string|null $name
 * @property string|null $img
 * @property int|null $status
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Equipment[] $equipments
 */
class Category extends \yii\db\ActiveRecord
{

    public $imageFile;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'category';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['pid', 'name', 'img', 'status'], 'default', 'value' => null],
            [['pid', 'status'], 'integer'],
            [['img'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['name'], 'string', 'max' => 255],
            ['imageFile', 'file', 'skipOnEmpty' => true, 'extensions' => 'png, webp, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'pid' => 'Pid',
            'name' => 'Name',
            'img' => 'Img',
            'status' => 'Status',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Equipments]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getEquipments()
    {
        return $this->hasMany(Equipment::class, ['category_id' => 'id']);
    }

    public function getP()
    {
        return $this->hasOne(Category::class, ['id' => 'pid']);

    }

    public function getChildren()
    {
        return $this->hasMany(Category::class, ['pid' => 'id']);

    }


    public function upload()
    {
        if ($this->validate()) {
            $imageFilePath = 'uploads/category/'. $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $imageFileSavePath = Yii::getAlias('@frontend') .'/web/' . $imageFilePath;
            $this->imageFile->saveAs($imageFileSavePath);
            $this->img = $imageFilePath;

            return true;
        }
        return false;

    }


    public static function getCategoryList(){

        return ArrayHelper::map(self::find()->where(['status' => 0])->all(), 'id', 'name');


    }


}
