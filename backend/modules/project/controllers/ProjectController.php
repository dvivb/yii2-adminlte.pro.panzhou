<?php

namespace backend\modules\project\controllers;

use yii\web\Controller;

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
        return $this->render('index');
    }
}
