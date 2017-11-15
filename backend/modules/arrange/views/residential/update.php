<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Residentials */

$this->title = '更新棚改安置房: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '棚改安置房', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="residentials-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
