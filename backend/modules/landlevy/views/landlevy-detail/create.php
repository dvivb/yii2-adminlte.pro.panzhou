<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\LandlevyDetail */

$this->title = '创建';
$this->params['breadcrumbs'][] = ['label' => '土地征补项目花名册详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-detail-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
