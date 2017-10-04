<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Shanties */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shanties-form form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'house_total')->textInput() ?>

    <?= $form->field($model, 'house_area')->textInput() ?>

    <?= $form->field($model, 'house_month_total')->textInput() ?>

    <?= $form->field($model, 'house_year_total')->textInput() ?>

    <?= $form->field($model, 'house_year_area')->textInput() ?>

    <?= $form->field($model, 'house_amount')->textInput() ?>

    <?= $form->field($model, 'house_amount_area')->textInput() ?>

    <?= $form->field($model, 'house_surplusr_amount')->textInput() ?>

    <?= $form->field($model, 'biz_house_total')->textInput() ?>

    <?= $form->field($model, 'biz_house_area')->textInput() ?>

    <div class="form-group form-group-title">
        <label class="" >已选住房情况：</label>
    </div>
    <hr/>

    <?= $form->field($model, 'biz_house_month_total')->textInput() ?>

    <?= $form->field($model, 'biz_house_year_total')->textInput() ?>

    <?= $form->field($model, 'biz_house_year_area')->textInput() ?>

    <?= $form->field($model, 'biz_house_amount')->textInput() ?>

    <?= $form->field($model, 'biz_house_amount_area')->textInput() ?>

    <?= $form->field($model, 'biz_house_surplusr_amount')->textInput() ?>

    <?= $form->field($model, 'remarks')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'operator')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'created_at')->textInput() ?>

    <?= $form->field($model, 'updated_at')->textInput() ?>

    <div class="form-group submit-button">
        <?= Html::submitButton($model->isNewRecord ? '创建' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>

<style>
    .form{
        height: 670px;
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