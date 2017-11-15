<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\User */

$this->title = '增加用户';
$this->params['breadcrumbs'][] = ['label' => '用户', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-create">

    <?= $this->render('_form', [
        'model' => $model,
        'roles' => $roles,
    ]) ?>

</div>
