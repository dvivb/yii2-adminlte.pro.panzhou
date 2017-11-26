<?php
namespace backend\modules\workbench\services;

use app\models\HouselevyTotal;
use app\models\LandlevyTotal;
use Yii;

/**
 * Class StatisticsServices
 * @package backend\modules\workbench\services
 */
class StatisticsServices
{
    public static function getProjectTotal($condition=null)
    {
        $params = [];
        $sql = "SELECT 
                    COUNT(p.id) AS total_project 
                FROM projects p
                LEFT JOIN projects_list pl ON pl.id = p.id
                WHERE 1=1";

        if (isset($condition["state"])) {
            $sql .= " and pl.state = :state";
            $params[":state"] = $condition["state"];
        }

        if (isset($condition["status"])) {
            $sql .= " and pl.status in (:status)";
            $params[":status"] = $condition["status"];
        }

        $sql .= " ORDER BY pl.id DESC";

        $query = Yii::$app->db->createCommand($sql)
            ->bindValues($params)
            ->queryOne();

        return $query;
    }

    public static function getProjectAmountTotal($condition=null)
    {
        $params = [];
        $sql = "SELECT 
                    SUM(p.col_amout_household + p.col_area_amout) AS amount, 
                    SUM(p.actual_area_household + p.actual_area_amount) AS actual_amount
                FROM projects p
                LEFT JOIN projects_list pl ON pl.id = p.id
                WHERE 1=1";

        if (isset($condition["state"])) {
            $sql .= " and pl.state = :state";
            $params[":state"] = $condition["state"];
        }

        if (isset($condition["status"])) {
            $sql .= " and pl.status in (:status)";
            $params[":status"] = $condition["status"];
        }

        $query = Yii::$app->db->createCommand($sql)
            ->bindValues($params)
            ->queryOne();

        return $query;
    }

    public static function getProjectList($condition=null)
    {
        $params = [];
        $sql = "SELECT *
                FROM projects p
                LEFT JOIN projects_list pl ON pl.id = p.id
                WHERE 1=1";

        if (isset($condition["state"])) {
            $sql .= " and pl.state = :state";
            $params[":state"] = $condition["state"];
        }

        if (isset($condition["status"])) {
            $sql .= " and pl.status in (:status)";
            $params[":status"] = $condition["status"];
        }

        $sql .= " ORDER BY pl.id DESC";

        $query = Yii::$app->db->createCommand($sql)
            ->bindValues($params)
            ->queryAll();

        return $query;
    }

    public static  function getRendinglist($userId){
        $houseTotal = HouselevyTotal::getPendinglistByUserId($userId);
        $landlevyTotal = LandlevyTotal::getPendinglistByUserId($userId);
        return array_merge($houseTotal,$landlevyTotal);
    }
    public static function updateFlowBySource($sourceType,$nextUser,$flowId,$agree){

        switch ($sourceType){
            case 'houselevy':
                $type = 1;
                HouselevyTotal::updateFlow($flowId,$nextUser,$agree);
                break;
            case 'landlevy':
                $type=3;
                break;
            case 'interm':
                $type=2;
                break;
            default:
                $type = null;
                break;
        }
    }
}