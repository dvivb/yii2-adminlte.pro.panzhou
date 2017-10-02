<?php

namespace backend\controllers;
use Yii;
class LgoinController extends \yii\web\Controller
{
    
    public function beforeAction($action)
    {    
        if (parent::beforeAction($action)) {
            if(is_null(Yii::$app->user->identity)){
                $this->redirect(['/site/login']);
            }
            return true;
        }else{
            return false;
        }
       
    }
}
