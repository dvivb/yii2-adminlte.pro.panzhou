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
        $res = ProjectsList::find()->where(['project_id'=>$projectId])->orderBy('id DESC')->asArray()->one();
        return $res;
    }
}
