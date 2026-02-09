<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "special_offer".
 *
 * @property int $id
 * @property int|null $equipment_id
 * @property float|null $old_price
 * @property float|null $new_price
 * @property int|null $is_active
 * @property string|null $updated_at
 *
 * @property Equipment $equipment
 */
class SpecialOffer extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'special_offer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['equipment_id', 'old_price', 'new_price'], 'default', 'value' => null],
            [['is_active'], 'default', 'value' => 1],
            [['equipment_id', 'is_active'], 'integer'],
            [['old_price', 'new_price'], 'number'],
            [['updated_at'], 'safe'],
            [['equipment_id'], 'exist', 'skipOnError' => true, 'targetClass' => Equipment::class, 'targetAttribute' => ['equipment_id' => 'id']],
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
            'old_price' => 'Old Price',
            'new_price' => 'New Price',
            'is_active' => 'Is Active',
            'updated_at' => 'Updated At',
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

}
