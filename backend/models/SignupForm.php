<?php
namespace backend\models;

use yii\base\Model;

class SignupForm extends Model
{
    public $nama;
    public $username;
    public $email;
    public $password;


    public function rules()
    {
        return [

            ['nama', 'trim'],
            ['nama', 'required', 'message' => ''],
            ['nama', 'string', 'min' => 2, 'max' => 63],

            ['username', 'trim'],
            ['username', 'required', 'message' => ''],
            ['username', 'unique', 'targetClass' => 'backend\models\Admin', 'message' => 'This username has already been taken.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['email', 'trim'],
            ['email', 'required', 'message' => ''],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => 'backend\models\Admin', 'message' => 'This email address has already been taken.'],

            ['password', 'required', 'message' => ''],
            ['password', 'string', 'min' => 6],
        ];
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new Admin();
        $user->nama = ucwords($this->nama);
        $user->username = strtolower($this->username);
        $user->email = strtolower($this->email);
        $user->setPassword($this->password);
        $user->generateAuthKey();

        return $user->save() ? $user : null;
    }
}

