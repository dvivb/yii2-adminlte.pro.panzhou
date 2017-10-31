<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandlevyList */

$this->title = 'Create Landlevy List';
$this->params['breadcrumbs'][] = ['label' => 'Landlevy Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-list-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
