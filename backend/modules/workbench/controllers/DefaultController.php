<?php

namespace backend\modules\workbench\controllers;

use backend\modules\workbench\services\StatisticsServices;
use Yii;
use backend\controllers\BaseController;
/**
 * Default controller for the `modules` module
 */
class DefaultController extends BaseController
{
    /**
     * Renders the index view for the module
     * @return string
        id  role_name
        ------  --------------------
        1  系统管理员
        2  正主任办公室
        3  副主任办公室
        4  财务科
        5  安置科
        6  综合科
        7  政策法规科
        8  房屋征收科
        9  征地办公室
     */
    public function actionIndex()
    {
        $roleId =  yii::$app->user->identity->role;

        $condition = [
            "state" => 0,
        ];
        $project_total   = StatisticsServices::getProjectTotal($condition);

        $condition = [
            "state"     => 0,
            "status"    => "0,1,2,3,4",
        ];
        $project_incomplete_total   = StatisticsServices::getProjectTotal($condition);

        $condition = [
            "state" => 0,
        ];
        $project_amount_total  = StatisticsServices::getProjectAmountTotal($condition);

        $condition = [
            "state" => 0,
        ];
        $project_list = StatisticsServices::getProjectList($condition);



        switch ($roleId){
            case 1:
                break;
            case 2:
                break;
            case 3:
                break;
            case 4:
                break;
            case 5:
                break;
            case 6:
                break;
            case 7:
                break;
            case 8:
                break;
            case 9:
                break;
            default:
                break;
        }

        $data["project_total"]              = $project_total["total_project"];
        $data["project_incomplete_total"]   = $project_incomplete_total["total_project"];
        $data["project_amount_total"]       = $project_amount_total;
        $data["project_list"]       = $project_list;

//        echo "<pre>";
//        var_dump($project_total);
//        var_dump($project_incomplete_total);
//        var_dump($project_amount_total);die;
//        var_dump($project_list);die;
//        var_dump($data);die;
        return $this->render('index', ['data'=>$data]);
    }
}
