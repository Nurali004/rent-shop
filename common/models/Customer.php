<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "customer".
 *
 * @property int $id
 * @property int|null $user_id
 * @property string|null $first_name
 * @property string|null $last_name
 * @property string|null $passport
 * @property string|null $img
 * @property string|null $phone
 * @property string|null $address
 * @property string|null $created_at
 * @property string|null $updated_at
 *
 * @property Order[] $orders
 * @property User $user
 */
class Customer extends \yii\db\ActiveRecord
{
    
    public $imageFile;


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['user_id', 'first_name', 'last_name', 'passport', 'img', 'phone', 'address'], 'default', 'value' => null],
            [['user_id'], 'integer'],
            [['img', 'address'], 'string'],
            [['created_at', 'updated_at'], 'safe'],
            [['first_name', 'last_name'], 'string', 'max' => 255],
            [['passport'], 'string', 'max' => 50],
            [['phone'], 'string', 'max' => 30],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, webp, jpg'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'user_id' => 'User ID',
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'passport' => 'Passport',
            'img' => 'Img',
            'phone' => 'Phone',
            'address' => 'Address',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    /**
     * Gets query for [[Orders]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrders()
    {
        return $this->hasMany(Order::class, ['customer_id' => 'id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(User::class, ['id' => 'user_id']);
    }


    public function upload()
    {
        if ($this->validate()) {
            $imageFilePath = 'uploads/customer/' . $this->imageFile->baseName . '.' . $this->imageFile->extension;
            $imageFileSavePath = Yii::getAlias('@frontend'). '/web/'.$imageFilePath;
            $this->imageFile->saveAs($imageFileSavePath);
            $this->img = $imageFilePath;
            return true;
        }
        return false;
        
    }

}
