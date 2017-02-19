<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ruangan}}".
 *
 * @property integer $id
 * @property string $nim_mahasiswa
 * @property string $ruang
 * @property string $no_surat
 * @property string $waktu_mulai
 * @property string $waktu_selesai
 * @property string $status
 * @property string $waktu_pesan
 * @property string $waktu_validasi
 * @property string $validator
 *
 * @property Admin[] $admins
 * @property Ruang $ruang0
 */
class Ruangan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ruangan}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim_mahasiswa', 'ruang', 'no_surat', 'waktu_mulai', 'waktu_selesai', 'status', 'waktu_pesan', 'waktu_validasi', 'validator'], 'required'],
            [['waktu_mulai', 'waktu_selesai', 'waktu_pesan', 'waktu_validasi'], 'safe'],
            [['status'], 'string'],
            [['nim_mahasiswa'], 'string', 'max' => 8],
            [['ruang', 'no_surat', 'validator'], 'string', 'max' => 63],
            [['ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['ruang' => 'nama']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nim_mahasiswa' => 'Nim Mahasiswa',
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

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuang0()
    {
        return $this->hasOne(Ruang::className(), ['nama' => 'ruang']);
    }
}
