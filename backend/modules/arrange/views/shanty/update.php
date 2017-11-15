<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Shanties */

$this->title = '商品安置房更新: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '商品安置房', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="shanties-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
