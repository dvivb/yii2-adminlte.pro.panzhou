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
        return array_merge(parent::attributes(), ['project_id','start_at','end_at']);
    }
    public function rules()
    {
        return [
            [['project_id'], 'number'],
            [['start_at','end_at'], 'string'],
        ];
    }
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    public function search($params,$type=1)
    {
        $query =  ProjectsList::find()->where(['state'=>0,'type'=>$type])->orderBy(['id'=> SORT_ASC]);
        //$query->joinWith(['customer']);
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
//         if (!($this->load($params) && $this->validate())) {
//             return $dataProvider;
//         }
        $query->andWhere([
            'project_id' => $params['id']//['ProjectListSearch']['id'],
        ]);
        

        if(isset($params['ProjectListSearch']['start_at']) && $params['ProjectListSearch']['start_at'] !=''){
            $query->andWhere(['>=', 'created_at', $params['ProjectListSearch']['start_at'].' 00:00:00']);
        }
        
        if(isset($params['ProjectListSearch']['end_at']) && $params['ProjectListSearch']['end_at'] !=''){
            $query->andWhere(['<=', 'created_at', $params['ProjectListSearch']['end_at'].' 23:59:59']);
        }
        // $query->andFilterWhere(['like', 'name', $this->name]);
        //         $query->andFilterWhere(['like', 'customer.customer_name', $this->customer_name]) ;//<=====加入这句
    
        return $dataProvider;
    }
}