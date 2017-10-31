<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HouselevyList */

$this->title = 'Create Houselevy List';
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
