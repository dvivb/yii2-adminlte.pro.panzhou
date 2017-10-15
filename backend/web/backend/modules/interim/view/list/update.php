<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterimList */

$this->title = 'Update Interim List: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Interim Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="interim-list-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
