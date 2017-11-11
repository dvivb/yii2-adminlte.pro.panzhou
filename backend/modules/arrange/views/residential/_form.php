<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\datetimepicker\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Residentials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="residentials-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_total')->textInput() ?>

    <?= $form->field($model, 'house_area')->textInput() ?>

    <?= $form->field($model, 'suite_area')->textInput() ?>

    <?= $form->field($model, 'house_month_total')->textInput() ?>

    <?= $form->field($model, 'house_year_total')->textInput() ?>

    <div class="form-group form-group-title">
        <label class="" >已选住房情况：</label>
    </div>
    <hr/>

    <?= $form->field($model, 'house_year_area')->textInput() ?>

    <?= $form->field($model, 'house_amount')->textInput() ?>

    <?= $form->field($model, 'house_surplusr_amount')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>
<?php if($model['finished_time'] == null){
     echo  $form->field($model, 'finished_time')->widget(DateTimePicker::className(), [
        'clientOptions'=>['format' => 'yyyy-mm-dd hh:ii:ss'],
    ]); 
      }else{
        echo  $form->field($model, 'finished_time')->textInput(['readonly'=>true,]);
      }
?> 
<?php if($model['created_at'] == null){
        echo  $form->field($model, 'created_at')->textInput(['readonly'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'created_at')->textInput(['readonly'=>true,]);
      }
?>

<?php if($model['updated_at'] == null){
        echo  $form->field($model, 'updated_at')->textInput(['disabled'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'updated_at')->textInput(['disabled'=>true,]);
      }
?>
    <?// $form->field($model, 'finished_time')->textInput() ?>

    <?// $form->field($model, 'created_at')->textInput() ?>

    <?// $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group submit-button">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .form{
        height: 620px;
        padding: 10px;
        background: #fcfcfd;
    }
    .form-group {
        margin-bottom: 15px;
        width: 20%;
        float: left;
        margin: 1px 2%;
    }
    .form-group-title{
        margin: 10px 0;
        width: 100%;
    }
    .control-label{
        font-weight: normal;
    }
    .submit-button{
        float: right;
        display: block;
        margin: 100px -8% 0 0;
    }
</style>