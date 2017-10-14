<?php

namespace backend\modules\workbench\controllers;

use yii\web\Controller;
use Yii;
/**
 * Default controller for the `modules` module
 */
class DefaultController extends Controller
{
    public function beforeAction($action)
    {
    if (parent::beforeAction($action)) {
            if(is_null(Yii::$app->user->identity)){
                $this->redirect(['/site/login']);
                return false;
            }
            return true;
        }else{
            return false;
        }
         
    }
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
