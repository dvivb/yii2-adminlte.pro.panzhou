<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\jui\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\InterimDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interim-detail-search">

    <?php $form = ActiveForm::begin([
        'method' => 'get',
    ]); ?>
<?php  ?>
    <div style="display: none">
    <?php echo $form->field($model, 'id')->hiddenInput(['value'=>$id]) ;?>
    </div>
    <?php echo  $form->field($model, 'start_at')->widget( \dosamigos\datepicker\DateRangePicker::className(), [
        'nameTo'=>'aaa',
        'attributeTo'=>"end_at",
        'language' => 'zh-CN',
        'labelTo'=>'至',
        'value'=>'',
        'clientOptions'=>['format' => 'yyyy-mm-dd'],
]); ?>

    <div class="form-group">
            <input type="submit" name="search" class="btn btn-primary" value="搜索" >      
            <input type="reset" class="btn btn-default"  value="重置" >    
            <input type="submit" name="export" class="btn btn-default" value="导出" >    
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .search{
        height: 130px;
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