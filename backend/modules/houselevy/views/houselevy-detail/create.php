<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HouselevyDetail */

$this->title = 'Create Houselevy Detail';
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
