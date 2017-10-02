<?php

namespace backend\modules\project\controllers;
use yii;
use yii\web\Controller;
use backend\modules\project\services\ProjectService;
use app\models\ProjectsSearch;

/**
 * Default controller for the `project` module
 */
class ProjectController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()->title = '项目列表';
        $data = new ProjectsSearch();
        $projectSearch = $data->search(Yii::$app->request->queryParams);
        return $this->render('index',['data'=>$projectSearch,'searchModel'=> $data]);
    }
}
