<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\LandlevyList */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => '土地征补项目花名册列表', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-list-view view">

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