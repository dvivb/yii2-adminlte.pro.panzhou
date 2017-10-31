<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\HouselevyDetailSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Houselevy Details';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-detail-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Houselevy Detail', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'houselevy_list_id',
            'dictionaries_id',
            'subject',
            'parent_id',
            // 'name',
            // 'unit',
            // 'price',
            // 'levy_value',
            // 'compensation_price',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
