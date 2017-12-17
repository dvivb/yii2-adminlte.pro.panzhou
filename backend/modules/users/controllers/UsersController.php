<?php

namespace backend\modules\users\controllers;

use Yii;
use app\models\User;
use app\models\UserSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\UserRole;

/**
 * UsersController implements the CRUD actions for User model.
 */
class UsersController extends BaseController
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
     * Lists all User models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new UserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single User model.
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
     * Creates a new User model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new User();
        $rolesRes = UserRole::find()->select(['id','role_name'])->asArray()->all();
        $roles = [];
        if(!empty($rolesRes)){
            foreach ($rolesRes as $v){
                $roles[$v['id']]=$v['role_name'];
            }
        }
        
        if ($model->load(Yii::$app->request->post()) ) {
            if( $model->password_hash != ''){
                $model->password_hash = password_hash($model->password_hash, 1,['code'=>13]);
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
                'roles' => $roles,
            ]);
        }
    }
    /**
     * 用户密码修改
     * /users/change-pass
     */

    public  function  actionChangePass(){
        $useId = yii::$app->user->identity->id;
        if(null == $useId){
            return $this->redirect(['index']);
        }
        $model = $this->findModel($useId);
        if(yii::$app->request->isGet){
            return $this->render('change-pass', [
                'model' => $model,
            ]);
        }
        $oldPass = yii::$app->request->post('oldPass');
        $newPass = yii::$app->request->post('newPass');
        if(empty($newPass)){
            Yii::$app->getSession()->setFlash('error', '新密码不能为空');
            return $this->render('change-pass', [
                'model' => $model,
            ]);
        }

        if(!password_verify($oldPass, $model->password_hash)){
            Yii::$app->getSession()->setFlash('error', '旧密码错误');
            return $this->render('change-pass', [
                'model' => $model,
            ]);
        }
        $model->password_hash = password_hash($newPass, 1,['code'=>13]);
        if($model->save(false)){
            Yii::$app->getSession()->setFlash('success', '密码修改成功');
            return $this->render('change-pass', [
                'model' => $model,
            ]);
        }else{
            Yii::$app->getSession()->setFlash('error', '密码修改失败');
            return $this->render('change-pass', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing User model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $rolesRes = UserRole::find()->select(['id','role_name'])->asArray()->all();
        $roles = [];
        if(!empty($rolesRes)){
            foreach ($rolesRes as $v){
                $roles[$v['id']]=$v['role_name'];
            }
        }
        if ($model->load(Yii::$app->request->post()) ) {
            if( $model->password_hash != ''){
                $model->password_hash = password_hash($model->password_hash, 1,['code'=>13]);
            }
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
                'roles' => $roles,
            ]);
        }
    }

    /**
     * Deletes an existing User model.
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
     * Finds the User model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return User the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if ((
            $model = User::find()
            ->leftJoin(UserRole::tableName(),UserRole::tableName().'.id='.User::tableName().'.role')
            ->where([User::tableName().'.id'=>$id])
            ->one()
            ) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    public function actionGetUserGroup(){
        $userRoles = UserRole::find()->select(['id','role_name'])->asArray()->all();
        return json_encode($userRoles);
    }
    public function actionGetUsers(){
        $roleId = yii::$app->request->get('role_id');
        $users = User::find()->where(['role'=>$roleId])->select(['id','username'])->asArray()->all();
        return json_encode($users);
    }
}
