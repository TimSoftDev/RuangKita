<?php
namespace backend\models;

use Yii;
use yii\base\Model;
use common\models\Ruangan;
use common\models\Ruang;
use common\models\SesiWaktu;

class TambahDataPemesanan extends Model
{
    public $tanggal;
    public $nim_mahasiswa;
    public $no_surat;
    public $ruang;
    public $sesi_waktu;

    public function rules()
    {
        return [
            [['nim_mahasiswa', 'ruang', 'no_surat', 'tanggal', 'sesi_waktu'], 'required', 'message'=> ''],
            [['ruang', 'no_surat'], 'string', 'max' => 63],
            [['ruang'], 'exist', 'skipOnError' => true, 'targetClass' => Ruang::className(), 'targetAttribute' => ['ruang' => 'nama']],
            [['nim_mahasiswa'], 'exist', 'skipOnError' => true, 'targetClass' => User::className(), 'targetAttribute' => ['nim_mahasiswa' => 'nim'], 'message' => 'NIM belum terdaftar'],     
        ];
    }

    public function tambah()
    {
        if (!$this->validate()) {
            return null;
        }

        $sesi = SesiWaktu::find()
            ->where(['tampil' => $this->sesi_waktu])
            ->one();

        $waktu_mulai = $this->tanggal . ' ' . $sesi->mulai;
        $waktu_selesai = $this->tanggal . ' ' . $sesi->selesai;

        $ruangan = Ruangan::find()
            ->where(['ruang' => $this->ruang])
            ->andWhere(['between', 'waktu_selesai', $waktu_mulai, $waktu_selesai])
            ->andWhere(['status' => 'Aktif'])
            ->count();

        $hari = date('Y-m-d H:i');

        if ($waktu_mulai < $hari) {

            Yii::$app->session->setFlash('error', 'Maaf, tanggal yang anda masukkan tidak sesuai.');

        } else if ($ruangan > 0) {

            Yii::$app->session->setFlash('error', 'Maaf, ruangan sudah digunakan.');
        
        } else {

            $user = new Ruangan();
            $user->no_surat = $this->no_surat;

            $user->ruang = $this->ruang;
            $user->waktu_mulai = $waktu_mulai;
            $user->waktu_selesai = $waktu_selesai;      
        
            $user->nim_mahasiswa = strtoupper($this->nim_mahasiswa);
            $user->status = 'Aktif';
            $user->waktu_pesan = $hari;            
            $user->waktu_validasi = $hari;
            $user->validator = Yii::$app->user->identity->nama;

            return $user->save() ? $user : null;
        }
    }
}
