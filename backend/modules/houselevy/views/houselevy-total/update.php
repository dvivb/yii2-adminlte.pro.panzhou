<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyTotal */

$this->title = '更新: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => '房屋征补项目花名册汇总', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="houselevy-total-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
