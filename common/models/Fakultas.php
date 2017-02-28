<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%fakultas}}".
 *
 * @property integer $id
 * @property string $nama
 * @property string $alamat
 *
 * @property Prodi[] $prodis
 */
class Fakultas extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%fakultas}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'alamat'], 'required'],
            [['nama'], 'string', 'max' => 63],
            [['alamat'], 'string', 'max' => 255],
            [['nama'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'nama' => 'Nama',
            'alamat' => 'Alamat',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getProdis()
    {
        return $this->hasMany(Prodi::className(), ['id_fakultas' => 'id']);
    }
}
