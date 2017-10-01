<?php

namespace backend\controllers;

class ProjectsController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
