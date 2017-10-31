<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyDetail */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landlevy-detail-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'landlevy_list_id')->textInput() ?>

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

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
