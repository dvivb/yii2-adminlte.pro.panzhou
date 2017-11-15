<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyDetail */

$this->title = '更新: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => '土地征补项目花名册详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = '更新';
?>
<div class="landlevy-detail-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
