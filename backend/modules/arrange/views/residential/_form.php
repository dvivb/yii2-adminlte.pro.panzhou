<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Residentials */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="residentials-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_total')->textInput() ?>

    <?= $form->field($model, 'house_area')->textInput() ?>

    <?= $form->field($model, 'suite_area')->textInput() ?>

    <?= $form->field($model, 'house_month_total')->textInput() ?>

    <?= $form->field($model, 'house_year_total')->textInput() ?>

    <?= $form->field($model, 'house_year_area')->textInput() ?>

    <?= $form->field($model, 'house_amount')->textInput() ?>

    <?= $form->field($model, 'house_surplusr_amount')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'finished_time')->textInput() ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
