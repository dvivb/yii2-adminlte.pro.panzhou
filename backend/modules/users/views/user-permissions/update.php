<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserPermissions */

$this->title = 'Update User Permissions: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'User Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="user-permissions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
        'permissions' => $permissions,
    ]) ?>

</div>
