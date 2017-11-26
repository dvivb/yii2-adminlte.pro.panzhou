<?php

namespace backend\modules\flow\controllers;

use app\models\FlowDetail;
use app\models\User;
use backend\modules\users\users;
use Yii;
use app\models\Flow;
use app\models\FlowSearch;
use backend\controllers\BaseController;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * FlowController implements the CRUD actions for Flow model.
 */
class FlowController extends BaseController
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
     * Lists all Flow models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new FlowSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Flow model.
     * @param string $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            'modelDetail' =>$this->findDetailModel($id)
        ]);
    }

    /**
     * Creates a new Flow model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Flow();
        if(isset($_POST['userIds'])){
            $flowIds = json_decode($_POST['userIds'],true);
            unset($_POST['userIds']);
        }

        if ($model->load(Yii::$app->request->post()) ) {
            $flow = Flow::find()->where(['type'=>$_POST['Flow']['type']])->one();
            if(!is_null($flow)){
                Yii::$app->getSession()->setFlash('error', '该分类下已经存在流程,请不要重复创建!');
                return $this->redirect(['/flow/flow']);
            }
            $model->save();
            if(!empty($flowIds)){
                $flowDetailM = new FlowDetail();
                $pid = 0;
                foreach ($flowIds as $v){
                    $arr = array();
                    $arr = ['flow_id'=>$model->id,'user_id'=>$v,'update_time'=>date('Y-m-d H:i:s'),'pid'=>$pid];
                    $flowDetail = null;
                    $flowDetail = clone $flowDetailM;
                    $flowDetail->setAttributes($arr);
                    $flowDetail->save(false);
                    $pid = $flowDetail->id;
                }
//                var_dump($arr);exit;


            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Flow model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param string $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);


        if (yii::$app->request->isPost) {
            $userIds = Yii::$app->request->post('userIds');
            $userIds = json_decode($userIds,true);
            unset($_POST['userIds']);
            $model->load(Yii::$app->request->post()) && $model->save();
            FlowDetail::delUserDetailByFlowId($id);
            $flowDetailM = new FlowDetail();
            $pid = 0;
            foreach ($userIds as $v){
                $arr = array();
                $arr = ['flow_id'=>$id,'user_id'=>$v,'update_time'=>date('Y-m-d H:i:s'),'pid'=>$pid];
                $flowDetail = null;
                $flowDetail = clone $flowDetailM;
                $flowDetail->setAttributes($arr);
                $flowDetail->save(false);
                $pid = $flowDetail->id;
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            $userIds = FlowDetail::getUserIdsByFlowId($id);
            $userDetails = FlowDetail::getUserDetailsByFlowId($id);
            return $this->render('update', [
                'model' => $model,
                'userIds'=>json_encode($userIds),
                'userDetails'=>$userDetails
            ]);
        }
    }

    /**
     * Deletes an existing Flow model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param string $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();
        FlowDetail::delUserDetailByFlowId($id);
        return $this->redirect(['index']);
    }

    /**
     * Finds the Flow model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param string $id
     * @return Flow the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Flow::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    protected function findDetailModel($flowid){
        $model= FlowDetail::find()->where(['flow_id'=>$flowid])
            ->select([User::tableName().'.username'])
            ->leftJoin(User::tableName(),User::tableName().'.id = '.FlowDetail::tableName().'.user_id')
            ->orderBy([FlowDetail::tableName().'.pid'=>SORT_ASC])
            ->asArray()
            ->all();
        return $model;
    }
}
