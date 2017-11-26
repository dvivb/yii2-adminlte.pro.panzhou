<?php

namespace backend\modules\workbench\controllers;

use app\models\LandlevyTotalSearch;
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
        $userId =  yii::$app->user->identity->getId();

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


        $data["project_total"]              = $project_total["total_project"];
        $data["project_incomplete_total"]   = $project_incomplete_total["total_project"];
        $data["project_amount_total"]       = $project_amount_total;

        /***
         * 待处理
         * 多张表的合集
         * houselevy_total  landlevy_total interim_list
         */
        $data["project_list"] = StatisticsServices::getRendinglist($userId);


/*
        switch ($roleId){
            case 1:

                $query = (new \yii\db\Query())
                    ->select('p.id, lt.periods, lt.operator, lt.approval, lt.created_at, lt.updated_at, p.name, u.username, ur.role_name')
                    ->from('approval_log AS al')
                    ->leftJoin('landlevy_total AS lt','lt.id = al.source_id')
                    ->leftJoin('projects AS p','p.id = lt.project_id')
                    ->leftJoin('user AS u','u.id = al.user_id ')
                    ->leftJoin('user_role AS ur','ur.id = u.role')
                    ->where([
                        'al.user_id'    => $userId,
                        'al.source_type'=> 'landlevy',
                        'al.approval'   => '1',
                        'lt.approval'   => '1'
                    ])
//                    ->limit(4)
                    ->orderBy('id DESC')
                    ->All();
                $data["project_list"]       = $query;

                $searchModel = new LandlevyTotalSearch();
                $dataProvider = $searchModel->search(Yii::$app->request->queryParams);
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
*/
        return $this->render('index', [
//            'searchModel'  => $searchModel,
//            'dataProvider' => $dataProvider,
            'data'         => $data,
        ]);
    }
}
