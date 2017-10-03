<?php
namespace app\models;
use app\models\Projects;
use yii\base\Model;
use yii\data\ActiveDataProvider;
class ProjectsSearch extends Projects
{
    public $name;
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
        $query =  Projects::find()->orderBy(['id'=> SORT_DESC]);
        //$query->joinWith(['customer']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
//         $dataProvider->setSort([
//             'attributes' => [
//                 /* 其它字段不要动 */
//                 /*  下面这段是加入的 */
//                 /*=============*/
//                 'customer_name' => [
//                     'id' => ['customer.customer_name' => SORT_ASC],
//                     'desc' => ['customer.customer_name' => SORT_DESC],
//                     'label' => 'Customer Name'
//                 ],
//                 /*=============*/
//             ]
//         ]);
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