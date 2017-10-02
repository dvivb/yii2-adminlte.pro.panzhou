<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Information */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="information-form">

    <?php $form = ActiveForm::begin(); ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
