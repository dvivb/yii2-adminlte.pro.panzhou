<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyList */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="houselevy-list-form form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="form-group form-group-title">
        <label class="" >被征户主基本：</label>
    </div>
    <hr/>
    <?= $form->field($list, 'houselevy_total_id')->textInput() ?>

    <?= $form->field($list, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($list, 'gender')->dropDownList([ '1' => '男', '2' => '女'], ['prompt' => '']) ?>

    <?= $form->field($list, 'identification')->textInput(['maxlength' => true]) ?>

    <?= $form->field($list, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($list, 'towns')->textInput(['maxlength' => true]) ?>

    <?= $form->field($list, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($list, 'bank_card')->textInput(['maxlength' => true]) ?>

    <?= $form->field($list, 'bank_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($list, 'upload_file')->textInput(['maxlength' => true]) ?>

    <div class="form-group form-group-title">
        <label class="" >房屋信息录入：</label>
    </div>
    <hr/>
<!--    --><?//= $form->field($detail, 'houselevy_list_id')->textInput() ?>

    <?= $form->field($detail, 'dictionaries_id')->textInput() ?>

    <?= $form->field($detail, 'subject')->dropDownList([ 'house_structure' => '房屋结构', 'annexe_structure' => '附房结构', 'attach' => '地上附着物', 'structure' => '构筑物', 'equipment' => '配套设备', 'land_status' => '土地类别', 'young_crop' => '青苗', ], ['prompt' => '']) ?>

    <?= $form->field($detail, 'parent_id')->textInput() ?>

    <?= $form->field($detail, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($detail, 'unit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($detail, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($detail, 'levy_value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($detail, 'compensation_price')->textInput(['maxlength' => true]) ?>

    <div class="form-group form-group-title">
        <label class="" >附件：</label>
    </div>
    <hr/>
    <?= $form->field($list, 'upload_file')->fileInput(['maxlength' => true]) ?>

    <div class="form-group submit-button">
        <?= Html::submitButton($list->isNewRecord ? '创建' : '更新', ['class' => $list->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
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