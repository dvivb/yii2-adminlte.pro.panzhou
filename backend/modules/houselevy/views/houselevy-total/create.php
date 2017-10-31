<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HouselevyTotal */

$this->title = 'Create Houselevy Total';
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Totals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-total-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
