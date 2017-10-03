<?php

namespace backend\modules\project\services;
use yii\base\Object;
use app\models\Projects;
use yii\data\ActiveDataProvider;
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
        $project -> setAttributes($addData);
        return $project->save(false);
    }
}

