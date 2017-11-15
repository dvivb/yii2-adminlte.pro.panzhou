<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\UserPermissions */

$this->title = '增加权限配置';
$this->params['breadcrumbs'][] = ['label' => '权限配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-permissions-create">

    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
        'permissions' => $permissions,
    ]) ?>

</div>
