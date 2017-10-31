<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyDetailSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="landlevy-detail-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'landlevy_list_id') ?>

    <?= $form->field($model, 'dictionaries_id') ?>

    <?= $form->field($model, 'subject') ?>

    <?= $form->field($model, 'parent_id') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'unit') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'levy_value') ?>

    <?php // echo $form->field($model, 'compensation_price') ?>

    <?php // echo $form->field($model, 'created_at') ?>

    <?php // echo $form->field($model, 'updated_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
