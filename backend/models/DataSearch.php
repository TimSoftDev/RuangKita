<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Ruangan;

/**
 * DataSearch represents the model behind the search form about `common\models\Ruangan`.
 */
class DataSearch extends Ruangan
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['nim_mahasiswa', 'ruang', 'no_surat', 'waktu_mulai', 'waktu_selesai', 'status', 'waktu_pesan', 'waktu_validasi', 'validator'], 'safe'],
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
        $query = Ruangan::find();

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
            'waktu_mulai' => $this->waktu_mulai,
            'waktu_selesai' => $this->waktu_selesai,
            'waktu_pesan' => $this->waktu_pesan,
            'waktu_validasi' => $this->waktu_validasi,
        ]);

        $query->andFilterWhere(['like', 'nim_mahasiswa', $this->nim_mahasiswa])
            ->andFilterWhere(['like', 'ruang', $this->ruang])
            ->andFilterWhere(['like', 'no_surat', $this->no_surat])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'validator', $this->validator]);

        return $dataProvider;
    }
}
