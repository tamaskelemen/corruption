<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\Competition;

/**
 * CompetitionSearch represents the model behind the search form of `frontend\models\Competition`.
 */
class CompetitionSearch extends Competition
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['proc_id', 'company_id', 'id'], 'integer'],
            [['created_at'], 'safe'],
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
        $query = Competition::find();

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
            'proc_id' => $this->proc_id,
            'company_id' => $this->company_id,
            'created_at' => $this->created_at,
            'id' => $this->id,
        ]);

        return $dataProvider;
    }
}
