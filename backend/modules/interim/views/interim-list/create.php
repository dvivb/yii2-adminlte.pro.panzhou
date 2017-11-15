<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\InterimList */

$this->title = '过渡费项目创建';
$this->params['breadcrumbs'][] = ['label' => '过渡费项目列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-list-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
