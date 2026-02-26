<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "email_verification".
 *
 * @property int $id
 * @property string $email_code
 * @property int $email_expired_at
 * @property int $email_verified
 * @property int $user_id
 *
 * @property User $user
 */
class EmailVerification extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'email_verification';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email_verified'], 'default', 'value' => 0],
            [['email_code', 'email_expired_at', 'user_id'], 'required'],
            [['email_expired_at', 'email_verified', 'user_id'], 'integer'],
            [['email_code'], 'string', 'max' => 6],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => User::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'email_code' => 'Email Code',
            'email_expired_at' => 'Email Expired At',
            'email_verified' => 'Email Verified',
            'user_id' => 'User ID',
        ];
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

}
