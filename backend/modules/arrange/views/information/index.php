<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\InformationSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '安置信息管理';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="information-index">

    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('创建安置信息', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
<?php Pjax::begin(); ?>    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'identification',
            'phone',
            'towns',
            // 'address',
            // 'booklet',
            // 'contract_no',
            // 'arrange_type',
            // 'permute_type',
            // 'house_area',
            // 'permute_area',
            // 'use_area',
            // 'arrange_address',
            // 'arrange_house_total',
            // 'arrange_root_no',
            // 'arrange_house_area',
            // 'arrange_clearing',
            // 'arrange_delivery_time',
            // 'arrange_is_clearing',
            // 'remarks',
            // 'upload_file',
            // 'operator',
            // 'sign_time',
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