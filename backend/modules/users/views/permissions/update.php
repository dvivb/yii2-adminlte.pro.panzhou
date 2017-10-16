<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Permissions */

$this->title = '更新权限: ' . $model->permission_name;
$this->params['breadcrumbs'][] = ['label' => '权限', 'url' => ['index']];
// $this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新权限';
?>
<div class="permissions-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
