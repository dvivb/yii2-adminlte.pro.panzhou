<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Information */

$this->title = '更新安置信息: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '安置信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="information-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
