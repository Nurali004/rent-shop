<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property int|null $customer_id
 * @property string|null $start_date
 * @property string|null $end_date
 * @property int|null $days_count
 * @property int|null $status
 * @property float|null $total_price
 * @property string|null $delivery_address
 *
 * @property Customer $customer
 * @property OrderItem[] $orderItems
 */
class Order extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'start_date', 'end_date', 'days_count', 'status', 'total_price', 'delivery_address'], 'default', 'value' => null],
            [['customer_id', 'days_count', 'status'], 'integer'],
            [['start_date', 'end_date'], 'safe'],
            [['total_price'], 'number'],
            [['delivery_address'], 'string'],
            [['customer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Customer::class, 'targetAttribute' => ['customer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'start_date' => 'Start Date',
            'end_date' => 'End Date',
            'days_count' => 'Days Count',
            'status' => 'Status',
            'total_price' => 'Total Price',
            'delivery_address' => 'Delivery Address',
        ];
    }

    /**
     * Gets query for [[Customer]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCustomer()
    {
        return $this->hasOne(Customer::class, ['id' => 'customer_id']);
    }

    /**
     * Gets query for [[OrderItems]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getOrderItems()
    {
        return $this->hasMany(OrderItem::class, ['order_id' => 'id']);
    }

}
