<?php

use yii\helpers\Html;

$this->title = '工作台';
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3>1024/20</h3>

                <p>累计项目总数/未完成数</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a href="#" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-green">
            <div class="inner">
                <h3>200.00/18.00</h3>

                <p>累计应付款/实付款(万)</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-yellow">
            <div class="inner">
                <h3>44<sup style="font-size: 20px">%</sup></h3>

                <p>款项拨付完成率</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="#" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-red">
            <div class="inner">
                <h3>10000.00</h3>

                <p><?= date('Y') ?>年度拨付总金额(万)</p>
            </div>
            <div class="icon">
                <i class="ion ion-pie-graph"></i>
            </div>
            <a href="#" class="small-box-footer">更多 <i class="fa fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <section class="col-lg-12 connectedSortable">
        <!-- Custom tabs (Charts with tabs)-->
        <div class="nav-tabs-custom">
            <!-- Tabs within a box -->
            <ul class="nav nav-tabs pull-right">
                <li class="active"><a href="#box" data-toggle="tab">待处理</a></li>
                <li><a href="#revenue-chart" data-toggle="tab">我发起</a></li>
                <li><a href="#sales-chart" data-toggle="tab">我参与</a></li>
                <li class="pull-left header"><i class="fa  fa-list-alt"></i> 待办事项</li>
            </ul>
            <div class="tab-content no-padding">
                <!-- Morris chart - Sales -->
                <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px;"></div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;"></div>
                <div class="tab-pane active box" id="box" style="border-top:0;">
                    <div class="box-header">
                        <h3 class="box-title">全部待处理事项列表</h3>
                    </div>
                    <!-- /.box-header -->
                    <div class="box-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <thead>
                            <tr>
                                <th>序号</th>
                                <th>项目名称</th>
                                <th>待办事项</th>
                                <th>发起人</th>
                                <th>审批结果</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>1</td>
                                <td>项目一</td>
                                <td>房屋征补一期拨款</td>
                                <td> 封某某【房屋股】</td>
                                <td>同意审批【分管领导.张某某】</td>
                                <td><?= Html::a('查看', ['/projectlist/projectlist/14'], ['class' => 'btn btn-success']) ?></td>
                            </tr>
                            <tr>
                                <td>2</td>
                                <td>项目二</td>
                                <td>房屋征补一期拨款</td>
                                <td> 封某某【房屋股】</td>
                                <td>同意审批【分管领导.张某某】</td>
                                <td><?= Html::a('查看', ['/projectlist/projectlist/14'], ['class' => 'btn btn-success']) ?></td>
                            </tr>
                            <tr>
                                <td>3</td>
                                <td>项目三</td>
                                <td>房屋征补一期拨款</td>
                                <td> 封某某【房屋股】</td>
                                <td>同意审批【分管领导.张某某】</td>
                                <td><?= Html::a('查看', ['/projectlist/projectlist/14'], ['class' => 'btn btn-success']) ?></td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.box-body -->
                </div>
                <!-- /.box -->
            </div>
        </div>
        <!-- /.nav-tabs-custom -->
    </section>
</div>
<!-- /.row -->

<script>
    $(function () {
        $('#example1').DataTable()
        $('#example2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        })
    })
</script>