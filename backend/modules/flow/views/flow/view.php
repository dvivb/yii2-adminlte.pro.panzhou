<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Flow */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Flows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flow-view view">

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
            'name',
            'type'=>[
                'label' => '流程分类',
                'value' =>  type_switch($model->type),
            ],
            'create_time',
            'update_time',
        ],
    ]) ?>

    <?php
    function type_switch($type){
        switch($type){   //'1房屋征补2过渡费流程，3土地征补流程，4安置流程',
            case 1:
                return Html::encode("房屋征补");
                break;
            case 2:
                return Html::encode("过渡费流程");
                break;
            case 3:
                return Html::encode("土地征补流程");
                break;
            case 4:
                return Html::encode("安置流程");
                break;
            default:
                return "未知";
                break;
        }
    }
    ?>
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