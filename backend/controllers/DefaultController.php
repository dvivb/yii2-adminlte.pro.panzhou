<?php

namespace backend\controllers;

class DefaultController extends \yii\web\Controller
{
    public function actionIndex()
    {
        $this->getView()->title = '';
        return $this->render('index');
    }

}
