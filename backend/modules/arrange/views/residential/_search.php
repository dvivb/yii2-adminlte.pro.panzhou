<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ResidentialsSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="residentials-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

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

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
