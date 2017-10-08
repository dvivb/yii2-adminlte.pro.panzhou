<?php

namespace backend\modules\member\controllers;
use yii;
use yii\web\Controller;
use yii\base\Object;
use app\models\MemberSearch;
use backend\modules\member\services\MemberService;

/**
 * Default controller for the `member` module
 */
class MemberController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $this->getView()->title = '花名册列表';
        $data = new MemberSearch();
        $memberlistSearch = $data->search(Yii::$app->request->queryParams);
        return $this->render('index',[
            'data'=>$memberlistSearch,
            'searchModel'=> $data,
            'id'=>yii::$app->request->get('id'),
        ]);
        return $this->render('index');
    }
    
    /**
     * 花名册信息编辑
     * @params  id int 
     */
    
    public function actionEdit(){
        
    }
    
    /**
     * 
     * 花名册删除
     * @params id int
     * 
     */
    
    public function actionDel(){
        $memberId  =  yii::$app->request->get('id');
        $projectId = yii::$app->request->get('project_id');
        if(MemberService::delMemeberById($memberId)){
            Yii::$app->getSession()->setFlash('success', '保存成功');
        }else{
            Yii::$app->getSession()->setFlash('success', '保存失败');
        }
        
        return $this->redirect(['/member/member/'.$projectId]);
    }
}
