<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\HouselevyTotalSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '房屋征补项目花名册汇总';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-total-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'project_id',
//            'periods',
            'periods'=>['attribute'=>'periods','value'=>function($dataProvider){
                return '<a href="/houselevy/houselevy-list?HouselevyListSearch[houselevy_total_id]='.$dataProvider->id.'">'.$dataProvider->periods.'</a>';
            }, 'format' => 'raw',],
            'total_households',
            'total_area',
             'total_amount',
             'operator',
             'approval',
             'created_at',
             'updated_at',

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