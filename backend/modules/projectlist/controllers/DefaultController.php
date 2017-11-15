<?php

namespace backend\modules\projectlist\controllers;

use yii\web\Controller;

/**
 * Default controller for the `projectlist` module
 */
class DefaultController extends Controller
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
