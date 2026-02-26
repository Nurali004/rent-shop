<?php

namespace common\models;

use common\models\EmailVerification;
use yii\base\Model;

class VerifyForm extends Model
{
    public $code;

    public function rules(){
        return [
            [['code'], 'required'],
            [['code'], 'string', 'length' => 6],
        ];
    }


    public function verify($user)
    {
        $verification = EmailVerification::find()->where(['user_id' => $user->id])->one();
        if ($verification && $verification->email_code == $this->code && $verification->email_expired_at >= time()) {
            $verification->email_verified = 1;

            return $verification->save(false);

        }
        return false;
        
    }

}
