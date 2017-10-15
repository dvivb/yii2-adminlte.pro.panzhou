<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterimDetail */

$this->title = '过渡费明细更新: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '过渡费明细列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="interim-detail-update">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
