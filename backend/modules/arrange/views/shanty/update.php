<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shanties */

$this->title = 'Update Shanties: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Shanties', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="shanties-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
