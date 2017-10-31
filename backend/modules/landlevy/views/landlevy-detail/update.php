<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyDetail */

$this->title = 'Update Landlevy Detail: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Landlevy Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="landlevy-detail-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
