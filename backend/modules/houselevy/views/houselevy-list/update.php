<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyList */

$this->title = 'Update Houselevy List: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="houselevy-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
