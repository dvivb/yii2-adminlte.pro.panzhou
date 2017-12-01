<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandlevyList */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '土地征补项目花名册列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-list-create">

    <?= $this->render('_form', [
        'list' => $list,
        'detail' => $detail,
    ]) ?>

</div>
