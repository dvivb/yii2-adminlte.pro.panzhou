<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="houselevy-list-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'houselevy_total_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'gender')->dropDownList([ '1' => '男', '2' => '女'], ['prompt' => '']) ?>

    <?= $form->field($model, 'identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'towns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upload_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput(['readonly'=>true]) ?>

    <?= $form->field($model, 'updated_at')->textInput(['readonly'=>true]) ?>

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