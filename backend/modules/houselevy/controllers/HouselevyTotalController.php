<?php

namespace backend\modules\houselevy\controllers;

use Yii;
use app\models\HouselevyTotal;
use app\models\HouselevyTotalSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use backend\modules\houselevy\services\HouselevyService;
use app\models\ApprovalLog;

/**
 * HouselevyTotalController implements the CRUD actions for HouselevyTotal model.
 */
class HouselevyTotalController extends BaseController
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
     * Lists all HouselevyTotal models.
     * @return mixed
     */
    public function actionIndex()
    {
        $get = yii::$app->request->get();
        if(!isset($get['HouselevyTotalSearch']['project_id']) || $get['HouselevyTotalSearch']['project_id'] ==''){
            Yii::$app->getSession()->setFlash('success', 'url错误,缺少项目id');
            return $this->redirect(['/houselevy']);
        }
        $searchModel = new HouselevyTotalSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
        if(isset($get['search']) && $get['search'] =="导出"){
            HouselevyService::HouseLevyTotalExport($get);exit;
        }
        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single HouselevyTotal model.
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
     * Creates a new HouselevyTotal model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new HouselevyTotal();
        $_POST['HouselevyTotal']['operator']=yii::$app->user->identity->id;
        $_POST['HouselevyTotal']['approval']=0;
//         var_dump(Yii::$app->request->post());exit;
        if ($model->load(Yii::$app->request->post()) && $model->save(false)) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing HouselevyTotal model.
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
     * Deletes an existing HouselevyTotal model.
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
     * Finds the HouselevyTotal model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return HouselevyTotal the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = HouselevyTotal::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
    
    
    public function actionApplys($id){
        $id = yii::$app->request->get('id');
        $userid = yii::$app->request->get('userid');
        if(empty($id)){
            return json_encode(['code'=>0]);
        }
        if (($model = HouselevyTotal::findOne($id)) == null) {
            return json_encode(['code'=>0,'msg'=>'non-existent']);
        }
        $model->setAttributes(['approval'=>1,'approver'=>$userid]);//'operator'=>yii::$app->user->identity->id
        if($model->save(false)){
            ApprovalLog::addLog(['user_id'=>yii::$app->user->identity->id,
                                 'source_id'=>$id,
                                'source_type'=>'houselevy',
                                'approval'=>1,
                                'approver'=>$userid,
            ]);
            return json_encode(['code'=>1]);
        }else{
            return json_encode(['code'=>0,'msg'=>'failed']);
        }
    }
}
