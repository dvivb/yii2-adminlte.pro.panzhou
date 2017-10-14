<?php

namespace backend\modules\landlist\controllers;
use yii;
use yii\web\Controller;
use yii\base\Object;
use app\models\ProjectListSearch;
use app\models\ProjectsList;
use backend\modules\landlist\services\landlistService;
use backend\controllers\BaseController;

/**
 * Default controller for the `landlist` module
 */
class LandlistController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()->title = '项目列表';
        $data = new ProjectListSearch();
        $landlistSearch = $data->search(Yii::$app->request->queryParams,$type=2);
        return $this->render('index',[
            'data'=>$landlistSearch,
            'searchModel'=> $data,
            'id'=>yii::$app->request->get('id'),
        ]);
    }
    
    public function actionAdd(){
        $this->getView()->title= '新增流程';
        $projectId = yii::$app->request->get('id');
        $landlist = landlistService::getLastProjectList($projectId,2);
        if(is_null($landlist) || empty($landlist) || $landlist['status'] !=0 ){
            if(landlistService::addProjectList(['project_id'=>$projectId,'type'=>2])){
                Yii::$app->getSession()->setFlash('success', '保存成功');
            }else{
                Yii::$app->getSession()->setFlash('success', '保存失败');
            }
        }else{
            Yii::$app->getSession()->setFlash('success', '保存失败,上一期未提交');
        }
        
        return $this->redirect(['/landlist/landlist/'.$projectId]);
    }
    
    public function actionDel(){
//         $this->getView()->title= '新增流程';
        $projectId = yii::$app->request->get('project_id');
        $id = yii::$app->request->get('id');
        $update['state'] = 1;
        if(landlistService::updateProjectList($id,$update)){
            Yii::$app->getSession()->setFlash('success', '保存成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '保存失败');
        }
        
        return $this->redirect(['/landlist/landlist/'.$projectId]);
    }
    public function actionApply(){
        $projectId = yii::$app->request->get('project_id');
        $id = yii::$app->request->get('id');
        $update['state'] = 1;
        if(landlistService::updateProjectList($id,$update)){
            Yii::$app->getSession()->setFlash('success', '保存成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '保存失败');
        }
        
        return $this->redirect(['/landlist/landlist/'.$projectId]);
    }
}
