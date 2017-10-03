<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shanties */

$this->title = '商品安置房创建';
$this->params['breadcrumbs'][] = ['label' => '商品安置房', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shanties-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
