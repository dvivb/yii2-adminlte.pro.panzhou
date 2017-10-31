<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LandlevyDetail;

/**
 * LandlevyDetailSearch represents the model behind the search form about `app\models\LandlevyDetail`.
 */
class LandlevyDetailSearch extends LandlevyDetail
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'landlevy_list_id', 'dictionaries_id', 'parent_id'], 'integer'],
            [['subject', 'name', 'unit', 'created_at', 'updated_at'], 'safe'],
            [['price', 'levy_value', 'compensation_price'], 'number'],
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
        $query = LandlevyDetail::find();

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
            'landlevy_list_id' => $this->landlevy_list_id,
            'dictionaries_id' => $this->dictionaries_id,
            'parent_id' => $this->parent_id,
            'price' => $this->price,
            'levy_value' => $this->levy_value,
            'compensation_price' => $this->compensation_price,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'subject', $this->subject])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'unit', $this->unit]);

        return $dataProvider;
    }
}
