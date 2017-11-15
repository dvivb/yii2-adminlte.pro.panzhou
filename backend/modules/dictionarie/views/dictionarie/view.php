<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Dictionaries */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '字典管理详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dictionaries-view view">


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
            'subject',
            'parent_id',
            'name',
            'unit',
            'price',
            'remarks',
            'sort',
            'created_at',
            'updated_at',
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