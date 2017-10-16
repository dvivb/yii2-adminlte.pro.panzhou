<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\UserPermissions */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="user-permissions-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'role_id')->dropDownList(
                        $roles,['prompt' => '选择权限分组']
                    )   ?>

    <?= $form->field($model, 'permission_id')->dropDownList(
                        $permissions,['prompt' => '选择权限']
                    ) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? '增加' : '更新', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
