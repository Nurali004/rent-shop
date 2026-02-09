<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "cart".
 *
 * @property int $id
 * @property int $user_id
 * @property int $equipment_id
 * @property int $count
 */
class Cart extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'cart';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_id', 'count'], 'required'],
            [['user_id', 'equipment_id', 'count'], 'integer'],
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
            'equipment_id' => 'Equipment ID',
            'count' => 'Count',
        ];
    }

    public function getEquipment(){
        return $this->hasOne(Equipment::className(), ['id' => 'equipment_id']);
    }

}
