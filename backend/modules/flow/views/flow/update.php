<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Flow */

$this->title = '更新流程: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '流程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '流程更新';
?>
<div class="flow-update">

    <h1><? // Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
