<?php

namespace backend\modules\workbench\controllers;

use yii\web\Controller;
use Yii;
use backend\controllers\BaseController;
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
        return $this->render('index');
    }
}
