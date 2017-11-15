<?php

namespace backend\modules\arrange\services;
use yii\base\Object;
use app\models\Projects;
use yii\data\ActiveDataProvider;
use yii\base\Module;

use m35\thecsv\theCsv;
use backend\modules\arrange\arrange;
use app\models\Residentials;
use app\models\Shanties;
use app\models\Information;
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
    public static function exportShanty($params){
        $Shanty =Shanties::find()->select([
            "name",
            "address",
            "house_total",
            "house_area",
            "house_month_total",
            "house_year_total",
            "house_year_area",
            "house_amount",
            "house_amount_area",
            "house_surplusr_amount",
            "biz_house_total",
            "biz_house_area",
            "biz_house_month_total",
            "biz_house_year_total",
            "biz_house_year_area",
            "biz_house_amount",
            "biz_house_amount_area",
            "biz_house_surplusr_amount",
            "remarks",
            "created_at",
            "updated_at",
        ])->where('1=1')->asArray();
    
         
        if(isset($params['ShantiesSearch']['start_at'])
            && isset($params['ShantiesSearch']['end_at'])
            && trim($params['ShantiesSearch']['start_at']) != ''
            && trim($params['ShantiesSearch']['end_at']) != ''
        ){
            $Shanty->andWhere(['>=','created_at',$params['ShantiesSearch']['start_at'].' 00:00:00']);
            $Shanty->andWhere(['<=','created_at',$params['ShantiesSearch']['end_at'].' 23:59:59']);
        }
        if(isset($params['ShantiesSearch']['name']) && trim($params['ShantiesSearch']['name']) != ''){
            $Shanty->andFilterWhere(['like','name',$params['ResidentialsSearch']['name']]);
        }
    
        if(isset($params['ShantiesSearch']['house_area']) && trim($params['ShantiesSearch']['house_area']) != ''){
            $Shanty->andFilterWhere(['house_area'=>$params['ShantiesSearch']['house_area']]);
        }
    
        if(isset($params['ShantiesSearch']['address']) && trim($params['ShantiesSearch']['address']) != ''){
            $Shanty->andFilterWhere(['like','address',$params['ShantiesSearch']['address']]);
        }
        if(isset($params['ShantiesSearch']['house_total']) && trim($params['ShantiesSearch']['house_total']) != ''){
            $Shanty->andFilterWhere(['house_total'=>$params['ShantiesSearch']['house_total']]);
        }
    
        if((isset($params['ShantiesSearch']['name']) && trim($params['ShantiesSearch']['name']) == '')
            &&  (isset($params['ShantiesSearch']['start_at']) && trim($params['ShantiesSearch']['start_at']) == '')
            &&  (isset($params['ShantiesSearch']['end_at']) && trim($params['ShantiesSearch']['end_at']) == '')
            &&  (isset($params['ShantiesSearch']['house_area']) && trim($params['ShantiesSearch']['house_area']) == '')
            &&  (isset($params['ShantiesSearch']['address']) && trim($params['ShantiesSearch']['address']) == '')
            &&  (isset($params['ShantiesSearch']['house_total']) && trim($params['ShantiesSearch']['house_total']) == '')
        ){
            $Shanty->andWhere(['>=','created_at',date('Y-m-d H:i:s',strtotime('-1 week'))]);
            $Shanty->andWhere(['<=','created_at',date('Y-m-d H:i:s',time())]);
        }
    
        $res = $Shanty->all();
        $columns = [
            "name" => "项目名称",
            "address" => "地址",
            "house_total" => "住房套数",
            "house_area" => "住房面积",
            "house_month_total" => "本月（套）",
            "house_year_total" => "本年度（套）",
            "house_year_area" => "本年度累计面积(平面)",
            "house_amount" => "总累计（套）",
            "house_amount_area" => "总累计（平方）",
            "house_surplusr_amount" => "剩余套数",
            "biz_house_total" => "商业间数",
            "biz_house_area" => "商业面积",
            "biz_house_month_total" => "本月（套）",
            "biz_house_year_total" => "本年度（套）",
            "biz_house_year_area" => "本年度累计面积(平面)",
            "biz_house_amount" => "总累计（套）",
            "biz_house_amount_area" => "总累计（平方）",
            "biz_house_surplusr_amount" => "剩余套数",
            "remarks" => "备注",
            "created_at" => "创建时间",
            "updated_at" => "更新时间",
        ];
        $output = [array_values($columns)];
         
        foreach($res as $v){
            array_push($output, array_values($v));
        }
        $filename = '商品安置房'.date('Y-m-d H:i:s',time()).'.csv';
        theCsv::export([
            'data' => $output,
            'name' => $filename,
        ]);
    }
    
    public static function exportInformation($params){
        $Information =Information::find()->select([
            "name",
            "identification",
            "phone",
            "towns",
            "address",
            "booklet",
            "contract_no",
            "arrange_type",
            "permute_type",
            "house_area",
            "permute_area",
            "use_area",
            "arrange_address",
            "arrange_house_total",
            "arrange_root_no",
            "arrange_house_area",
            "arrange_clearing",
            "arrange_delivery_time",
            "arrange_is_clearing",
            "remarks",
            "sign_time",
            "created_at",
            "updated_at",
        ])->where('1=1')->asArray();
    
         
        if(isset($params['InformationSearch']['start_at'])
            && isset($params['InformationSearch']['end_at'])
            && trim($params['InformationSearch']['start_at']) != ''
            && trim($params['InformationSearch']['end_at']) != ''
        ){
            $Information->andWhere(['>=','created_at',$params['InformationSearch']['start_at'].' 00:00:00']);
            $Information->andWhere(['<=','created_at',$params['InformationSearch']['end_at'].' 23:59:59']);
        }
        if(isset($params['InformationSearch']['name']) && trim($params['InformationSearch']['name']) != ''){
            $Information->andFilterWhere(['like','name',$params['InformationSearch']['name']]);
        }
    
        if(isset($params['InformationSearch']['identification']) && trim($params['InformationSearch']['identification']) != ''){
            $Information->andFilterWhere(['house_area'=>$params['ShantiesSearch']['house_area']]);
        }
    
        if(isset($params['InformationSearch']['phone']) && trim($params['InformationSearch']['phone']) != ''){
            $Information->andFilterWhere(['like','phone',$params['InformationSearch']['phone']]);
        }
        if(isset($params['InformationSearch']['towns']) && trim($params['InformationSearch']['towns']) != ''){
            $Information->andFilterWhere(['towns'=>$params['ShantiesSearch']['towns']]);
        }
    
        if((isset($params['InformationSearch']['name']) && trim($params['InformationSearch']['name']) == '')
            &&  (isset($params['InformationSearch']['start_at']) && trim($params['InformationSearch']['start_at']) == '')
            &&  (isset($params['InformationSearch']['end_at']) && trim($params['InformationSearch']['end_at']) == '')
            &&  (isset($params['InformationSearch']['identification']) && trim($params['InformationSearch']['identification']) == '')
            &&  (isset($params['InformationSearch']['phone']) && trim($params['InformationSearch']['phone']) == '')
            &&  (isset($params['InformationSearch']['towns']) && trim($params['InformationSearch']['towns']) == '')
        ){
            $Information->andWhere(['>=','created_at',date('Y-m-d H:i:s',strtotime('-1 week'))]);
            $Information->andWhere(['<=','created_at',date('Y-m-d H:i:s',time())]);
        }
    
        $res = $Information->all();
        $columns = [
            "name" =>"姓名",
            "identification" =>"身份证号",
            "phone" =>"联系电话",
            "towns" =>"乡镇",
            "address" =>"家庭住址",
            "booklet" =>"家庭户口簿编号",
            "contract_no" =>"合同号",
            "arrange_type" =>"安置方式",
            "permute_type" =>"置换比例",
            "house_area" =>"住房屋面积（㎡）",
            "permute_area" =>"用于置换面积（㎡）",
            "use_area" =>"应置换面积（㎡）",
            "arrange_address" =>"安置选房地点",
            "arrange_house_total" =>"住房套数",
            "arrange_root_no" =>"房号",
            "arrange_house_area" =>"实际选择安置面积（㎡）",
            "arrange_clearing" =>"选房结算后应付款（元）",
            "arrange_delivery_time" =>"钥匙交付时间",
            "arrange_is_clearing" =>"是否结算（0:否，1是）",
            "remarks" =>"备注",
            "sign_time" =>"签约时间",
            "created_at" =>"创建时间",
            "updated_at" =>"更新时间",
        ];
        $output = [array_values($columns)];
         
        foreach($res as $v){
            array_push($output, array_values($v));
        }
        $filename = '安置信息管理'.date('Y-m-d H:i:s',time()).'.csv';
        theCsv::export([
            'data' => $output,
            'name' => $filename,
        ]);
    }
}