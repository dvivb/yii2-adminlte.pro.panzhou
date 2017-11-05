<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ShantiesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shanties-search search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'house_total') ?>

    <?= $form->field($model, 'house_area') ?>
    <?php echo  $form->field($model, 'created_at')->widget( \dosamigos\datepicker\DateRangePicker::className(), [
            'nameTo'=>'aaa',
            'attributeTo'=>"end_at",
            'language' => 'zh-CN',
            'labelTo'=>'至',
            'value'=>'',
            'clientOptions'=>['format' => 'yyyy-mm-dd'],
    ]); ?>

    <div class="form-group submit-button">
            <input type="submit" class="btn btn-primary" value="搜索" >      
            <input type="reset" class="btn btn-default"  value="重置" >    
            <input type="submit" name="export" class="btn btn-default" value="导出" >    
    </div>

    <div style="clear: both"></div>
    <?php ActiveForm::end(); ?>
    <div style="clear: both"></div>

</div>

<style>
    .search{
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
</style>