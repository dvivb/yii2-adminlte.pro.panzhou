<?php

namespace backend\modules\arrange\services;
use yii\base\Object;
use app\models\Projects;
use yii\data\ActiveDataProvider;
use yii\base\Module;

use m35\thecsv\theCsv;
use backend\modules\arrange\arrange;
use app\models\Residentials;
/**
 * Default controller for the `project` module
 */
class ArrangeService{
    public static function exportResidential($params){
        $Residentials =Residentials::find()->select([
            "name",
            "house_name",
            "address",
            "house_total",
            "house_area",
            "suite_area",
            "house_month_total",
            "house_year_total",
            "house_year_area",
            "house_amount",
            "house_surplusr_amount",
            "remarks",
            "finished_time",
            "created_at",
            "updated_at",
        ])->where('1=1')->asArray();
    
       
        if(isset($params['ResidentialsSearch']['start_at'])
            && isset($params['ResidentialsSearch']['end_at'])
            && trim($params['ResidentialsSearch']['start_at']) != ''
            && trim($params['ResidentialsSearch']['end_at']) != ''
        ){
            $Residentials->andWhere(['>=','created_at',$params['ResidentialsSearch']['start_at'].' 00:00:00']);
            $Residentials->andWhere(['<=','created_at',$params['ResidentialsSearch']['end_at'].' 23:59:59']);
        }
        if(isset($params['ResidentialsSearch']['name']) && trim($params['ResidentialsSearch']['name']) != ''){
            $Residentials->andFilterWhere(['like','name',$params['ResidentialsSearch']['name']]);
        }
        
        if(isset($params['ResidentialsSearch']['house_name']) && trim($params['ResidentialsSearch']['house_name']) != ''){
            $Residentials->andFilterWhere(['like','house_name',$params['ResidentialsSearch']['house_name']]);
        }
        
        if(isset($params['ResidentialsSearch']['address']) && trim($params['ResidentialsSearch']['address']) != ''){
            $Residentials->andFilterWhere(['like','address',$params['ResidentialsSearch']['address']]);
        }
        if(isset($params['ResidentialsSearch']['house_total']) && trim($params['ResidentialsSearch']['house_total']) != ''){
            $Residentials->andFilterWhere(['house_total'=>$params['ResidentialsSearch']['house_total']]);
        }
        
        if((isset($params['ResidentialsSearch']['name']) && trim($params['ResidentialsSearch']['name']) == '')
            &&  (isset($params['ResidentialsSearch']['start_at']) && trim($params['ResidentialsSearch']['start_at']) == '')
            &&  (isset($params['ResidentialsSearch']['end_at']) && trim($params['ResidentialsSearch']['end_at']) == '')
            &&  (isset($params['ResidentialsSearch']['house_name']) && trim($params['ResidentialsSearch']['house_name']) == '')
            &&  (isset($params['ResidentialsSearch']['address']) && trim($params['ResidentialsSearch']['address']) == '')
            &&  (isset($params['ResidentialsSearch']['house_total']) && trim($params['ResidentialsSearch']['house_total']) == '')
        ){
            $Residentials->andWhere(['>=','created_at',date('Y-m-d H:i:s',strtotime('-1 week'))]);
            $Residentials->andWhere(['<=','created_at',date('Y-m-d H:i:s',time())]);
        }
        
        $res = $Residentials->all();
        $columns = [
            "name"=>"开发商名称",
            "house_name"=>"房源名称",
            "address"=>"地址",
            "house_total"=>"住房套数",
            "house_area"=>"住房面积",
            "suite_area"=>"套房面积",
            "house_month_total"=>"本月（套）",
            "house_year_total"=>"本年度（套）",
            "house_year_area"=>"本年度累计面积(平面)",
            "house_amount"=>"总累计（套）",
            "house_surplusr_amount"=>"剩余套数",
            "remarks"=>"备注",
            "finished_time"=>"交房时间",
            "created_at"=>"创建时间",
            "updated_at"=>"更新时间",
        ];
        $output = [array_values($columns)];
         
        foreach($res as $v){
            array_push($output, array_values($v));
        }
        $filename = '棚改安置房'.date('Y-m-d H:i:s',time()).'.csv';
        theCsv::export([
            'data' => $output,
            'name' => $filename,
        ]);
    }
}