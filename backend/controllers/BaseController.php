<?php

namespace backend\controllers;

use Yii;
use yii\web\Controller;
use app\models\Permissions;
use app\models\UserPermissions;


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
            
            $permission = Yii::$app->controller->module->id.'/'.Yii::$app->controller->id.'/'.Yii::$app->controller->action->id;
            $premissionInfo = Permissions::find()->where(['permission_action'=>$permission])->asArray()->one();
            if(empty($premissionInfo) || is_null($premissionInfo)){
                Yii::$app->getSession()->setFlash('error', '权限不足,请联系管理员');
                $this->redirect(['/site/errors']);
                return false;
            }
            $roleId =  yii::$app->user->identity->role;
            $roles = UserPermissions::find()->where(['role_id'=>$roleId,'permission_id'=>$premissionInfo['id']])->one();
            if(empty($roles) || is_null($roles)){
                Yii::$app->getSession()->setFlash('error', '权限不足,请联系管理员');
                $this->redirect(['/site/errors']);
                return false;
            }
            return true;
        }else{
            return false;
        }
         
    }
}
