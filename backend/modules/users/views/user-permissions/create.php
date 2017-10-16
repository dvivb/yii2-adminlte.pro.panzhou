<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserPermissions */

$this->title = '增加权限配置';
$this->params['breadcrumbs'][] = ['label' => 'User Permissions', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-permissions-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
        'permissions' => $permissions,
    ]) ?>

</div>
