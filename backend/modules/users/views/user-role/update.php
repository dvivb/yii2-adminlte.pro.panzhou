<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\UserRole */

$this->title = '更新用户分组: ' . $model->role_name;
$this->params['breadcrumbs'][] = ['label' => '用户分组', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新用户分组';
?>
<div class="user-role-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
