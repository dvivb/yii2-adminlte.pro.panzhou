<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandlevyDetail */

$this->title = 'Create Landlevy Detail';
$this->params['breadcrumbs'][] = ['label' => 'Landlevy Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-detail-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
