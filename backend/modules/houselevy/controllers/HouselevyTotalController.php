<?php

namespace backend\modules\houselevy\controllers;

use app\models\Flow;
use app\models\FlowDetail;
use app\models\InterimList;
use app\models\LandlevyTotal;
use backend\modules\workbench\services\StatisticsServices;
use Yii;
use app\models\HouselevyTotal;
use app\models\HouselevyTotalSearch;
use backend\controllers\BaseController;
use yii\db\Exception;
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
        if ( $model->load(Yii::$app->request->post()) ){
            $project_id = $_POST['HouselevyTotal']['project_id'];
            $periods = $_POST['HouselevyTotal']['periods'];
            if($periods <= 0){
                Yii::$app->getSession()->setFlash('error', '保存失败,期数不能小于0');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            $info = $model->find()->where(['project_id' =>$project_id,'periods'=>$periods])->one();
            if(null != $info){
                Yii::$app->getSession()->setFlash('error', '保存失败'.$project_id.',期数已经存在');
                return $this->render('create', [
                    'model' => $model,
                ]);
            }
            $model->save(false);
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

        $info = $this->findModel($id);

        $this->findModel($id)->delete();

        if(null != $info){
            return $this->redirect(['houselevy-total?HouselevyTotalSearch[project_id]='.$info->project_id]);
        }else{
            return $this->redirect(['index']);
        }
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
        $type = yii::$app->request->get('type');
        $remark = yii::$app->request->get('remark');
        if(empty($id) || empty($type)){
            return json_encode(['code'=>0,'msg'=>'参数异常']);
        }



        if (($model = $this->_getModel($id,$type)) == null) {
            return json_encode(['code'=>0,'msg'=>'non-existent']);
        }
        $flow = Flow::getFlowByType($type);
        if(is_null($flow) || empty($flow)){
            return json_encode(['code'=>0,'msg'=>'流程不存在,请先创建流程']);
        }
        $flowId = $flow['id'];
        $flowDetail = FlowDetail::getFlowSecondUserIdByFlowId($flowId);
        if(is_null($flowDetail) || empty($flowDetail)){
            return json_encode(['code'=>0,'msg'=>'流程审批人不存在,请先修改流程']);
        }
        $model->setAttributes(['approval'=>1,'approver'=>$flowDetail['user_id']]);//'operator'=>yii::$app->user->identity->id
        if($model->save(false)){
            ApprovalLog::addLog(['user_id'=>yii::$app->user->identity->id,
                                 'source_id'=>$id,
                                 'source_type'=>'houselevy',
                                 'approval'=>1,
                                 'approver'=>$flowDetail['user_id'],
                                 'remarks'=>$remark,
            ]);
            return json_encode(['code'=>1]);
        }else{
            return json_encode(['code'=>0,'msg'=>'failed']);
        }
    }

    public function actionApprovalList(){
        $id = yii::$app->request->get('id');
        $source_type = yii::$app->request->get('sourceType');
        $approvalList = ApprovalLog::approvallogList($id,$source_type);//var_dump($approvalList);
        return json_encode($approvalList);
    }
    public function actionApproval(){
        $id = yii::$app->request->get('id');
        $agree = yii::$app->request->get('agree');
        $remarks = yii::$app->request->get('remarks',"略");
        $sourceType = yii::$app->request->get('sourceType');
        if(empty($id) || empty($agree) || empty($sourceType)){
            return json_encode(['code'=>0,'msg'=>"参数异常!"]);
        }
        $transaction =Yii::$app->db->beginTransaction();
        try {
            $flow = Flow::getFlowBySource($sourceType);
            if (is_null($flow) || empty($flow)) {
                return json_encode(['code' => 0, 'msg' => "请检查流程设置是否正确!"]);
            }
            $nextUser = FlowDetail::getFlowNextUserIdByFlowIdAndUserId($flow['id'], yii::$app->user->identity->id);
            StatisticsServices::updateFlowBySource($sourceType, $nextUser, $id, $agree);
            ApprovalLog::addLog(['user_id' => yii::$app->user->identity->id,
                'source_id' => $id,
                'source_type' => $sourceType,
                'approval' => (!empty($nextUser) && $agree == 1) ? $nextUser['status'] : (empty($nextUser) && $agree == 1) ? -1 : -2,// -2拒绝
                'approver' => !empty($nextUser) ? $nextUser['user_id'] : 0,//流程结束
                'remarks' => $remarks,
            ]);
            $transaction->commit();
            return json_encode(['code'=>1]);
        }catch(Exception $e){
            $transaction->rollBack();
            return json_encode(['code'=>0,'msg'=>'failed']);
        }
    }

    private function _getModel($id,$type){
        switch ($type){
            case 1:
                return  HouselevyTotal::findOne($id) ;
                break;
            case 2:
                return InterimList::findOne($id);
                break;
            case 3:
                return LandlevyTotal::findOne($id);
                break;
            default:
                return null;

        }
    }

}
