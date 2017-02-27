<?php
namespace backend\models;

use Yii;
use yii\base\Model;

class PasswordResetRequestForm extends Model
{
    public $email;    

    public function rules()
    {
        return [
            ['email', 'trim'],
            ['email', 'required', 'message' => ''],
            ['email', 'email', 'message' => 'Format email salah.'],
            ['email', 'exist',
                'targetClass' => '\backend\models\Admin',
                'filter' => ['status' => Admin::STATUS_ACTIVE],
                'message' => 'Email tidak ditemukan.'
            ],            
        ];
    }

    public function sendEmail()
    {
        $user = Admin::findOne([
            'status' => Admin::STATUS_ACTIVE,
            'email' => $this->email,
        ]);

        if (!$user) {
            return false;
        }
        
        if (!Admin::isPasswordResetTokenValid($user->password_reset_token)) {
            $user->generatePasswordResetToken();
            if (!$user->save()) {
                return false;
            }
        }

        return Yii::$app
            ->mailer
            ->compose(
                ['html' => 'passwordResetToken-html', 'text' => 'passwordResetToken-text'],
                ['user' => $user]
            )
            ->setFrom([Yii::$app->params['supportEmail'] => Yii::$app->name . ' robot'])
            ->setTo($this->email)
            ->setSubject('Password reset untuk ' . Yii::$app->name)
            ->send();
    }
}
