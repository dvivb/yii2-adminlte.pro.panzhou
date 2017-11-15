<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Flow */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '流程管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flow-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
