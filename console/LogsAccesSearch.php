<?php

namespace console;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use console\LogsAcces;

/**
 * LogsAccesSearch represents the model behind the search form of `console\LogsAcces`.
 */
class LogsAccesSearch extends LogsAcces
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'status', 'countbyte'], 'integer'],
            [['IP', 'datetime', 'type_request', 'log'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = LogsAcces::find();

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
            'status' => $this->status,
            'countbyte' => $this->countbyte,
        ]);

        $query->andFilterWhere(['like', 'IP', $this->IP])
            ->andFilterWhere(['like', 'datetime', $this->datetime])
            ->andFilterWhere(['like', 'type_request', $this->type_request])
            ->andFilterWhere(['like', 'log', $this->log]);

        return $dataProvider;
    }
}
