<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InterimListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interim-list-search search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?= $form->field($model, 'project_id') ?>

    <?= $form->field($model, 'project_name') ?>

    <?= $form->field($model, 'total_area') ?>

    <?= $form->field($model, 'total_amount') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <?php // echo $form->field($model, 'approval') ?>

    <?php // echo $form->field($model, 'grant_time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group operate-button">
        <button type="button" class="btn btn-info" data-toggle="modal" data-target="#modal-default">导入</button>
        <input type="submit" name="search" class="btn btn-info" value="导出" >
        <input type="submit" name="search" class="btn btn-primary" value="搜索" >
        <input type="reset" class="btn btn-default"  value="重置" >
    </div>

    <div style="clear: both"></div>
    <?php ActiveForm::end(); ?>
    <div style="clear: both"></div>

</div>

<style>
    .search{
        height: 160px;
        padding: 10px;
        background: #fcfcfd;
    }
    .form-group {
        margin-bottom: 15px;
        width: 20%;
        float: left;
        margin: 1px 2%;
    }
    .control-label{
        font-weight: normal;
    }
    .submit-button{
        float: right;
        display: block;
        margin: 0 -4% 0 0;
    }
    .operate-button{
        width: 226px;
        float: right;
        margin-top: 26px;
    }

</style>



<div class="modal fade" id="modal-default">
    <div class="modal-dialog">
        <div class="modal-content">
            <!-- form start -->
            <form role="form" method="post">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title">
                        导入
                        <a href="?export" target="_blank" class="btn btn-sm btn-link" style="padding: 0;margin-left: 6px;"> <i class="fa fa-file-excel-o"></i>  下载导入模板 </a>
                    </h4>
                </div>
                <div class="modal-body">
                    <div class="btn btn-primary btn-file" style="width:570px">
                        <i class="glyphicon glyphicon-folder-open"></i>&nbsp;  <span class="hidden-xs">浏览</span><input type="file" class="ul_fl" name="ul_fl" id="1509985117379">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default pull-left" data-dismiss="modal">关闭</button>
                    <button type="submit" class="btn btn-primary">提交</button>
                </div>
            </form>
            <!-- /form -->
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
