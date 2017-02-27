<?php

namespace backend\models;

use Yii;

/**
 * This is the model class for table "{{%user}}".
 *
 * @property integer $id
 * @property string $nim
 * @property string $nama_depan
 * @property string $nama_belakang
 * @property string $prodi
 * @property string $username
 * @property string $auth_key
 * @property string $password_hash
 * @property string $password_reset_token
 * @property string $email
 * @property integer $status
 * @property string $foto
 * @property integer $created_at
 * @property integer $updated_at
 *
 * @property Ruangan[] $ruangans
 * @property Prodi $prodi0
 */
class User extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%user}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim', 'nama_depan', 'nama_belakang', 'prodi', 'username', 'auth_key', 'password_hash', 'email', 'foto', 'created_at', 'updated_at'], 'required'],
            [['status', 'created_at', 'updated_at'], 'integer'],
            [['nim'], 'string', 'max' => 8],
            [['nama_depan', 'nama_belakang', 'prodi'], 'string', 'max' => 63],
            [['username', 'password_hash', 'password_reset_token', 'email'], 'string', 'max' => 255],
            [['auth_key'], 'string', 'max' => 32],
            [['foto'], 'string', 'max' => 256],
            [['username'], 'unique'],
            [['email'], 'unique'],
            [['nim'], 'unique'],
            [['password_reset_token'], 'unique'],
            [['prodi'], 'exist', 'skipOnError' => true, 'targetClass' => Prodi::className(), 'targetAttribute' => ['prodi' => 'nama']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim' => 'Nim',
            'nama_depan' => 'Nama Depan',
            'nama_belakang' => 'Nama Belakang',
            'prodi' => 'Prodi',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuangans()
    {
        return $this->hasMany(Ruangan::className(), ['nim_mahasiswa' => 'nim']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdi0()
    {
        return $this->hasOne(Prodi::className(), ['nama' => 'prodi']);
    }
}
