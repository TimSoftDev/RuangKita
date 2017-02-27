<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "{{%prodi}}".
 *
 * @property integer $id
 * @property integer $id_fakultas
 * @property string $nama
 *
 * @property Fakultas $idFakultas
 * @property User[] $users
 */
class Prodi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%prodi}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_fakultas', 'nama'], 'required'],
            [['id_fakultas'], 'integer'],
            [['nama'], 'string', 'max' => 63],
            [['nama'], 'unique'],
            [['id_fakultas'], 'exist', 'skipOnError' => true, 'targetClass' => Fakultas::className(), 'targetAttribute' => ['id_fakultas' => 'id']],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_fakultas' => 'Id Fakultas',
            'nama' => 'Nama',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getIdFakultas()
    {
        return $this->hasOne(Fakultas::className(), ['id' => 'id_fakultas']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(User::className(), ['prodi' => 'nama']);
    }
}
