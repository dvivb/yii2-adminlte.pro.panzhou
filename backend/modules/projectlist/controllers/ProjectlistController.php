<?php

namespace backend\modules\projectlist\controllers;
use yii;
use yii\web\Controller;
use yii\base\Object;
use app\models\ProjectListSearch;
use app\models\ProjectsList;
use backend\modules\projectlist\services\ProjectlistService;
use backend\controllers\BaseController;

/**
 * Default controller for the `projectlist` module
 */
class ProjectlistController extends BaseController
{
    
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()->title = '项目列表';
        $data = new ProjectListSearch();
        $projectlistSearch = $data->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'data'=>$projectlistSearch,
            'searchModel'=> $data,
            'id'=>yii::$app->request->get('id'),
        ]);
    }
    
    public function actionAdd(){
        $this->getView()->title= '新增流程';
        $projectId = yii::$app->request->get('id');
        $projectList = ProjectlistService::getLastProjectList($projectId);
        if(is_null($projectList) || empty($projectList) || $projectList['status'] !=0 ){
            if(ProjectlistService::addProjectList(['project_id'=>$projectId])){
                Yii::$app->getSession()->setFlash('success', '保存成功');
            }else{
                Yii::$app->getSession()->setFlash('success', '保存失败');
            }
        }else{
            Yii::$app->getSession()->setFlash('success', '保存失败,上一期未提交');
        }
        
        return $this->redirect(['/projectlist/projectlist/'.$projectId]);
    }
    
    public function actionDel(){
//         $this->getView()->title= '新增流程';
        $projectId = yii::$app->request->get('project_id');
        $id = yii::$app->request->get('id');
        $update['state'] = 1;
        if(ProjectlistService::updateProjectList($id,$update)){
            Yii::$app->getSession()->setFlash('success', '保存成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '保存失败');
        }
        
        return $this->redirect(['/projectlist/projectlist/'.$projectId]);
    }
    public function actionApply(){
        $projectId = yii::$app->request->get('project_id');
        $id = yii::$app->request->get('id');
        $update['state'] = 1;
        if(ProjectlistService::updateProjectList($id,$update)){
            Yii::$app->getSession()->setFlash('success', '保存成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '保存失败');
        }
        
        return $this->redirect(['/projectlist/projectlist/'.$projectId]);
    }
}
