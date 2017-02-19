<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%ruang}}".
 *
 * @property integer $id
 * @property string $nama
 * @property integer $kapasitas
 *
 * @property Ruangan[] $ruangans
 */
class Ruang extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%ruang}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['nama', 'kapasitas'], 'required'],
            [['kapasitas'], 'integer'],
            [['nama'], 'string', 'max' => 63],
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
            'kapasitas' => 'Kapasitas',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getRuangans()
    {
        return $this->hasMany(Ruangan::className(), ['ruang' => 'nama']);
    }
}
