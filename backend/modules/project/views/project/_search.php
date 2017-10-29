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
        'action' => ['index'],
        'method' => 'get',
    ]); ?>
<?php  ?>

    <?php echo  $form->field($model, 'start_at')->widget( \dosamigos\datepicker\DateRangePicker::className(), [
        'nameTo'=>'aaa',
        'attributeTo'=>"end_at",
        'language' => 'zh-CN',
        'labelTo'=>'至',
        'clientOptions'=>['format' => 'yyyy-mm-dd'],
]); ?>

    <div class="form-group">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
         <?= Html::resetButton('导出', ['class' => 'btn btn-default']) ?>
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