<?php

namespace backend\modules\houselevy\controllers;

use app\models\ProjectsSearch;
use backend\controllers\BaseController;
use Yii;
use backend\modules\project\services\ProjectService;

/**
 * Default controller for the `modules` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $get = yii::$app->request->get();
        $data = new ProjectsSearch();
        $projectSearch = $data->search(Yii::$app->request->queryParams);

       if(isset($get['export'])){
           ProjectService::exportProject($get);exit;
       }
        return $this->render('index',['data'=>$projectSearch,'searchModel'=> $data]);
    }
}
