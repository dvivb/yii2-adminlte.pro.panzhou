<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\HouselevyTotal */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '房屋征补项目花名册汇总', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-total-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
