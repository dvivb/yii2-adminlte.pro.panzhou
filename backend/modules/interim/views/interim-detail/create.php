<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InterimDetail */

$this->title = '过渡费明细创建';
$this->params['breadcrumbs'][] = ['label' => '过渡费明细列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-detail-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
