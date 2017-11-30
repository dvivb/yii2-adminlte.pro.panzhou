<?php

namespace backend\modules\project\controllers;

use app\models\Projects;
use yii;
use backend\modules\project\services\ProjectService;
use app\models\ProjectsSearch;
use backend\controllers\BaseController;
use yii\web\UploadedFile;
use app\models\UploadForm;

/**
 * Default controller for the `project` module
 */
class ProjectController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $type=yii::$app->request->get('id');
        $this->getView()->title = '项目列表';
        $get = yii::$app->request->get();
        $data = new ProjectsSearch();
        $projectSearch = $data->search(Yii::$app->request->queryParams);
        
        if(isset($get['search']) && $get['search'] =="导出"){
            ProjectService::exportProject($get);exit;
        }
        switch ($type){
            case 1 :
                return $this->render('index',['data'=>$projectSearch,'searchModel'=> $data]);
                break;
            case 2:
                return $this->render('index1',['data'=>$projectSearch,'searchModel'=> $data]);
                break;
            default:
                return $this->render('index3',['data'=>$projectSearch,'searchModel'=> $data]);
                break;
        }
        
    }
    
    
    
    /*
     * project detail
     * 
     * @params id int 1
     */
    public function  actionDetail(){
        $this->getView()->title = '项目详情';
        $projectId = yii::$app->request->get('id',0);
        $projectInfo = ProjectService::getProjectDetailById($projectId);
        if(is_null($projectInfo) || empty($projectInfo)){
           return $this->render('detail',['message'=>'没有查询到该项目','data'=>null]);
        }else{
           return $this->render('detail',['message'=>'success','data'=>$projectInfo]);
        }
        
    }
    
    /*
     * project edit 
     * 
     * @params id int 1
     */
    public function  actionEdit(){
        $this->getView()->title = '项目修改';
        if(yii::$app->request->isGet){
            $projectId = yii::$app->request->get('id',0);
            $projectInfo = ProjectService::getProjectDetailById($projectId);
            if(is_null($projectInfo) || empty($projectInfo)){
                return $this->render('edit',['message'=>'没有查询到该项目','data'=>null]);
            }else{
                return $this->render('edit',['message'=>'success','data'=>$projectInfo]);
            }
        }elseif(yii::$app->request->isPost){
            $projectId = yii::$app->request->post('id');
            if(ProjectService::updateProjectById($projectId,yii::$app->request->post())){
                Yii::$app->getSession()->setFlash('success', '保存成功');
            }else{
                Yii::$app->getSession()->setFlash('success', '保存失败');
            }
            return $this->redirect(['/project/project']);
        }
    }
    
    /*
     * project add
     * 
     * @params 
     * 
     */
    
    public function actionAdd(){
        $this->getView()->title = '项目新增';
        if(yii::$app->request->isGet){
            return $this->render('add');
        }elseif(yii::$app->request->isPost){
            $post = yii::$app->request->post();
            if(ProjectService::addProject($post)){
                Yii::$app->getSession()->setFlash('success', '保存成功');
            }else{
                Yii::$app->getSession()->setFlash('success', '保存失败');
            }
            return $this->redirect(['/project/project']);
        }
    }
    /**
     * project del
     * 
     * 
     */
    public function actionDel(){
        $projectId = yii::$app->request->get('id');
        if(ProjectService::updateProjectById($projectId, ['state'=>-1])){
            Yii::$app->getSession()->setFlash('success', '删除成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '删除失败');
        }
        return $this->redirect(['/project/project']);
    }

    /**
     * project finish
     *
     *
     */
    public function actionFinish(){
        $projectId = yii::$app->request->get('id');
        if(ProjectService::updateProjectById($projectId, ['state'=>1])){
            Yii::$app->getSession()->setFlash('success', '操作成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '操作失败');
        }
        return $this->redirect(['/project/project']);
    }
    
    
    public function actionExport(){
        var_dump($_GET);
    }

    public function actionUpload()
    {
        $data = self::uploadExcel($_FILES);
        if($data["code"]){
            $path = $data["path"];
            $name = $data["name"];
            $import = ProjectService::importProject($path, $name);
            if ($import){
                $data = [
                    "code"      => 1,
                    "message"   => "成功：" . $_FILES["file"]["name"] . " 文件导入成功！"
                ];
            }else{
                $data = [
                    "code"      => 0,
                    "message"   => "错误：" . $_FILES["file"]["name"] . " 文件数据错误！"
                ];
            }
        }
        if($data["code"]){
            Yii::$app->getSession()->setFlash('success', $data["message"]);
        }else{
            Yii::$app->getSession()->setFlash('error', $data["message"]);
        }
        return $this->redirect(['/project/project/index']);
    }
}
