<?php

namespace common\models;

use Yii;

class User_ extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%user}}';
    }

    public function rules()
    {
        return [
            [['nim', 'nama_depan', 'nama_belakang', 'id_fakultas', 'id_prodi', 'username', 'auth_key', 'password_hash', 'email', 'foto', 'created_at', 'updated_at'], 'required'],
            [['id_fakultas', 'id_prodi', 'status', 'created_at', 'updated_at'], 'integer'],
            [['nim'], 'string', 'max' => 8],
            [['nama_depan', 'nama_belakang'], 'string', 'max' => 63],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['foto'], 'string', 'max' => 256],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['nim'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['id_prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['id_prodi' => 'id']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim' => 'Nim',
            'nama_depan' => 'Nama Depan',
            'nama_belakang' => 'Nama Belakang',
            'id_prodi' => 'Id Prodi',
            'username' => 'Username',
            'auth_key' => 'Auth Key',
            'password_hash' => 'Password Hash',
            'password_reset_token' => 'Password Reset Token',
            'email' => 'Email',
            'status' => 'Status',
            'foto' => 'Foto',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }

    public function getIdProdi()
    {
        return $this->hasOne(Prodi::className(), ['id' => 'id_prodi']);
    }
}
