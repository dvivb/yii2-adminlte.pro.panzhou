<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ShantiesSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Shanties';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shanties-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Shanties', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'address',
            'house_total',
            'house_area',
            // 'house_month_total',
            // 'house_year_total',
            // 'house_year_area',
            // 'house_amount',
            // 'house_amount_area',
            // 'house_surplusr_amount',
            // 'biz_house_total',
            // 'biz_house_area',
            // 'biz_house_month_total',
            // 'biz_house_year_total',
            // 'biz_house_year_area',
            // 'biz_house_amount',
            // 'biz_house_amount_area',
            // 'biz_house_surplusr_amount',
            // 'remarks',
            // 'operator',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
