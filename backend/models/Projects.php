<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property integer $id
 * @property string $code
 * @property string $name
 * @property integer $state
 * @property integer $total_household
 * @property integer $total_areas
 * @property string $amount
 * @property integer $col_household
 * @property integer $actual_household
 * @property string $col_area_household
 * @property string $actual_area_household
 * @property string $col_amout_household
 * @property string $actual_amout_household
 * @property string $excessive_amount
 * @property string $actual_excessive_amount
 * @property integer $col_land_household
 * @property integer $actual_land_hosehold
 * @property string $col_land_areas
 * @property string $actual_land_areas
 * @property string $col_area_amout
 * @property string $actual_area_amount
 * @property string $company_name
 * @property string $price
 * @property string $pay_price
 * @property string $agent_price
 * @property string $pay_agent_price
 * @property string $audit_price
 * @property string $pay_audit_price
 * @property string $balance_price
 * @property string $pay_balance_price
 * @property string $design_price
 * @property string $pay_design_price
 * @property string $settlement_price
 * @property string $pay_settlement_price
 * @property string $supervisor_price
 * @property string $actul_supervisor_price
 * @property string $warranty_price
 * @property string $actul_warranty_price
 * @property integer $period
 * @property string $created_at
 * @property string $updated_at
 */
class Projects extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'projects';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['state', 'total_household', 'total_areas', 'col_household', 'actual_household', 'col_land_household', 'actual_land_hosehold', 'period'], 'integer'],
            [['amount', 'col_area_household', 'actual_area_household', 'col_amout_household', 'actual_amout_household', 'excessive_amount', 'actual_excessive_amount', 'col_land_areas', 'actual_land_areas', 'col_area_amout', 'actual_area_amount', 'price', 'pay_price', 'agent_price', 'pay_agent_price', 'audit_price', 'pay_audit_price', 'balance_price', 'pay_balance_price', 'design_price', 'pay_design_price', 'settlement_price', 'pay_settlement_price', 'supervisor_price', 'actul_supervisor_price', 'warranty_price', 'actul_warranty_price','operator'], 'number'],
            [['created_at', 'updated_at'], 'safe'],
            [['code', 'name', 'company_name'], 'string', 'max' => 50],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'code' => 'Code',
            'name' => '项目名称',
            'state' => 'State',
            'total_household' => '总户数',
            'total_areas' => '总面积',
            'amount' => '总金额',
            'col_household' => 'Col Household',
            'actual_household' => 'Actual Household',
            'col_area_household' => 'Col Area Household',
            'actual_area_household' => 'Actual Area Household',
            'col_amout_household' => 'Col Amout Household',
            'actual_amout_household' => 'Actual Amout Household',
            'excessive_amount' => 'Excessive Amount',
            'actual_excessive_amount' => 'Actual Excessive Amount',
            'col_land_household' => 'Col Land Household',
            'actual_land_hosehold' => 'Actual Land Hosehold',
            'col_land_areas' => 'Col Land Areas',
            'actual_land_areas' => 'Actual Land Areas',
            'col_area_amout' => 'Col Area Amout',
            'actual_area_amount' => 'Actual Area Amount',
            'company_name' => 'Company Name',
            'price' => 'Price',
            'pay_price' => 'Pay Price',
            'agent_price' => 'Agent Price',
            'pay_agent_price' => 'Pay Agent Price',
            'audit_price' => 'Audit Price',
            'pay_audit_price' => 'Pay Audit Price',
            'balance_price' => 'Balance Price',
            'pay_balance_price' => 'Pay Balance Price',
            'design_price' => 'Design Price',
            'pay_design_price' => 'Pay Design Price',
            'settlement_price' => 'Settlement Price',
            'pay_settlement_price' => 'Pay Settlement Price',
            'supervisor_price' => 'Supervisor Price',
            'actul_supervisor_price' => 'Actul Supervisor Price',
            'warranty_price' => 'Warranty Price',
            'actul_warranty_price' => 'Actul Warranty Price',
            'period' => 'Period',
            'operator' => 'operator',
            'created_at' => '创建时间',
            'updated_at' => '更新时间',
            'start_at' =>'时间搜索'
        ];
    }
}
