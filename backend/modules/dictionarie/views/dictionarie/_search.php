<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\DictionariesSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dictionaries-search search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php // $form->field($model, 'id') ?>

    <?= $form->field($model, 'subject')->dropDownList([ 'house_structure' => '房屋结构', 'annexe_structure' => '附房结构', 'attach' => '地上附着物', 'structure' => '构筑物', 'equipment' => '配套设备', 'land_status' => '土地类别', 'young_crop' => '青苗', ], ['prompt' => '']) ?>

    <?php // $form->field($model, 'parent_id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'unit') ?>

    <?php echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'remarks') ?>

    <?php // echo $form->field($model, 'sort') ?>

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