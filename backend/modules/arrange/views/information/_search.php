<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\InformationSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="information-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

<!--    <?//= $form->field($model, 'id') ?>-->

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'identification') ?>

    <?= $form->field($model, 'phone') ?>

    <?= $form->field($model, 'towns') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'booklet') ?>

    <?php // echo $form->field($model, 'contract_no') ?>

    <?php // echo $form->field($model, 'arrange_type') ?>

    <?php // echo $form->field($model, 'permute_type') ?>

    <?php // echo $form->field($model, 'house_area') ?>

    <?php // echo $form->field($model, 'permute_area') ?>

    <?php // echo $form->field($model, 'use_area') ?>

    <?php // echo $form->field($model, 'arrange_address') ?>

    <?php // echo $form->field($model, 'arrange_house_total') ?>

    <?php // echo $form->field($model, 'arrange_root_no') ?>

    <?php // echo $form->field($model, 'arrange_house_area') ?>

    <?php // echo $form->field($model, 'arrange_clearing') ?>

    <?php // echo $form->field($model, 'arrange_delivery_time') ?>

    <?php // echo $form->field($model, 'arrange_is_clearing') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'upload_file') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <?php // echo $form->field($model, 'sign_time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group submit-button">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>

    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .information-search{
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
    .form-group-title{
        margin: 10px 0;
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