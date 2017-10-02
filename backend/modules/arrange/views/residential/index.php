<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\ResidentialsSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Residentials';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="residentials-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Residentials', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'house_name',
            'address',
            'house_total',
            // 'house_area',
            // 'suite_area',
            // 'house_month_total',
            // 'house_year_total',
            // 'house_year_area',
            // 'house_amount',
            // 'house_surplusr_amount',
            // 'remarks',
            // 'operator',
            // 'finished_time',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
