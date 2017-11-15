<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Information */

$this->title = '创建安置信息';
$this->params['breadcrumbs'][] = ['label' => '安置信息管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
