<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LandlevyTotal;

/**
 * LandlevyTotalSearch represents the model behind the search form about `app\models\LandlevyTotal`.
 */
class LandlevyTotalSearch extends LandlevyTotal
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'project_id', 'periods', 'total_households'], 'integer'],
            [['total_area', 'total_amount'], 'number'],
            [['operator', 'approval', 'created_at', 'updated_at'], 'safe'],
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
        $query = LandlevyTotal::find();

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
            'project_id' => $this->project_id,
            'periods' => $this->periods,
            'total_households' => $this->total_households,
            'total_area' => $this->total_area,
            'total_amount' => $this->total_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'operator', $this->operator])
            ->andFilterWhere(['like', 'approval', $this->approval]);

        return $dataProvider;
    }
}
