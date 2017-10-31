<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\HouselevyListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Houselevy Lists';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="houselevy-list-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Houselevy List', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'houselevy_total_id',
            'name',
            'gender',
            'identification',
            // 'phone',
            // 'towns',
            // 'address',
            // 'bank_card',
            // 'bank_name',
            // 'upload_file',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
<?php Pjax::end(); ?></div>
