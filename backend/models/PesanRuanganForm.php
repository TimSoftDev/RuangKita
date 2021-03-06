<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Ruangan;
use common\models\Ruang;

class PesanRuanganForm extends Model
{
    public $nim_mahasiswa;
    public $no_surat;
    public $ruang;
    public $waktu_mulai;
    public $waktu_selesai;    

    public function rules()
    {
        return [
            [['nim_mahasiswa', 'ruang', 'no_surat', 'waktu_mulai', 'waktu_selesai'], 'required'],
            ['nim_mahasiswa', 'string', 'min' => 8, 'max' => 8],
            [['ruang', 'no_surat'], 'string', 'max' => 63],
            [['ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['ruang' => 'nama']],
            [['ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['ruang' => 'nama']],           
        ];
    }

    public function pesan()
    {
        if (!$this->validate()) {
            return null;
        }

        $hari = date('Y-m-d H:i');

        if ($this->waktu_mulai > $hari && $this->waktu_mulai < $this->waktu_selesai ) {

            $user = new Ruangan();
            $user->no_surat = $this->no_surat;

            $user->ruang = $this->ruang;
            $user->waktu_mulai = $this->waktu_mulai;
            $user->waktu_selesai = $this->waktu_selesai;      
        
            $user->nim_mahasiswa = strtoupper($this->nim_mahasiswa);
            $user->status = 'Aktif';
            $user->waktu_pesan = $hari;            
            $user->waktu_validasi = $hari;
            $user->validator = ucwords(Yii::$app->user->identity->nama);

            return $user->save() ? $user : null;
     	      	
        }
    }
}
