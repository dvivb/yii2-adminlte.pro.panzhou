<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\HouselevyList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Houselevy Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-list-view">

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
            'houselevy_total_id',
            'name',
            'gender',
            'identification',
            'phone',
            'towns',
            'address',
            'bank_card',
            'bank_name',
            'upload_file',
            'created_at',
            'updated_at',
        ],
    ]) ?>

</div>
