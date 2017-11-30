<?php

namespace backend\modules\landlevy\controllers;

use Yii;
use app\models\LandlevyTotal;
use app\models\LandlevyTotalSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\houselevy\services\HouselevyService;
use backend\modules\landlevy\landlevy;
use backend\modules\landlevy\services\LandlevyService;
use app\models\ApprovalLog;

/**
 * LandlevyTotalController implements the CRUD actions for LandlevyTotal model.
 */
class LandlevyTotalController extends BaseController
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
     * Lists all LandlevyTotal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $get = yii::$app->request->get();
        if(!isset($get['LandlevyTotalSearch']['project_id']) || $get['LandlevyTotalSearch']['project_id'] ==''){
            Yii::$app->getSession()->setFlash('success', 'url错误,缺少项目id');
            return $this->redirect(['/landlevy']);
        }
        $searchModel = new LandlevyTotalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(isset($get['search']) && $get['search'] =="导出"){
            LandlevyService::LandlevyExport($get);exit;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single LandlevyTotal model.
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
     * Creates a new LandlevyTotal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new LandlevyTotal();

        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing LandlevyTotal model.
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
     * Deletes an existing LandlevyTotal model.
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
     * Finds the LandlevyTotal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return LandlevyTotal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = LandlevyTotal::findOne($id)) !== null) {
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
        if (($model = LandlevyTotal::findOne($id)) == null) {
            
            return json_encode(['code'=>0,'msg'=>'non-existent']);
        }
        $model->setAttributes(['approval'=>1]);//'operator'=>yii::$app->user->identity->id
        if($model->save(false)){
            ApprovalLog::addLog(['user_id'=>yii::$app->user->identity->id,
                'source_id'=>$id,
                'source_type'=>'landlevy',
                'approval'=>1
            ]);
            return json_encode(['code'=>1]);
        }else{
            return json_encode(['code'=>0,'msg'=>'failed']);
        }
    }
}
