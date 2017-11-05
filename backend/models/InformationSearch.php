<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Information;

/**
 * InformationSearch represents the model behind the search form about `app\models\Information`.
 */
class InformationSearch extends Information
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'arrange_type', 'permute_type', 'house_area', 'permute_area', 'use_area', 'arrange_house_total', 'arrange_house_area', 'arrange_clearing', 'arrange_is_clearing'], 'integer'],
            [['name', 'identification', 'phone', 'towns', 'address', 'booklet', 'contract_no', 'arrange_address', 'arrange_root_no', 'arrange_delivery_time', 'remarks', 'upload_file', 'operator', 'sign_time', 'created_at', 'updated_at'], 'safe'],
        ];
    }
    public function attributes()
    {
        // 添加关联字段到可搜索特性
        return array_merge(parent::attributes(), ['end_at']);
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
        $query = Information::find();

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
            'arrange_type' => $this->arrange_type,
            'permute_type' => $this->permute_type,
            'house_area' => $this->house_area,
            'permute_area' => $this->permute_area,
            'use_area' => $this->use_area,
            'arrange_house_total' => $this->arrange_house_total,
            'arrange_house_area' => $this->arrange_house_area,
            'arrange_clearing' => $this->arrange_clearing,
            'arrange_delivery_time' => $this->arrange_delivery_time,
            'arrange_is_clearing' => $this->arrange_is_clearing,
            'sign_time' => $this->sign_time,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'identification', $this->identification])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'towns', $this->towns])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'booklet', $this->booklet])
            ->andFilterWhere(['like', 'contract_no', $this->contract_no])
            ->andFilterWhere(['like', 'arrange_address', $this->arrange_address])
            ->andFilterWhere(['like', 'arrange_root_no', $this->arrange_root_no])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'upload_file', $this->upload_file])
            ->andFilterWhere(['like', 'operator', $this->operator]);

        return $dataProvider;
    }
}
