<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Residentials */

$this->title = 'Create Residentials';
$this->params['breadcrumbs'][] = ['label' => 'Residentials', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="residentials-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
