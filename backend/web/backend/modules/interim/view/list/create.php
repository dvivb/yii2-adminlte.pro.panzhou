<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InterimList */

$this->title = 'Create Interim List';
$this->params['breadcrumbs'][] = ['label' => 'Interim Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
