<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyTotal */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => '土地征补项目花名册汇总', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-total-view view">

    <p>
        <?= Html::a('更新', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('删除', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => '你确定要删除这个记录吗??',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'project_id',
            'periods',
            'total_households',
            'total_area',
            'total_amount',
            'operator',
            'approval',
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