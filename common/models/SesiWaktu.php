<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%sesi_waktu}}".
 *
 * @property integer $id
 * @property string $sesi
 * @property string $mulai
 * @property string $selesai
 * @property string $tampil
 */
class SesiWaktu extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%sesi_waktu}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['sesi', 'mulai', 'selesai', 'tampil'], 'required'],
            [['mulai', 'selesai'], 'safe'],
            [['sesi', 'tampil'], 'string', 'max' => 32],
            [['tampil'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'sesi' => 'Sesi',
            'mulai' => 'Mulai',
            'selesai' => 'Selesai',
            'tampil' => 'Tampil',
        ];
    }
}
