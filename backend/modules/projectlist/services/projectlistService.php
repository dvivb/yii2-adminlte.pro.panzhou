<?php

namespace backend\modules\projectlist\services;

use yii\base\Object;
use app\models\ProjectsList;
use m35\thecsv\theCsv;

/**
 * Default controller for the `project` module
 */
class ProjectlistService{
    
    public static function addProjectList($data){
        $projectList = new ProjectsList();
        $projectList->setAttributes($data);
        return $projectList->save(false);
    }
    /**
        @pramas $projectId int 

     */
    public static function getLastProjectList($projectId){
        $res = ProjectsList::find()->where(['project_id'=>$projectId,'state'=>0])->orderBy('id DESC')->asArray()->one();
        return $res;
    }
    
    public static function updateProjectList($id,$data){
        $projectList = ProjectsList::find()->where(['id'=>$id])->one();
        if(is_null($projectList))return false;
        $projectList->setAttributes($data);
        return $projectList->save(false);
    }
    public static function getProjectList($id){
        return ProjectsList::find()->where(['id'=>$id])->asArray()->one();
    }
    public static function exportProject($params){
        $project = ProjectsList::find()->select(['id' ,
            'project_id',
            'household',
            'area',
            'amount',
            'status',
            'created_at',]
        )->where(['state'=>0,'project_id'=>$params['id']])->asArray();
    
        if(isset($params['ProjectsListSearch']['start_at'])
            && isset($params['ProjectsListSearch']['end_at'])
            && trim($params['ProjectsListSearch']['start_at']) != ''
            && trim($params['ProjectsListSearch']['end_at']) != ''
        ){
            $project->andWhere(['>=','created_at',$params['ProjectsListSearch']['start_at'].' 00:00:00']);
            $project->andWhere(['<=','created_at',$params['ProjectsListSearch']['end_at'].' 23:59:59']);
        }
        if(  (isset($params['ProjectsListSearch']['start_at']) && trim($params['ProjectsListSearch']['start_at']) == '')
            &&  (isset($params['ProjectsListSearch']['end_at']) && trim($params['ProjectsListSearch']['end_at']) == '')
        ){
            $project->andWhere(['>=','created_at',date('Y-m-d H:i:s',strtotime('-1 week'))]);
            $project->andWhere(['<=','created_at',date('Y-m-d H:i:s',time())]);
        }
    
        $res = $project->all();
        $columns = [
            'id'  => 'id',
            'project_id' => '项目id',
            'household'=>'总户数',
            'area'=>'总面积',
            'amount'=>'总金额',
            'status'=>'审批进度',
            'created_at' => '制表时间',
        ];
        $output = [array_values($columns)];
         //0未提交、1提交拨款,2初审通过、3业务主管审批通过、4分管领导审批通过、5主要领导审批通过  
        foreach($res as $v){
            switch($v['status']){
                case 0;
                    $v['status'] = '未提交';
                    break;
                break;
                case 1:
                    $v['status'] = '提交拨款';
                    break;
                break;
                case 2:
                    $v['status'] = '初审通过';
                    break;
                break;
                case 3:
                    $v['status'] = '业务主管审批通过';
                    break;
                break;
                case 4:
                    $v['status'] = '分管领导审批通过';
                    break;
                break;
                case 5:
                    $v['status'] = '主要领导审批通过 ';
                    break;
                break;
            }
            array_push($output, array_values($v));
        }
        $filename = '项目列表'.date('Y-m-d H:i:s',time()).'.csv';
        theCsv::export([
            'data' => $output,
            'name' => $filename,
        ]);
    }
}
