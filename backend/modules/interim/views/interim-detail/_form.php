<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InterimDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="interim-detail-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'id_number')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'project_id')->textInput() ?>

    <?= $form->field($model, 'project_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'biz_house_area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'amount')->textInput(['maxlength' => true]) ?>
    
    <?php if($model['sign_time'] == null){
        echo  $form->field($model, 'sign_time')->textInput(['readonly'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'sign_time')->textInput(['readonly'=>true,]);
      }
    ?>
    
    
    
    <?// $form->field($model, 'sign_time')->textInput() ?>
    <?php if($model['start_time'] == null){
        echo  $form->field($model, 'start_time')->textInput(['readonly'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'start_time')->textInput(['readonly'=>true,]);
      }
    ?>
    
    
    <?// $form->field($model, 'start_time')->textInput() ?>
    <?php if($model['end_time'] == null){
        echo  $form->field($model, 'end_time')->textInput(['readonly'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'end_time')->textInput(['readonly'=>true,]);
      }
    ?>
    <?// $form->field($model, 'end_time')->textInput() ?>
    <?php if($model['created_at'] == null){
        echo  $form->field($model, 'created_at')->textInput(['readonly'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'created_at')->textInput(['readonly'=>true,]);
      }
    ?>
    <?// $form->field($model, 'created_at')->textInput(['readonly'=>true]) ?>
    <?php if($model['updated_at'] == null){
        echo  $form->field($model, 'updated_at')->textInput(['disabled'=>true,'value'=>date('Y-m-d H:i:s',time())]);
      }else{
        echo  $form->field($model, 'updated_at')->textInput(['disabled'=>true,]);
      }
    ?>
    <?// $form->field($model, 'updated_at')->textInput(['readonly'=>true]) ?>

    <div class="form-group submit-button">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .form{
        height: 400px;
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