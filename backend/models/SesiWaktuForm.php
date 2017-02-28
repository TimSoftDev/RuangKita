<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\SesiWaktu;

class SesiWaktuForm extends Model
{
    public $sesi;
    public $mulai;
    public $selesai;

    public function rules()
    {
        return [
            [['sesi', 'mulai', 'selesai'], 'required', 'message'=> ''],
            [['sesi'], 'string', 'max' => 32],            
            [['sesi'], 'unique', 'targetClass' => 'common\models\SesiWaktu', 'message' => 'Sesi sudah tersedia.'],
        ];
    }

    public function tambah()
    {
        if (!$this->validate()) {
            return null;
        }

        $tampil = $this->mulai . ' - ' . $this->selesai;

        $waktu = SesiWaktu::find()
            ->where(['tampil' => $tampil])
            ->count();

        if ($waktu > 0) {

            Yii::$app->session->setFlash('error', 'Maaf, waktu tersebut sudah tersedia.');
        
        } else if ($this->mulai >= $this->selesai) {

            Yii::$app->session->setFlash('error', 'Maaf, waktu selesai harus lebih besar dari waktu mulai.');
        
        } else {

            $tambah = new SesiWaktu();
            $tambah->sesi = strtoupper($this->sesi);
            $tambah->mulai = $this->mulai;
            $tambah->selesai = $this->selesai;
            $tambah->tampil = $tampil;

            return $tambah->save() ? $tambah : null;
        }
    }
}
