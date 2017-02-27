<?php

namespace common\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\SesiWaktu;

/**
 * SesiWaktuSearch represents the model behind the search form about `common\models\SesiWaktu`.
 */
class SesiWaktuSearch extends SesiWaktu
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['sesi', 'mulai', 'selesai', 'tampil'], 'safe'],
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
        $query = SesiWaktu::find();

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
            'mulai' => $this->mulai,
            'selesai' => $this->selesai,
        ]);

        $query->andFilterWhere(['like', 'sesi', $this->sesi])
            ->andFilterWhere(['like', 'tampil', $this->tampil]);

        return $dataProvider;
    }
}
