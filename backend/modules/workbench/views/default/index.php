<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
backend\assets\JConfirmAsset::register($this);

$this->title = '工作台';
?>

<div class="row">
    <div class="col-lg-3 col-xs-6">
        <!-- small box -->
        <div class="small-box bg-aqua">
            <div class="inner">
                <h3><?=$data["project_total"];?>/<?=$data["project_incomplete_total"];?></h3>

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
                <h3><?=$data["project_amount_total"]["amount"]/10000;?>/<?=$data["project_amount_total"]["actual_amount"]/10000;?></h3>

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
                <h3><?=sprintf("%.4f",$data["project_amount_total"]["actual_amount"]/$data["project_amount_total"]["amount"])*100;?><sup style="font-size: 20px">%</sup></h3>

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
                <h3><?=$data["project_amount_total"]["actual_amount"]/10000;?></h3>

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
                <div class="chart tab-pane" id="revenue-chart" style="position: relative; height: 300px;">

                </div>
                <div class="chart tab-pane" id="sales-chart" style="position: relative; height: 300px;">
                </div>
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
                                <th>创建时间</th>
                                <th>更新时间</th>
                                <th>操作</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php
                            foreach($data['project_list'] as $v){ ?>
                                <tr>
                                    <td><?= $v['id']; ?></td>
                                    <td><?= $v['name']; ?></td>
                                    <td>房屋征补（<?= $v['periods']; ?>）期拨款</td>
                                    <td><?= $v['username']; ?><!--[<?// $v['role_name']; ?>]--></td>
                                    <td>
                                        <?php
//                                        0未提交、1提交拨款,2初审通过、3业务主管审批通过、4分管领导审批通过、5主要领导审批通过
                                            if($v['approval'] == 0){
                                                echo '未提交';
                                            }elseif ($v['approval'] = 1) {
                                                echo '提交拨款';
                                            }elseif ($v['approval'] = 2) {
                                                echo '初审通过';
                                            }elseif ($v['approval'] = 3) {
                                                echo '业务主管审批通过';
                                            }elseif ($v['approval'] = 4) {
                                                echo '分管领导审批通过';
                                            }elseif ($v['approval'] = 5) {
                                                echo '主要领导审批通过';
                                            }else{
                                                echo '审批状态未知';
                                            }
                                        ?>
                                    </td>
                                    <td><?= $v['created_at']; ?></td>
                                    <td><?= $v['updated_at']; ?></td>
                                    <td><button class="btn btn-info commit-btn-approval" data-source-type="<?=$v['source_type'];?>" data="<?=$v["id"];?>"> 审批</button> <?= Html::a('查看', ['/landlevy/landlevy-total?LandlevyTotalSearch[project_id]=' . $v['id']], ['class' => 'btn btn-success']) ?></td>
                                </tr>
                            <?php } ?>
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





<?php $this->beginBlock('houseTotalindex') ?>

/*
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
    $(function(){
            <!--     	  $('.commit-btn').click(function(){ -->
            <!--     	        var id = $(this).attr('data'); -->
            <!--     			var ifTrue = confirm("确认提交申请拨款?"); -->
            <!--                 if(ifTrue){ -->
            <!--                     $.get('/landlevy/landlevy-total/applys/'+id,function(res){ -->
            <!--                         if(res.code == 1){ -->
            <!--                             alert("申请拨款成功"); -->
            <!--                             location.href = location.href; -->
            <!--                         }else{ -->
            <!--                            alert("申请拨款失败"); -->
            <!--                         } -->

            <!--                     },'json') -->
            <!--                 }else{ -->
            <!--                     return false -->
            <!--                 } -->
            <!--               }) -->

            $('.commit-btn').click(function(){
                var id = $(this).attr('data');
                $.confirm({
                    title: '确认审批并指向下一步审批',
                    content: function () {
                        var self = this;
                        return $.ajax({
                            url: '/users/users/get-user-group',
                            dataType: 'json',
                            method: 'get'
                        }).done(function (response) {
                            var content = '<select class="user_role col-lg-12"> <option>选择部门</option>';
                            for(var i in response) {
                                console.log(i);
                                content += '<option value="'+response[i].id+'">'+response[i].role_name+'</option>';
                            }
                            content += '</select><br><br><select class="user_id col-lg-12"><option>选择审批人</option></select><br><br>';

                            content += '</select><br><br><select class="is_agree col-lg-12"><option>是否同意</option value="1"><option>是</option><option value="-1">否</option></select><br><br>';
                            content +='<div>备注：<input type="text" name="remarks"></div>';
                            content +='<div style="clear: both"></div>';
                            self.setContent(content);
                        }).fail(function(){
                            self.setContent('Something went wrong.');
                        });
                    },
                    buttons: {
                        formSubmit: {
                            text: '提交',
                            btnClass: 'btn-blue',
                            action: function () {
                                var userid = $('.user_id').val();
                                $.get('/landlevy/landlevy-total/applys/'+id+'/'+userid,function(res){
                                    if(res.code == 1){
                                        alert("申请拨款成功");
                                        location.href = location.href;
                                    }else{
                                        alert("申请拨款失败");
                                    }

                                },'json')
                            }
                        },
                        cancel: {
                            text: '关闭',
                            action: function () {
                            }
                        },
                    },
                    onContentReady: function () {
                        var self = this;
                    },
                    columnClass: 'small'
                })
            })


            $(document).on('change','.user_role',function(){
                var role_id = $(this).val();
                if(role_id >0 ){
                    $.get("/users/users/get-users?role_id="+role_id,function(res){
                        $str = '';
                        for(var i in res){
                            $str += '<option value="'+res[i].id+'">'+res[i].username+'</option>';
                        }
                        if($str == ''){
                            $str = '<option>该部门无用户</option>';
                        }
                        $('.user_id').html($str)
                    },'json')
                }else{
                    $str = '<option>该部门无用户</option>';
                    $('.user_id').html($str)
                }

            })
        })

*/
<?php $this->endBlock() ?>
<?php $this->registerJs($this->blocks['houseTotalindex'], \yii\web\View::POS_END); ?>