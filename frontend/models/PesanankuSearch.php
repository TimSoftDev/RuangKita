<?php

namespace frontend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ruangan;

class PesanankuSearch extends Ruangan
{
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nim_mahasiswa', 'ruang', 'no_surat', 'waktu_mulai', 'waktu_selesai', 'status', 'waktu_pesan', 'waktu_validasi', 'validator'], 'safe'],
        ];
    }

    public function scenarios()
    {
        return Model::scenarios();
    }

    public function semua($params)
    {
        $query = Ruangan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'waktu_pesan' => $this->waktu_pesan,
        ]);

        $query->andFilterWhere(['like', 'nim_mahasiswa', Yii::$app->user->identity->nim])
            ->andFilterWhere(['like', 'ruang', $this->ruang])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }

    public function aktif($params)
    {
        $query = Ruangan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'waktu_pesan' => $this->waktu_pesan,
        ]);

        $query->andFilterWhere(['like', 'nim_mahasiswa', Yii::$app->user->identity->nim])
            ->andFilterWhere(['like', 'ruang', $this->ruang])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'status', 'Aktif']);

        return $dataProvider;
    }

    public function menunggu($params)
    {
        $query = Ruangan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'waktu_pesan' => $this->waktu_pesan,
        ]);

        $query->andFilterWhere(['like', 'nim_mahasiswa', Yii::$app->user->identity->nim])
            ->andFilterWhere(['like', 'ruang', $this->ruang])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'status', 'Menunggu Validasi']);

        return $dataProvider;
    }

    public function nonaktif($params)
    {
        $query = Ruangan::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_pesan' => $this->waktu_pesan,
        ]);

        $query->andFilterWhere(['like', 'nim_mahasiswa', Yii::$app->user->identity->nim])
            ->andFilterWhere(['like', 'ruang', $this->ruang])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'waktu_selesai', 0]);

        return $dataProvider;
    }
}
