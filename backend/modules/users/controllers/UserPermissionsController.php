<?php

namespace backend\modules\users\controllers;

use Yii;
use app\models\UserPermissions;
use app\models\UserPermissionsSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserRole;
use app\models\Permissions;

/**
 * UserPermissionsController implements the CRUD actions for UserPermissions model.
 */
class UserPermissionsController extends BaseController
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all UserPermissions models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserPermissionsSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single UserPermissions model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new UserPermissions model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new UserPermissions();
        $rolesRes = UserRole::find()->select(['id','role_name'])->asArray()->all();
        $permissionsRes = Permissions::find()->select(['id','permission_name'])->asArray()->all();
        $roles = [];
        $permissions = [] ;
        if(!empty($rolesRes)){
            foreach ($rolesRes as $v){
                $roles[$v['id']]=$v['role_name'];
            }
        }
       if(!empty($permissionsRes)){
           
            foreach ($permissionsRes as $v){
                $permissions[$v['id']]=$v['permission_name'];
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'roles' => $roles,
                'permissions' => $permissions
            ]);
        }
    }

    /**
     * Updates an existing UserPermissions model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $rolesRes = UserRole::find()->select(['id','role_name'])->asArray()->all();
        $permissionsRes = Permissions::find()->select(['id','permission_name'])->asArray()->all();
        $roles = [];
        $permissions = [] ;
        if(!empty($rolesRes)){
            foreach ($rolesRes as $v){
                $roles[$v['id']]=$v['role_name'];
            }
        }
        if(!empty($permissionsRes)){
             
            foreach ($permissionsRes as $v){
                $permissions[$v['id']]=$v['permission_name'];
            }
        }
        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'roles' => $roles,
                'permissions' => $permissions
            ]);
        }
    }

    /**
     * Deletes an existing UserPermissions model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the UserPermissions model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return UserPermissions the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = UserPermissions::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
