<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Flow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flow-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(['1'=>'房屋','2'=>'征收补偿款','3'=>'土地']) ?>
    <?php
        if($model->create_time==null){
            echo $form->field($model, 'create_time')->textInput(['disabled'=>true,'value'=>date('Y-m-d H:i:s')]);
        }else{
            echo $form->field($model, 'create_time')->textInput(['disabled'=>true]);
        }

    ?>
    <?php
    if($model->update_time==null){
        echo $form->field($model, 'update_time')->textInput(['disabled'=>true,'value'=>date('Y-m-d H:i:s')]);
    }else{
        echo $form->field($model, 'update_time')->textInput(['disabled'=>true]);
    }

    ?>

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