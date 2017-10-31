<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyDetail */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Details', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-detail-view">

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
            'houselevy_list_id',
            'dictionaries_id',
            'subject',
            'parent_id',
            'name',
            'unit',
            'price',
            'levy_value',
            'compensation_price',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
