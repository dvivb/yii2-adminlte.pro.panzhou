<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyList */

$this->title = '更新: ' . $list->name;
$this->params['breadcrumbs'][] = ['label' => '房屋征补项目花名册汇总列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $list->name, 'url' => ['view', 'id' => $list->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="houselevy-list-update">

    <?= $this->render('_form', [
        'list' => $list,
        'detail' => $detail,
    ]) ?>

</div>
