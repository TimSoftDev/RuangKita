<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sesi_waktu".
 *
 * @property string $sesi
 * @property string $mulai
 * @property string $selesai
 * @property string $tampil
 *
 * @property Pesanan[] $pesanans
 */
class SesiWaktu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'sesi_waktu';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sesi', 'mulai', 'selesai', 'tampil'], 'required'],
            [['mulai', 'selesai'], 'safe'],
            [['sesi'], 'string', 'max' => 32],
            [['tampil'], 'string', 'max' => 63],
            [['sesi'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'sesi' => 'Sesi',
            'mulai' => 'Mulai',
            'selesai' => 'Selesai',
            'tampil' => 'Tampil',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getPesanans()
    {
        return $this->hasMany(Pesanan::className(), ['sesi_waktu' => 'sesi']);
    }
}
