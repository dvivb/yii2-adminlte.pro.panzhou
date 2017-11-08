<?php

namespace backend\modules\houselevy\services;
use yii\base\Module;
use m35\thecsv\theCsv;
use backend\modules\landlevy\landlevy;
use app\models\LandlevyTotal;
use app\models\HouselevyTotal;

class HouselevyService {
    public static function HouseLevyTotalExport($params){
        $query = HouselevyTotal::find()->select([
            'project_id',
            'periods',
            'total_households',
            'total_area',
            'total_amount',
            'approval',
            'created_at',
            'updated_at',
        ])->where(['project_id'=>$params['HouselevyTotalSearch']['project_id']])->asArray();
        
        // add conditions that should always apply here
        if(isset($params['HouselevyTotalSearch']['periods']) && trim($params['HouselevyTotalSearch']['periods']) != ''){
            $query->andFilterWhere(['periods'=>$params['HouselevyTotalSearch']['periods']]);
        }
        
        if(isset($params['HouselevyTotalSearch']['total_households']) && trim($params['HouselevyTotalSearch']['total_households']) != ''){
            $query->andFilterWhere(['total_households'=>$params['HouselevyTotalSearch']['total_households']]);
        }
        
        if(isset($params['HouselevyTotalSearch']['address']) && trim($params['HouselevyTotalSearch']['address']) != ''){
            $query->andFilterWhere(['like','address',$params['HouselevyTotalSearch']['address']]);
        }
        if(isset($params['HouselevyTotalSearch']['total_area']) && trim($params['HouselevyTotalSearch']['total_area']) != ''){
            $query->andFilterWhere(['total_area'=>$params['HouselevyTotalSearch']['total_area']]);
        }
        
        $res = $query->all();
        $columns = [
            'project_id'=>'项目id',
            'periods'=>'期数',
            'total_households'=>'总户数',
            'total_area'=>'总面积（平方）',
            'total_amount'=>'总金额（元）',
            'approval'=>'审批进度',
            "created_at"=>"创建时间",
            "updated_at"=>"更新时间",
        ];
        $output = [array_values($columns)];
         
        foreach($res as $v){
            $v['periods'] = "第（".$v['periods']."）期";
            array_push($output, array_values($v));
        }
        $filename = '房屋征补项目花名册'.date('Y-m-d H:i:s',time()).'.csv';
        theCsv::export([
            'data' => $output,
            'name' => $filename,
        ]);
    }
}