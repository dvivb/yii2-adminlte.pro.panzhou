<?php

namespace backend\modules\interim\controllers;

use Yii;
use app\models\InterimDetail;
use app\models\InterimDetailSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * InterimDetailController implements the CRUD actions for InterimDetail model.
 */
class InterimDetailController extends BaseController
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
     * Lists all InterimDetail models.
     * @return mixed
     */
    public function actionIndex()
    {
//        var_dump($_GET);die;
        $searchModel = new InterimDetailSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
//var_dump($dataProvider);die;
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            'id'=>yii::$app->request->get('id'),
        ]);
    }

    /**
     * Displays a single InterimDetail model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new InterimDetail model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new InterimDetail();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing InterimDetail model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing InterimDetail model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the InterimDetail model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return InterimDetail the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = InterimDetail::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    public function actionApplys($id){
        $id = yii::$app->request->get('id');
        if(empty($id)){
            return json_encode(['code'=>0]);
        }
        if (($model = InterimDetail::findOne($id)) == null) {
            return json_encode(['code'=>0,'msg'=>'non-existent']);
        }
        $model->setAttributes(['approval'=>1,'operator'=>yii::$app->user->identity->id]);
        if($model->save(false)){
            return json_encode(['code'=>1]);
        }else{
            return json_encode(['code'=>0,'msg'=>'failed']);
        }
    }
}
