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
        'userIds'=>isset($userIds)?$userIds:null,
        'userDetails'=>isset($userDetails)?$userDetails:[]
    ]) ?>


</div>

<!--div class="flow-view view">
        <div><h5>审批流程</h5></div>
        <div class="detail">
        <div>流程发起</div><br>

        <div>流程结束</div><br>
        </div>
</div-->
