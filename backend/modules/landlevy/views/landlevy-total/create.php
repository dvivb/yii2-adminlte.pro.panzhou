<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandlevyTotal */

$this->title = 'Create Landlevy Total';
$this->params['breadcrumbs'][] = ['label' => 'Landlevy Totals', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-total-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
