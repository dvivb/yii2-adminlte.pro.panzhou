<?php

namespace backend\modules\project\services;
use yii\base\Object;
use app\models\Projects;
use yii\data\ActiveDataProvider;
/**
 * Default controller for the `project` module
 */
class ProjectService{
    public function ProjectList(){
        //$query = new Projects();
        $query = Projects::find()->where()->orderBy('id DESC');
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pagesize' =>  20,
            ]
        ]);
    }
}

