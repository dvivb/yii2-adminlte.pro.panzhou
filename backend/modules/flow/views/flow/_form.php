<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Flow */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="flow-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->dropDownList(['1'=>'房屋','2'=>'征收补偿款','3'=>'土地']) ?>

    <?= $form->field($model, 'create_time')->textInput(['disabled'=>true]) ?>

    <?= $form->field($model, 'update_time')->textInput(['disabled'=>true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
