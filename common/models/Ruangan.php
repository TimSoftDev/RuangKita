<?php

namespace common\models;

use Yii;

class Ruangan extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%ruangan}}';
    }

    public function rules()
    {
        return [
            [['nim_mahasiswa', 'ruang', 'no_surat', 'waktu_mulai', 'waktu_selesai', 'status', 'waktu_pesan', 'waktu_validasi', 'validator'], 'required', 'message' => ''],
            [['waktu_mulai', 'waktu_selesai', 'waktu_pesan', 'waktu_validasi'], 'safe'],
            [['status'], 'string'],
            [['nim_mahasiswa'], 'string', 'min' => 8, 'max' => 8, 'message' => 'NIM wajib 8 digit.'],
            [['ruang', 'no_surat', 'validator'], 'string', 'max' => 63],
            [['ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['ruang' => 'nama']],
            [['nim_mahasiswa'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nim_mahasiswa' => 'nim']],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim_mahasiswa' => 'NIM Mahasiswa',
            'ruang' => 'Ruang',
            'no_surat' => 'No Surat',
            'waktu_mulai' => 'Waktu Mulai',
            'waktu_selesai' => 'Waktu Selesai',
            'status' => 'Status',
            'waktu_pesan' => 'Waktu Pesan',
            'waktu_validasi' => 'Waktu Validasi',
            'validator' => 'Validator',
        ];
    }

    public function getRuang0()
    {
        return $this->hasOne(Ruang::className(), ['nama' => 'ruang']);
    }

    public function getNimMahasiswa()
    {
        return $this->hasOne(User::className(), ['nim' => 'nim_mahasiswa']);
    }
}
