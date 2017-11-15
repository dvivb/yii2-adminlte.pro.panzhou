<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InterimList */

$this->title = '过渡费项目更新: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '过渡费项目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="interim-list-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
