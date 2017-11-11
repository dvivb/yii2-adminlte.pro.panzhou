<?php

namespace backend\modules\project\services;
use yii\base\Object;
use app\models\Projects;
use yii\data\ActiveDataProvider;
use yii\base\Module;
use backend\modules\project\project;
use m35\thecsv\theCsv;
use yii;

/**
 * Default controller for the `project` module
 */
class ProjectService{
    public static  function ProjectList(){
        //$query = new Projects();
        $query = Projects::find()->orderBy('id DESC');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' =>  20,
            ]
        ]);
        return $dataProvider;
    }
    /*
     * 获取项目详情
     * @params id int 
     * @return array
     */
    public static function getProjectDetailById($id){
        $projectDetail = Projects::find()->where(['id'=>$id])->asArray()->one();
        return $projectDetail;
    }
    
    /**
     * 更新 project
     * 
     */
    public static function updateProjectById($id,$update){
        $projectDetail = Projects::find()->where(['id'=>$id])->one();
        if(is_null($projectDetail)){
            return false;
        }
        $projectDetail->setAttributes($update);
        
        return $projectDetail->save(false);
    }
    
    /**
     *  add
     * 
     * 
     */
    
    public static function addProject($addData){
        $project = new Projects();
        $addData['operator']=yii::$app->user->identity->id;
        $project -> setAttributes($addData);
        return $project->save(false);
    }
    
    
    public static function exportProject($params){
        $project = Projects::find()->select(['id' ,
                                            'code',
                                            'name',
                                            'total_household',
                                            'total_areas',
                                            'amount',
                                            'col_household',
                                            'actual_household',
                                            'col_area_household',
                                            'actual_area_household',
                                            'col_amout_household',
                                            'actual_amout_household',
                                            'excessive_amount',
                                            'actual_excessive_amount',
                                            'col_land_household',
                                            'actual_land_hosehold',
                                            'col_land_areas',
                                            'actual_land_areas',
                                            'col_area_amout',
                                            'actual_area_amount',
                                            'company_name',
                                            'price',
                                            'pay_price',
                                            'agent_price',
                                            'pay_agent_price',
                                            'audit_price',
                                            'pay_audit_price',
                                            'balance_price',
                                            'pay_balance_price',
                                            'design_price',
                                            'pay_design_price',
                                            'settlement_price',
                                            'pay_settlement_price',
                                            'supervisor_price',
                                            'actul_supervisor_price',
                                            'warranty_price',
                                            'created_at',]
            )->where(['state'=>0])->asArray();
        
        if(isset($params['ProjectsSearch']['start_at']) 
           && isset($params['ProjectsSearch']['end_at'])
           && trim($params['ProjectsSearch']['start_at']) != ''
           && trim($params['ProjectsSearch']['end_at']) != ''
            ){
            $project->andWhere(['>=','created_at',$params['ProjectsSearch']['start_at'].' 00:00:00']);
            $project->andWhere(['<=','created_at',$params['ProjectsSearch']['end_at'].' 23:59:59']);
        }
        if(isset($params['ProjectsSearch']['name']) && trim($params['ProjectsSearch']['name']) != ''){
            $project->andFilterWhere(['like','name',$params['ProjectsSearch']['name']]);
        }
        if((isset($params['ProjectsSearch']['name']) && trim($params['ProjectsSearch']['name']) == '')
           &&  (isset($params['ProjectsSearch']['start_at']) && trim($params['ProjectsSearch']['start_at']) == '')
           &&  (isset($params['ProjectsSearch']['end_at']) && trim($params['ProjectsSearch']['end_at']) == '')
            ){
            $project->andWhere(['>=','created_at',date('Y-m-d H:i:s',strtotime('-1 week'))]);
            $project->andWhere(['<=','created_at',date('Y-m-d H:i:s',time())]);
        }
        
        $res = $project->all();
        $columns = [
            'id'  => 'id',
            'code' => '项目编号',
            'name' => '项目名称',
            'total_household' => '总户数',
            'total_areas' => '总面积',
            'amount' => '总金额',
            'col_household' => '应该正补户数',
            'actual_household' => '实际征收补偿户数',
            'col_area_household' => '房屋征补总面积',
            'actual_area_household' => '实际房屋征补总面积',
            'col_amout_household' => '房屋征补总金额',
            'actual_amout_household' => '实际房屋征补总金额',
            'excessive_amount' => '过渡费总计',
            'actual_excessive_amount' => '实际过渡费总计',
            'col_land_household' => '土地征补总户数',
            'actual_land_hosehold' => '实际土地征补总户数',
            'col_land_areas' => '土地征补总面积',
            'actual_land_areas' => '实际土地征补总面积',
            'col_area_amout' => '土地征补总金额',
            'actual_area_amount' => '实际土地征补总金额',
            'company_name' => '中标公司名称',
            'price' => '中标价格',
            'pay_price' => '工程进度已支付金额',
            'agent_price' => '招投标代理费',
            'pay_agent_price' => '支付招投标代理费',
            'audit_price' => '预算审计费用',
            'pay_audit_price' => '支付预算审计费用',
            'balance_price' => '结算审计费用',
            'pay_balance_price' => '支付结算审计费用',
            'design_price' => '项目设计费',
            'pay_design_price' => '支付项目设计费',
            'settlement_price' => '工程款结算审计金额',
            'pay_settlement_price' => '支付工程款结算审计金额',
            'supervisor_price' => '监理费用',
            'actul_supervisor_price' => '支付监理费用',
            'warranty_price' => '质保金额',
            'created_at' => '创建时间',
        ];
        $output = [array_values($columns)];
       
        foreach($res as $v){
            array_push($output, array_values($v));
        }
        $filename = '项目列表'.date('Y-m-d H:i:s',time()).'.csv';
        theCsv::export([
            'data' => $output,
            'name' => $filename,
        ]);
    }

    public static function importProject($path, $name)
    {
        $fileName = $path . $name;

//        $data = \moonland\phpexcel\Excel::import($fileName, $config); // $config is an optional

        $data = \moonland\phpexcel\Excel::widget([
            'mode' => 'import',
            'fileName' => $fileName,
            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
            'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
        ]);

//        $data = \moonland\phpexcel\Excel::import($fileName, [
//            'setFirstRecordAsKeys' => true, // if you want to set the keys of record column with first record, if it not set, the header with use the alphabet column on excel.
//            'setIndexSheetByName' => true, // set this if your excel data with multiple worksheet, the index of array will be set with the sheet name. If this not set, the index will use numeric.
//            'getOnlySheet' => 'sheet1', // you can set this property if you want to get the specified sheet from the excel data with multiple worksheet.
//        ]);


//        foreach ()

        $columns = [
            'id' => 'id',
            'code' => '项目编号',
            'name' => '项目名称',
            'total_household' => '总户数',
            'total_areas' => '总面积',
            'amount' => '总金额',
            'col_household' => '应该正补户数',
            'actual_household' => '实际征收补偿户数',
            'col_area_household' => '房屋征补总面积',
            'actual_area_household' => '实际房屋征补总面积',
            'col_amout_household' => '房屋征补总金额',
            'actual_amout_household' => '实际房屋征补总金额',
            'excessive_amount' => '过渡费总计',
            'actual_excessive_amount' => '实际过渡费总计',
            'col_land_household' => '土地征补总户数',
            'actual_land_hosehold' => '实际土地征补总户数',
            'col_land_areas' => '土地征补总面积',
            'actual_land_areas' => '实际土地征补总面积',
            'col_area_amout' => '土地征补总金额',
            'actual_area_amount' => '实际土地征补总金额',
            'company_name' => '中标公司名称',
            'price' => '中标价格',
            'pay_price' => '工程进度已支付金额',
            'agent_price' => '招投标代理费',
            'pay_agent_price' => '支付招投标代理费',
            'audit_price' => '预算审计费用',
            'pay_audit_price' => '支付预算审计费用',
            'balance_price' => '结算审计费用',
            'pay_balance_price' => '支付结算审计费用',
            'design_price' => '项目设计费',
            'pay_design_price' => '支付项目设计费',
            'settlement_price' => '工程款结算审计金额',
            'pay_settlement_price' => '支付工程款结算审计金额',
            'supervisor_price' => '监理费用',
            'actul_supervisor_price' => '支付监理费用',
            'warranty_price' => '质保金额',
            'created_at' => '创建时间',
        ];

        $key = array_keys($columns);
//        $value  = array_values($columns);

        $data_value = array_values($data[0]);

        $data_arr = array_combine($key, $data_value);

        return self::addProject($data_arr);

    }
}

