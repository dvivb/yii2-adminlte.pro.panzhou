<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Residentials */

$this->title = '创建棚改安置房';
$this->params['breadcrumbs'][] = ['label' => '棚改安置房', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="residentials-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
