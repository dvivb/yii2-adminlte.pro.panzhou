<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyDetail */

$this->title = 'Update Houselevy Detail: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="houselevy-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
