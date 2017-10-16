<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Permissions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="permissions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'permission_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'permission_action')->textInput(['maxlength' => true]) ?>


    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
