<?php

$this->params['breadcrumbs'][] = ['label' => '项目管理', ];
$this->params['breadcrumbs'][] = ['label' => '项目详情', 'url' => ['/project/project/index']];
/* @var $this yii\web\View */
?>

    <div style='clear:both'></div>
    <div class='text-center'>
        <div class='col-lg-12'>
            <div class='box box-primary'>
                <div class="box-header with-border">
                     <h5 class="box-title">项目详情</h5>
                 </div>
                 <div style='clear:both'></div>
                <form action='' method='post'>
                    <div class="box-body">
                      <div id="example2_wrapper" class="dataTables_wrapper form-inline dt-bootstrap">
                        <div class="row">
                            <div class="col-sm-6"></div>
                            <div class="col-sm-6"></div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <table id="example2" class="table table-bordered table-hover dataTable" role="grid" aria-describedby="example2_info">
                                    <thead>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><b>项目基本信息</b></td>
                                        </tr>
                                        <tr role="row" class="odd">
                                          <td class="sorting_1">
                                                                                                                项目名称
                                          </td>
                                          <td>
                                                <input type="text" value="项目名称" name="name" />
                                          </td>
                                          <td>
                                                                                                                项目编号
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="code" />
                                          </td>
                                          <td>
                                                                                                                    总户数
                                          </td>
                                          <td>
                                           <input type="text" value="0" name="total_household" />
                                           </td>
                                        </tr>
                                        <tr role="row" class="event">
                                          <td class="sorting_1">
                                                                                                                总面积（平方）
                                          </td>
                                          <td>
                                                <input type="text" value="0" name="total_areas" />
                                          </td>
                                          <td>
                                                                                                                总金额（元）
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="amout" />
                                          </td>
                                        </tr>
                                        <tr>
                                            <td><b>征收补偿信息</b></td>
                                        </tr>
                                        <tr role="row" class="odd">
                                          <td class="sorting_1">
                                                                                                                房屋征补总户数
                                          </td>
                                          <td>
                                               <input type="text" value="0" name="col_household" />
                                          </td>
                                          <td>
                                                                                                                房屋征补总面积
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="col_area_household" />
                                          </td>
                                          <td>
                                                                                                                房屋征补总金额
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="col_amout_household" />
                                          </td>
                                        </tr>
                                        <tr role="row" class="event">
                                          <td class="sorting_1">
                                                                                                                过渡费总计
                                          </td>
                                          <td>
                                                <input type="text" value="0" name="excessive_amount" ?>
                                          </td>
                                          <td>
                                                                                                                土地征补总户数
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="col_land_household"/>
                                          </td>
                                          <td>
                                                                                                               土地征补总面积
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="col_land_areas" />
                                          </td>
                                        </tr>
                                        <tr>
                                            <td>土地征补总金额</td>
                                            <td> <input type="text" value="0" name="col_area_amout" /></td>
                                        </tr>
                                        <tr>
                                            <td><b>项目工程信息</b></td>
                                        </tr>
                                        <tr role="row" class="event">
                                          <td>中标公司</td>
                                          <td>
                                            <input type="text" value="中标公司" name="company_name" />
                                          </td>
                                          <td>
                                                                                                               项目中标价（元）
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="price" />
                                          </td>
                                          <td>
                                                                                                                工程进度款已支付金额（元）
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="pay_price" />
                                          </td>
                                        </tr>
                                        <tr role="row" class="event">
                                          <td>招标代理费</td>
                                          <td>
                                             <input type="text" value="0" name="agent_price" />
                                          </td>
                                          <td>
                                                                                                               预算审计费用（元）
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="audit_price" />
                                          </td>
                                          <td>
                                                                                                                结算审计费用（元）
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="pay_price" />
                                          </td>
                                        </tr>
                                        <tr role="row" class="event">
                                          <td>已支付</td>
                                          <td>
                                            <input type="text" value="0" name="pay_agent_price" />
                                          </td>
                                          <td>
                                                                                                                已支付
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="pay_audit_price" />
                                          </td>
                                          <td>
                                                                                                                工程进度款已支付金额（元）
                                          </td>
                                          <td>
                                            <input type="text" value="0" name="pay_price" />
                                          </td>
                                        </tr>
                                        <tr>
                                            <td>项目设计费</td>
                                            <td><input type="text" value="0" name="design_price"/></td>
                                            <td>工程款结算审计金额（元）</td>
                                            <td><input type="text" value="0" name="settlement_price" /></td>
                                            <td>监理费用（元）</td>
                                            <td><input type="text" value="0" name="supervisor_price" /></td>
                                        </tr>
                                        <tr>
                                            <td>支付</td>
                                            <td><input type="text" value="0" name="pay_design_price" /></td>
                                            <td>支付</td>
                                            <td><input type="text" value="0" name="pay_settlement_price" /></td>
                                            <td>支付</td>
                                            <td><input type="text" value="0" name="actul_supervisor_price" /></td>
                                        </tr>
                                        <tr>
                                            <td>质保金额</td>
                                            <td><input type="text" value="0" name="warranty_price" /></td>
                                        </tr>
                                        <tr>
                                            <td>支付</td>
                                            <td><input type="text" value="0" name="actul_warranty_price" /></td>
                                        </tr>
                                    </tbody>
                                    <tfoot>
                                        <tr>
                                        <td colspan=6> <input type='submit' class="btn btn-primary edit-sms-template" value="提交"></td>
                                        </tr>
                                    </tfoot>
                              </table>
                            </div>
                            </div>
                            </div>
        </div>
        </form>
     </div>
</div>
<div style="clear:both"></div>

