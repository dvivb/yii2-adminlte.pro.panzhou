<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "projects".
 *
 * @property string $id
 * @property string $code
 * @property string $name
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
            [['total_household', 'total_areas', 'col_household', 'actual_household', 'col_land_household', 'actual_land_hosehold', 'period'], 'integer'],
            [['amount', 'col_area_household', 'actual_area_household', 'col_amout_household', 'actual_amout_household', 'excessive_amount', 'actual_excessive_amount', 'col_land_areas', 'actual_land_areas', 'col_area_amout', 'actual_area_amount', 'price', 'pay_price', 'agent_price', 'pay_agent_price', 'audit_price', 'pay_audit_price', 'balance_price', 'pay_balance_price', 'design_price', 'pay_design_price', 'settlement_price', 'pay_settlement_price', 'supervisor_price', 'actul_supervisor_price', 'warranty_price', 'actul_warranty_price'], 'number'],
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
            'code' => '项目编号',
            'name' => '名称',
            'total_household' => '总户数',
            'total_areas' => '总面积',
            'amount' => '总金额',
            'col_household' => '应该正补户数',
            'actual_household' => '实际征收补偿户数',
            'col_area_household' => '房屋征补总面积',
            'actual_area_household' => '实际房屋征补总面积',
            'col_amout_household' => '房屋征补总金额',
            'actual_amout_household' => '实际房屋征补总金额',
            'excessive_amount' => '过渡费总计',
            'actual_excessive_amount' => '实际过渡费总计',
            'col_land_household' => '土地征补总户数',
            'actual_land_hosehold' => '实际土地征补总户数',
            'col_land_areas' => '土地征补总面积',
            'actual_land_areas' => '实际土地征补总面积',
            'col_area_amout' => '土地征补总金额',
            'actual_area_amount' => '实际土地征补总金额',
            'company_name' => '中标公司名称',
            'price' => '中标价格',
            'pay_price' => '工程进度已支付金额',
            'agent_price' => '招投标代理费',
            'pay_agent_price' => '支付招投标代理费',
            'audit_price' => '预算审计费用',
            'pay_audit_price' => '支付预算审计费用',
            'balance_price' => '结算审计费用',
            'pay_balance_price' => '支付结算审计费用',
            'design_price' => '项目设计费',
            'pay_design_price' => '支付项目设计费',
            'settlement_price' => '工程款结算审计金额',
            'pay_settlement_price' => '支付工程款结算审计金额',
            'supervisor_price' => '监理费用',
            'actul_supervisor_price' => '支付监理费用',
            'warranty_price' => '质保金额',
            'actul_warranty_price' => '支付质保金额',
            'period' => '期数',
            'created_at' => 'Created At',
            'updated_at' => 'Updated At',
        ];
    }
}
