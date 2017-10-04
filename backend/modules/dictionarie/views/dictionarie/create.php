<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Dictionaries */

$this->title = '字典创建';
$this->params['breadcrumbs'][] = ['label' => '字典管理', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionaries-create">


    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
