<?php

namespace common\models;

use Yii;

class Fakultas extends \yii\db\ActiveRecord
{
    public static function tableName()
    {
        return '{{%fakultas}}';
    }

    public function rules()
    {
        return [
            [['nama', 'alamat'], 'required'],
            [['nama'], 'string', 'max' => 63],
            [['alamat'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
        ];
    }

    public function getProdi()
    {
        return $this->hasMany(Prodi::className(), ['id_fakultas' => 'id']);
    }
}
