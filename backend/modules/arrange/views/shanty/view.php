<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Shanties */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '商品安置房详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shanties-view view">

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
            'address',
            'house_total',
            'house_area',
            'house_month_total',
            'house_year_total',
            'house_year_area',
            'house_amount',
            'house_amount_area',
            'house_surplusr_amount',
            'biz_house_total',
            'biz_house_area',
            'biz_house_month_total',
            'biz_house_year_total',
            'biz_house_year_area',
            'biz_house_amount',
            'biz_house_amount_area',
            'biz_house_surplusr_amount',
            'remarks',
            'operator',
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