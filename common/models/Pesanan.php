<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "pesanan".
 *
 * @property integer $id
 * @property string $nim_mahasiswa
 * @property integer $id_ruang
 * @property string $no_surat
 * @property string $sesi_waktu
 * @property string $tanggal_mulai
 * @property string $tanggal_selesai
 * @property string $status
 * @property string $waktu_pesan
 * @property string $waktu_validasi
 *
 * @property Ruang $idRuang
 * @property SesiWaktu $sesiWaktu
 * @property User $nimMahasiswa
 */
class Pesanan extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pesanan';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nim_mahasiswa', 'id_ruang', 'no_surat', 'sesi_waktu', 'tanggal_mulai', 'tanggal_selesai', 'status', 'waktu_pesan', 'waktu_validasi'], 'required'],
            [['id_ruang'], 'integer'],
            [['tanggal_mulai', 'tanggal_selesai', 'waktu_pesan', 'waktu_validasi'], 'safe'],
            [['status'], 'string'],
            [['nim_mahasiswa'], 'string', 'max' => 8],
            [['no_surat'], 'string', 'max' => 63],
            [['sesi_waktu'], 'string', 'max' => 32],
            [['id_ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['id_ruang' => 'id']],
            [['sesi_waktu'], 'exist', 'skipOnError' => true, 'targetClass' => SesiWaktu::className(), 'targetAttribute' => ['sesi_waktu' => 'sesi']],
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
            'id_ruang' => 'Id Ruang',
            'no_surat' => 'No Surat',
            'sesi_waktu' => 'Sesi Waktu',
            'tanggal_mulai' => 'Tanggal Mulai',
            'tanggal_selesai' => 'Tanggal Selesai',
            'status' => 'Status',
            'waktu_pesan' => 'Waktu Pesan',
            'waktu_validasi' => 'Waktu Validasi',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdRuang()
    {
        return $this->hasOne(Ruang::className(), ['id' => 'id_ruang']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getSesiWaktu()
    {
        return $this->hasOne(SesiWaktu::className(), ['sesi' => 'sesi_waktu']);
    }

}
