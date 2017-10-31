<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyListSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landlevy-list-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'landlevy_total_id') ?>

    <?= $form->field($model, 'land_survey_no') ?>

    <?= $form->field($model, 'land_map_no') ?>

    <?= $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'gender') ?>

    <?php // echo $form->field($model, 'identification') ?>

    <?php // echo $form->field($model, 'phone') ?>

    <?php // echo $form->field($model, 'towns') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'bank_card') ?>

    <?php // echo $form->field($model, 'bank_name') ?>

    <?php // echo $form->field($model, 'upload_file') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
