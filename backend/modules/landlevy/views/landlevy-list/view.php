<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Landlevy Lists', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-list-view">

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
            'landlevy_total_id',
            'land_survey_no',
            'land_map_no',
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
