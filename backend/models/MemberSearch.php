<?php
namespace app\models;
use yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Member;
class MemberSearch extends Member
{
    public function attributes()
    {
        // 添加关联字段到可搜索特性
        return array_merge(parent::attributes(), ['name']);
    }
    public function rules()
    {
        return [
            [['name'], 'string'],
        ];
    }
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params)
    {
        $projectlistId = yii::$app->request->get('id');
        $query =  Member::find()->where(['state'=>0,'projectlist_id'=>$projectlistId])->orderBy(['id'=> SORT_DESC]);
        //$query->joinWith(['customer']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }
    
    
        //         $query->andFilterWhere([
        //             'id' => $this->id,
        //             'name' => $this->name,
        //         ]);
        $query->andFilterWhere(['like', 'name', $this->name]);
        //         $query->andFilterWhere(['like', 'customer.customer_name', $this->customer_name]) ;//<=====加入这句
    
        return $dataProvider;
    }
}
