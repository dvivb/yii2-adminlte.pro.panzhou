<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\UserPermissions */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '权限配置', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-permissions-view view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'role_id',
            'permission_id',
            'create_at',
            'update_at',
        ],
    ]) ?>

</div>

<style>
    .view{
        padding: 10px;
        background: #fcfcfd;
    }

    p {
        float: right;
        margin: 16px;
    }
</style>