<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "sesi_waktu".
 *
 * @property string $sesi
 * @property string $mulai
 * @property string $selesai
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
            [['sesi', 'mulai', 'selesai'], 'required'],
            [['mulai', 'selesai'], 'safe'],
            [['sesi'], 'string', 'max' => 32],
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
        ];
    }
}
