<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shanties */

$this->title = 'Create Shanties';
$this->params['breadcrumbs'][] = ['label' => 'Shanties', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shanties-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
