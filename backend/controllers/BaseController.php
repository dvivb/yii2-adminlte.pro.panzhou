<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;


/**
 * UserController implements the CRUD actions for User model.
 */
class BaseController extends Controller
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
}
