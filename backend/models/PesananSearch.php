<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Pesanan;

/**
 * PesananSearch represents the model behind the search form about `common\models\Pesanan`.
 */
class PesananSearch extends Pesanan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'id_ruang'], 'integer'],
            [['nim_mahasiswa', 'no_surat', 'sesi_waktu', 'tanggal_mulai', 'tanggal_selesai', 'status', 'waktu_pesan', 'waktu_validasi'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Pesanan::find();

        // add conditions that should always apply here

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
            'id' => $this->id,
            'id_ruang' => $this->id_ruang,
            'tanggal_mulai' => $this->tanggal_mulai,
            'tanggal_selesai' => $this->tanggal_selesai,
            'waktu_pesan' => $this->waktu_pesan,
            'waktu_validasi' => $this->waktu_validasi,
        ]);

        $query->andFilterWhere(['like', 'nim_mahasiswa', $this->nim_mahasiswa])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'sesi_waktu', $this->sesi_waktu])
            ->andFilterWhere(['like', 'status', $this->status]);

        return $dataProvider;
    }
}
