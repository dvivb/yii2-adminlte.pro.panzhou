<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResidentialsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="residentials-search search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>


    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'house_name') ?>

    <?= $form->field($model, 'address') ?>

    <?= $form->field($model, 'house_total') ?>

    <?php // echo $form->field($model, 'house_area') ?>

    <?php // echo $form->field($model, 'suite_area') ?>

    <?php // echo $form->field($model, 'house_month_total') ?>

    <?php // echo $form->field($model, 'house_year_total') ?>

    <?php // echo $form->field($model, 'house_year_area') ?>

    <?php // echo $form->field($model, 'house_amount') ?>

    <?php // echo $form->field($model, 'house_surplusr_amount') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'operator') ?>

    <?php // echo $form->field($model, 'finished_time') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group submit-button">
        <?= Html::submitButton('搜索', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('重置', ['class' => 'btn btn-default']) ?>
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