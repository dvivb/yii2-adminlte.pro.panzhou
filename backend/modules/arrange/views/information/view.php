<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Information */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '安置信息详情', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-view "view>


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
            'identification',
            'phone',
            'towns',
            'address',
            'booklet',
            'contract_no',
            'arrange_type',
            'permute_type',
            'house_area',
            'permute_area',
            'use_area',
            'arrange_address',
            'arrange_house_total',
            'arrange_root_no',
            'arrange_house_area',
            'arrange_clearing',
            'arrange_delivery_time',
            'arrange_is_clearing',
            'remarks',
            'upload_file',
            'operator',
            'sign_time',
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
