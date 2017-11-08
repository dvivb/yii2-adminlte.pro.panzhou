<?php

namespace backend\modules\landlevy\services;
use yii\base\Module;
use m35\thecsv\theCsv;
use backend\modules\landlevy\landlevy;
use app\models\LandlevyTotal;


class LandlevyService {
    public static function LandlevyExport($params){
        $query = LandlevyTotal::find()->select([
            'project_id',
            'periods',
            'total_households',
            'total_area',
            'total_amount',
            'approval',
            'created_at',
            'updated_at',
        ])->where(['project_id'=>$params['LandlevyTotalSearch']['project_id']])->asArray();
        
        // add conditions that should always apply here
        if(isset($params['LandlevyTotalSearch']['periods']) && trim($params['LandlevyTotalSearch']['periods']) != ''){
            $query->andFilterWhere(['periods'=>$params['LandlevyTotalSearch']['periods']]);
        }
        
        if(isset($params['LandlevyTotalSearch']['total_households']) && trim($params['LandlevyTotalSearch']['total_households']) != ''){
            $query->andFilterWhere(['total_households'=>$params['LandlevyTotalSearch']['total_households']]);
        }
        
        if(isset($params['LandlevyTotalSearch']['address']) && trim($params['LandlevyTotalSearch']['address']) != ''){
            $query->andFilterWhere(['like','address',$params['LandlevyTotalSearch']['address']]);
        }
        if(isset($params['LandlevyTotalSearch']['total_area']) && trim($params['LandlevyTotalSearch']['total_area']) != ''){
            $query->andFilterWhere(['total_area'=>$params['LandlevyTotalSearch']['total_area']]);
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
        $filename = '土地征补项目花名册'.date('Y-m-d H:i:s',time()).'.csv';
        theCsv::export([
            'data' => $output,
            'name' => $filename,
        ]);
        }
    }
    
