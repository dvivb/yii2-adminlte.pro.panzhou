<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="houselevy-detail-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'houselevy_list_id')->textInput() ?>

    <?= $form->field($model, 'dictionaries_id')->textInput() ?>

    <?= $form->field($model, 'subject')->dropDownList([ 'house_structure' => 'House structure', 'annexe_structure' => 'Annexe structure', 'attach' => 'Attach', 'structure' => 'Structure', 'equipment' => 'Equipment', 'land_status' => 'Land status', 'young_crop' => 'Young crop', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'parent_id')->textInput() ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'levy_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'compensation_price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

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