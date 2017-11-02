<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Information */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="information-form form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group form-group-title">
        <label class="" >安置户基本信息：</label>
    </div>
    <hr/>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'towns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'booklet')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contract_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arrange_type')->textInput() ?>

    <?= $form->field($model, 'permute_type')->textInput() ?>

    <?= $form->field($model, 'house_area')->textInput() ?>

    <?= $form->field($model, 'permute_area')->textInput() ?>

    <?= $form->field($model, 'use_area')->textInput() ?>

    <div class="form-group form-group-title">
        <label class="" >安置房信息：</label>
    </div>
    <hr/>

    <?= $form->field($model, 'arrange_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arrange_house_total')->textInput() ?>

    <?= $form->field($model, 'arrange_root_no')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'arrange_house_area')->textInput() ?>

    <?= $form->field($model, 'arrange_clearing')->textInput() ?>

    <?= $form->field($model, 'arrange_delivery_time')->textInput() ?>

    <?= $form->field($model, 'arrange_is_clearing')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'upload_file')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'sign_time')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group submit-button">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
 .form{
    height: 800px;
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