<?php
namespace app\models;
use app\models\Projects;
use yii\base\Model;
use yii\data\ActiveDataProvider;
class ProjectsSearch extends Projects
{
    public $name;
    public $start_at;
    public $end_at;
    public function attributes()
    {
        // 添加关联字段到可搜索特性
        return array_merge(parent::attributes(), ['name','start_at','end_at']);
    }
    public function rules()
    {
        return [
            [['name','start_at','end_at'], 'string'],
        ];
    }
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params)
    {
        $query =  Projects::find()->where(['state'=>0])->orderBy(['id'=> SORT_DESC]);
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
     
        if(isset($params['ProjectsSearch']['start_at']) && $params['ProjectsSearch']['start_at'] !=''){
            $query->andWhere(['>=', 'created_at', $params['ProjectsSearch']['start_at'].' 00:00:00']);
        }
        
        if(isset($params['ProjectsSearch']['end_at']) && $params['ProjectsSearch']['end_at'] !=''){
            $query->andWhere(['<=', 'created_at', $params['ProjectsSearch']['end_at'].' 23:59:59']);
        }
//         $query->andFilterWhere(['like', 'customer.customer_name', $this->customer_name]) ;//<=====加入这句
        
        return $dataProvider;
    }
}