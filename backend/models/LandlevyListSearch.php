<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\LandlevyList;

/**
 * LandlevyListSearch represents the model behind the search form about `app\models\LandlevyList`.
 */
class LandlevyListSearch extends LandlevyList
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'landlevy_total_id', 'gender'], 'integer'],
            [['land_survey_no', 'land_map_no', 'name', 'identification', 'phone', 'towns', 'address', 'bank_card', 'bank_name', 'upload_file', 'created_at', 'updated_at'], 'safe'],
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
        $query = LandlevyList::find();

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
            'landlevy_total_id' => $this->landlevy_total_id,
            'gender' => $this->gender,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'land_survey_no', $this->land_survey_no])
            ->andFilterWhere(['like', 'land_map_no', $this->land_map_no])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'identification', $this->identification])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'towns', $this->towns])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'bank_card', $this->bank_card])
            ->andFilterWhere(['like', 'bank_name', $this->bank_name])
            ->andFilterWhere(['like', 'upload_file', $this->upload_file]);

        return $dataProvider;
    }
}
