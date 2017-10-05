<?php

namespace backend\modules\projectlist\services;

use yii\base\Object;
use app\models\ProjectsList;
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
}
