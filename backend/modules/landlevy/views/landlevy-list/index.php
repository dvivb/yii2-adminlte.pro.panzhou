<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;
/* @var $this yii\web\View */
/* @var $searchModel app\models\LandlevyListSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = '土地征补项目花名册列表';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="landlevy-list-index">
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
//            'landlevy_total_id',
            'name'=>['attribute'=>'name','value'=>function($dataProvider){
                return '<a href="/landlevy/landlevy-detail?LandlevyDetailSearch[landlevy_list_id]='.$dataProvider->id.'">'.$dataProvider->name.'</a>';
            }, 'format' => 'raw',],
            'identification',
            'land_survey_no',
            'land_map_no',
//            'name',
            // 'gender',
             'phone',
             'towns',
            // 'address',
            // 'bank_card',
            // 'bank_name',
            // 'upload_file',
            // 'created_at',
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