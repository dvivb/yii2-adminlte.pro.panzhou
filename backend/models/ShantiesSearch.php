<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Shanties;

/**
 * ShantiesSearch represents the model behind the search form about `app\models\Shanties`.
 */
class ShantiesSearch extends Shanties
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'house_total', 'house_area', 'house_month_total', 'house_year_total', 'house_year_area', 'house_amount', 'house_amount_area', 'house_surplusr_amount', 'biz_house_total', 'biz_house_area', 'biz_house_month_total', 'biz_house_year_total', 'biz_house_year_area', 'biz_house_amount', 'biz_house_amount_area', 'biz_house_surplusr_amount'], 'integer'],
            [['name', 'address', 'remarks', 'operator', 'created_at', 'updated_at'], 'safe'],
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
        $query = Shanties::find();

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
            'house_month_total' => $this->house_month_total,
            'house_year_total' => $this->house_year_total,
            'house_year_area' => $this->house_year_area,
            'house_amount' => $this->house_amount,
            'house_amount_area' => $this->house_amount_area,
            'house_surplusr_amount' => $this->house_surplusr_amount,
            'biz_house_total' => $this->biz_house_total,
            'biz_house_area' => $this->biz_house_area,
            'biz_house_month_total' => $this->biz_house_month_total,
            'biz_house_year_total' => $this->biz_house_year_total,
            'biz_house_year_area' => $this->biz_house_year_area,
            'biz_house_amount' => $this->biz_house_amount,
            'biz_house_amount_area' => $this->biz_house_amount_area,
            'biz_house_surplusr_amount' => $this->biz_house_surplusr_amount,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'remarks', $this->remarks])
            ->andFilterWhere(['like', 'operator', $this->operator]);

        return $dataProvider;
    }
}
