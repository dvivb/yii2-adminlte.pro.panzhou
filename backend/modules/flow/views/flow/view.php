<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Flow */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Flows', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flow-view">

    <h1>流程管理</h1>

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
            'type'=>[   'attribute'=>'type',
                        'value'=>function($model){
                                    switch($model->type){   //'1房屋征补2过渡费流程，3土地征补流程，4安置流程',
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
                   ]
            ,
            'create_time',
            'update_time',
        ],
    ]) ?>

</div>
