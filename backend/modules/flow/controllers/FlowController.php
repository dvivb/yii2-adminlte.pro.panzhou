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
            $returnMsg = $this->_checkFlowDetail($flowIds);
            if(true !== $returnMsg){
                Yii::$app->getSession()->setFlash('error', $returnMsg);
                return $this->redirect(['/flow/flow']);
            }
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
                $status =2;
                foreach ($flowIds as $v){
                    $arr = array();
                    $arr = ['flow_id'=>$model->id,'user_id'=>$v,'update_time'=>date('Y-m-d H:i:s'),'pid'=>$pid,'status'=>$status];
                    $flowDetail = null;
                    $flowDetail = clone $flowDetailM;
                    $flowDetail->setAttributes($arr);
                    $flowDetail->save(false);
                    $pid = $flowDetail->id;
                    $status++;
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
            $returnMsg = $this->_checkFlowDetail($userIds);
            if(true !== $returnMsg){
                Yii::$app->getSession()->setFlash('error', $returnMsg);
                return $this->redirect(['/flow/flow']);
            }
            unset($_POST['userIds']);
            $model->load(Yii::$app->request->post()) && $model->save();
            FlowDetail::delUserDetailByFlowId($id);
            $flowDetailM = new FlowDetail();
            $pid = 0;
            $status = 2;
            foreach ($userIds as $v){
                $arr = array();
                $arr = ['flow_id'=>$id,'user_id'=>$v,'update_time'=>date('Y-m-d H:i:s'),'pid'=>$pid,'status'=>$status];
                $flowDetail = null;
                $flowDetail = clone $flowDetailM;
                $flowDetail->setAttributes($arr);
                $flowDetail->save(false);
                $pid = $flowDetail->id;
                $status++;
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

    /*
     *                                      if($v['approval'] == 0){
                                                echo '未提交';
                                            }elseif ($v['approval'] = 1) {
                                                echo '提交拨款';
                                            }elseif ($v['approval'] = 2) {
                                                echo '初审通过';
                                            }elseif ($v['approval'] = 3) {
                                                echo '业务主管审批通过';
                                            }elseif ($v['approval'] = 4) {
                                                echo '分管领导审批通过';
                                            }elseif ($v['approval'] = 5) {
                                                echo '主要领导审批通过';
                                            }else{
                                                echo '审批状态未知';
                                            }
    提交拨款任何人发起,从approval=2开始增加流程审批人
     */
    private function _checkFlowDetail($userIds){
        switch(count($userIds)){
            
            case 0:
                $msg = '缺少初审审批人';
                break;
            case 1:
                $msg = '缺少业务主管审批人';
                break;
            case 2:
                $msg = '缺少分管领导审批人';
                break;
            case 3:
                $msg = '缺少主要领导审批人';
                break;
            case 4:
                $msg = true;
                break;
            default:
                $msg = '超过流程审批人数';
                break;
        }
        return $msg;
    }
}
