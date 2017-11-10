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
        if(ProjectService::updateProjectById($projectId, ['state'=>1])){
            Yii::$app->getSession()->setFlash('success', '删除成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '删除失败');
        }
        return $this->redirect(['/project/project']);
    }
    
    
    public function actionExport(){
        var_dump($_GET);
    }


//    public function actionUpload()
//    {
//        $model = new UploadForm();
//        echo "文件临时存储的位置: " . $_FILES["imageFile"]["tmp_name"] . "<br>";
//var_dump($_POST);die;
//        if (Yii::$app->request->isPost) {
//            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
//            if ($model->upload()) {
//                // 文件上传成功
//                return;
//            }
//            return $model->upload();
//        }
//
////        $data = new ProjectsSearch();
////        $projectSearch = $data->search(Yii::$app->request->queryParams);
////        return $this->render('index',['data'=>$projectSearch,'searchModel'=> $data]);
////        return $this->render('index', ['model' => $model]);
//    }


    public function actionUpload()
    {
        $data = [
            "code"      => -1,
            "message"   => ""
        ];

        // 允许上传的图片后缀
        $allowedExts = array("gif", "jpeg", "jpg", "png", "csv", "xls", "xlsx");
        $temp = explode(".", $_FILES["file"]["name"]);
//        echo $_FILES["file"]["size"];

        $extension = end($temp);     // 获取文件后缀名
        if ((($_FILES["file"]["type"] == "image/gif")
                || ($_FILES["file"]["type"] == "image/jpeg")
                || ($_FILES["file"]["type"] == "image/jpg")
                || ($_FILES["file"]["type"] == "image/pjpeg")
                || ($_FILES["file"]["type"] == "image/x-png")
                || ($_FILES["file"]["type"] == "image/png")
                || ($_FILES["file"]["type"] == "application/vnd.ms-excel")
                || ($_FILES["file"]["type"] == "application/vnd.openxmlformats-officedocument.spreadsheetml.sheet"))
            && ($_FILES["file"]["size"] < 222204800)   // 小于 200 kb
            && in_array($extension, $allowedExts))
        {
            if ($_FILES["file"]["error"] > 0)
            {
//                echo "错误：: " . $_FILES["file"]["error"] . "<br>";
                $data = [
                    "code"      => -1,
                    "message"   => "错误：" . $_FILES["file"]["error"]
                ];
            }
            else
            {
//                echo "上传文件名: " . $_FILES["file"]["name"] . "<br>";
//                echo "文件类型: " . $_FILES["file"]["type"] . "<br>";
//                echo "文件大小: " . ($_FILES["file"]["size"] / 1024) . " kB<br>";
//                echo "文件临时存储的位置: " . $_FILES["file"]["tmp_name"] . "<br>";

                // 判断当期目录下的 upload 目录是否存在该文件
                // 如果没有 upload 目录，你需要创建它，upload 目录权限为 777
                if (file_exists("upload/" . $_FILES["file"]["name"]))
                {
//                    echo $_FILES["file"]["name"] . " 文件已经存在!";
                    $data = [
                        "code"      => -1,
                        "message"   => "错误：" . $_FILES["file"]["name"] . " 文件已经存在！"
                    ];
                }
                else
                {
                    // 如果 upload 目录不存在该文件则将文件上传到 upload 目录下
                    move_uploaded_file($_FILES["file"]["tmp_name"], "upload/" . $_FILES["file"]["name"]);
//                    echo "文件存储在: " . "upload/" . $_FILES["file"]["name"];

                    $path = yii::$app->basePath . '\web\upload\\';
                    $name = $_FILES["file"]["name"];

                    $import = ProjectService::importProject($path, $name);
                    if ($import){
                        $data = [
                            "code"      => -1,
                            "message"   => "成功：" . $_FILES["file"]["name"] . " 文件导入成功！"
                        ];
                    }else{
                        $data = [
                            "code"      => -1,
                            "message"   => "错误：" . $_FILES["file"]["name"] . " 文件数据错误！"
                        ];
                    }
                }
            }
        }
        else
        {
//            echo "非法的文件格式";
            $data = [
                "code"      => -1,
                "message"   => "错误：文件格式不支持！"
            ];
        }

        if($data["code"]){
            Yii::$app->getSession()->setFlash('success', $data["message"]);
        }else{
            Yii::$app->getSession()->setFlash('success', $data["message"]);
        }
        return $this->redirect(['/project/project']);
    }

}
