<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPermissions */

$this->title = '更新权限配置: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '权限配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="user-permissions-update">

    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
        'permissions' => $permissions,
    ]) ?>

</div>
