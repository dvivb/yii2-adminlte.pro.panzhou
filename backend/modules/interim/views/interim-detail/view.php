<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\InterimDetail */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '过渡费明细列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-detail-view view">

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
            'name',
            'id_number',
            'project_id',
            'project_name',
            'house_area',
            'biz_house_area',
            'amount',
            'sign_time',
            'start_time',
            'end_time',
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