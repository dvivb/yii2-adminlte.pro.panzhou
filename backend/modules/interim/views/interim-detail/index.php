<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InterimDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '过渡费明细列表';
$this->params['breadcrumbs'][] = ['label' => '过渡费项目列表', 'url' => ['interim-list/index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="interim-detail-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('过渡费明细创建', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

//            'id',
            'name',
            'id_number',
//            'project_id',
             'project_name',
             'house_area',
             'biz_house_area',
             'amount',
             'sign_time',
             'start_time',
             'end_time',
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