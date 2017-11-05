<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InterimListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '过渡费项目列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-list-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'summary' => "<p style='float: right;margin-top: 10px;'>显示 {begin} - {end} 共 {totalCount} 条</p>",
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
//            'project_id',
//            'project_name',
            'project_name'=>['attribute'=>'project_name','value'=>function($dataProvider){
                return '<a href="/interim/interim-detail/index/?InterimDetailSearch[project_id]='.$dataProvider->project_id.'">'.$dataProvider->project_name.'</a>';
            }, 'format' => 'raw',],
            'total_area',
            'total_amount',
             'remarks',
             'operator',
             'approval',
             'grant_time',
            // 'created_at',
            // 'updated_at',

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