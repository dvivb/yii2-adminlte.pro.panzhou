<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Residentials;

/**
 * ResidentialsSearch represents the model behind the search form about `app\models\Residentials`.
 */
class ResidentialsSearch extends Residentials
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'house_total', 'house_area', 'suite_area', 'house_month_total', 'house_year_total', 'house_year_area', 'house_amount', 'house_surplusr_amount'], 'integer'],
            [['name', 'house_name', 'address', 'remarks', 'operator', 'finished_time', 'created_at', 'updated_at'], 'safe'],
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
        $query = Residentials::find();

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
            'house_total' => $this->house_total,
            'house_area' => $this->house_area,
            'suite_area' => $this->suite_area,
            'house_month_total' => $this->house_month_total,
            'house_year_total' => $this->house_year_total,
            'house_year_area' => $this->house_year_area,
            'house_amount' => $this->house_amount,
            'house_surplusr_amount' => $this->house_surplusr_amount,
            'finished_time' => $this->finished_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'house_name', $this->house_name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'operator', $this->operator]);

        return $dataProvider;
    }
}
