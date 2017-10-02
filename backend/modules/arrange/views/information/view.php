<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Information */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Informations', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
