<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\FlowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '流程管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="flow-index">

    <h1><? //Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'summary' => "<p style='float: right;margin-top: 10px;'>显示 {begin} - {end} 共 {totalCount} 条</p>",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            [   'attribute'=>'type',
                'content'=> function($dataProvider){
                    switch($dataProvider->type){   //'1房屋征补2过渡费流程，3土地征补流程，4安置流程',
                        case 1:
                            return Html::encode("房屋征补流程");
                            break;
                        case 2:
                            return Html::encode("征收补偿款流程");
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
            ],
            'create_time',
            'update_time',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>

<style>
    .grid-view{
        margin-top: 10px;
        padding: 10px;
        background: #fcfcfd;
    }

    .btn-success {
        float: left;
        margin: 16px;
    }
</style>