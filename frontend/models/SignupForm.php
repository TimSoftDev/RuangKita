<?php
namespace frontend\models;

use yii\base\Model;
use common\models\User;
use common\models\Prodi;
use yii\web\UploadedFile;

class SignupForm extends Model
{
    public $nim;
    public $nama_depan;
    public $nama_belakang;
    public $prodi;
    public $username;
    public $email;
    public $password;
    public $foto;

    private $namaFoto;


    public function rules()
    {
        return [
            ['nim', 'trim'],
            ['nim', 'required', 'message' => ''],            
            ['nim', 'unique', 'targetClass' => '\common\models\User', 'message' => 'NIM sudah digunakan.'],
            ['nim', 'string', 'min' => 8, 'max' => 8],

            ['nama_depan', 'trim'],
            ['nama_depan', 'required', 'message' => ''],
            ['nama_depan', 'string', 'max' => 64],

            ['nama_belakang', 'trim'],
            ['nama_belakang', 'required', 'message' => ''],
            ['nama_belakang', 'string', 'max' => 64],

            ['username', 'trim'],
            ['username', 'required', 'message' => ''],
            ['username', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Username tidak tersedia.'],
            ['username', 'string', 'min' => 2, 'max' => 255],

            ['prodi', 'trim'],
            ['prodi', 'required', 'message' => ''],

            ['email', 'trim'],
            ['email', 'required', 'message' => ''],
            ['email', 'email'],
            ['email', 'string', 'max' => 255],
            ['email', 'unique', 'targetClass' => '\common\models\User', 'message' => 'Email tidak tersedia.'],

            ['password', 'required', 'message' => ''],
            ['password', 'string', 'min' => 6],

            ['foto', 'required', 'message' => 'Foto wajib ada.'],
            [['foto'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg, jpeg']
        ];
    }

    public function attributeLabels()
    {
        return [
            'nim' => 'NIM',
            'prodi' => 'Nama Prodi',
        ];
    }

    public function getProdi()
    {
        return $this->hasOne(Prodi::className(), ['nama' => 'prodi']);
    }

    public function signup()
    {
        if (!$this->validate()) {
            return null;
        }
        
        $user = new User();
        $user->nim = strtoupper($this->nim);        
        $user->nama_depan = ucwords($this->nama_depan);
        $user->nama_belakang = ucwords($this->nama_belakang);
        $user->prodi = $this->prodi;
        $user->username = strtolower($this->username);
        $user->email = strtolower($this->email);
        $user->setPassword($this->password);
        $user->generateAuthKey();

        $namaFoto = strtolower($this->username);
        $user->foto = '@web/uploads/' . $namaFoto. '.' . $this->foto->extension;
        $this->foto->saveAs('uploads/' . $namaFoto . '.' . $this->foto->extension);

        return $user->save() ? $user : null;
    }
}