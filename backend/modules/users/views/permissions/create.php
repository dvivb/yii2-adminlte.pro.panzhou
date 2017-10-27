<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Permissions */

$this->title = '创建权限';
$this->params['breadcrumbs'][] = ['label' => '权限', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="permissions-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
