<?php

namespace app\models;

use Yii;
use app\models\ProjectsList;
use yii\base\Model;
use yii\data\ActiveDataProvider;
class ProjectListSearch extends ProjectsList
{
    public $name;
    public function attributes()
    {
        // 添加关联字段到可搜索特性
        return array_merge(parent::attributes(), ['project_id']);
    }
    public function rules()
    {
        return [
            [['project_id'], 'number'],
        ];
    }
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params)
    {
        $query =  ProjectsList::find()->where(['state'=>0])->orderBy(['id'=> SORT_ASC]);
        //$query->joinWith(['customer']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
//         if (!($this->load($params) && $this->validate())) {
//             return $dataProvider;
//         }
       
        $query->andWhere([
            'project_id' => yii::$app->request->get('id'),
        ]);
        // $query->andFilterWhere(['like', 'name', $this->name]);
        //         $query->andFilterWhere(['like', 'customer.customer_name', $this->customer_name]) ;//<=====加入这句
    
        return $dataProvider;
    }
}