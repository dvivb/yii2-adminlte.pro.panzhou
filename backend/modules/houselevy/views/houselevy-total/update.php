<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyTotal */

$this->title = 'Update Houselevy Total: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Totals', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="houselevy-total-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
